<?php

namespace App\Controllers\Widget;

use App\Controllers\BaseController;

class Subscription extends BaseController
{
    public function index()
    {
        // Call Endpoin total_exclusive
        $url = URLAPI . "/auth/readprice";
        $result = satoshiAdmin($url)->result->message;

        $email = @$_GET['mail'];
        
        // Call Endpoin Member
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $resultMember = satoshiAdmin($url)->result->message;

        $ref = @$resultMember->id_referral;
        $mdata = [
            'title'     => 'Subscription - ' . SATOSHITITLE ,
            'content'   => 'widget/subscription/subscription',
            'extra'     => 'widget/subscription/js/_js_subcription',
            'subsprice' => $result,
            'ref'       => $ref,
            'email'     => $email
        ];

        return view('widget/layout/wrapper', $mdata);
    }


    public function subsproccess()
    {
        $token = htmlspecialchars($this->request->getVar('stripeToken'));
        $total_period = htmlspecialchars($this->request->getVar('subs'));

        $urlprice = URLAPI . "/auth/readprice";
        $rprice = satoshiAdmin($urlprice)->result->message;

        if($total_period == 1){
            $price_id=$rprice[0]->stripe_app;
        }elseif($total_period == 3){
            $price_id=$rprice[1]->stripe_app;
        }elseif($total_period == 6){
            $price_id=$rprice[2]->stripe_app;
        }elseif($total_period == 11){
            $price_id=$rprice[3]->stripe_app;
        }
        

        // Stripe secret key
        \Stripe\Stripe::setApiKey(SECRET_KEY); 
        $paymentMethodId = $_POST['payment_method_id'];

        try {
            // Step 1: Create or retrieve a customer
            $customer = \Stripe\Customer::create([
                'email' => $_GET["mail"], // Replace with your customer's email
                'payment_method' => $paymentMethodId,
                'invoice_settings' => [
                    'default_payment_method' => $paymentMethodId,
                ],
            ]);
        
            // Step 2: Create a subscription
            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [[
                    'price' => $price_id, // Replace with the Stripe Price ID for the subscription
                ]],
                'expand' => ['latest_invoice.payment_intent'], // Expand payment intent for immediate confirmation
            ]);
        
            // Step 3: Check subscription status
            $paymentIntent = $subscription->latest_invoice->payment_intent;
            if ($paymentIntent->status === 'succeeded') {
                // Subscription payment successful
                session()->setFlashdata('successPayment', 'Thank you for subscribing');
                header("Location: ". BASE_URL . 'widget/subscription/success?mail='.$_GET["mail"]);
                exit();
            } else {
                throw new Exception("Subscription payment failed. Status: " . $paymentIntent->status);
            }
        } catch (\Stripe\Exception\CardException $e) {
            session()->setFlashdata('failed', 'Payment Failed: ' . $e->getError()->message);
            exit();
        } catch (Exception $e) {
            session()->setFlashdata('failed', 'Error: ' . $e->getMessage());
            exit();
        }
    }

    public function success()
    {
        $email = @$_GET['mail'];

        $mdata = [
            'title'     => 'Subscription Success - '.SATOSHITITLE ,
            'content'   => 'widget/subscription/success',
            'extra'     => 'widget/subscription/js/_js_success',
            'email'     => $email
        ];

        return view('widget/layout/wrapper', $mdata);
    }

    public function upgrade($email)
    {
        // Call Endpoin total_exclusive
        $url = URLAPI . "/auth/readprice";
        $result = satoshiAdmin($url)->result->message;

        // Call Endpoin Member
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $resultMember = satoshiAdmin($url)->result->message;


        $mdata = [
            'title'     => 'Upgrade - ' . SATOSHITITLE ,
            'content'   => 'widget/subscription/upgrade',
            'extra'     => 'widget/subscription/js/_js_upgrade',
            'subsprice' => $result,
            'email'     => $email,
            'member'    => $resultMember
        ];

        return view('widget/layout/wrapper', $mdata);
    }

    public function check_referral()
    {
        // Validation Field
        $rules = $this->validate([
            'referral'     => [
                'label'     => 'Referral',
                'rules'     => 'required'
            ],
        ]);

        // Checking Validation
        if(!$rules){
            echo json_encode($this->validation->listErrors());
            exit();
        }

        // Initial Data
        $referral = htmlspecialchars($this->request->getVar('referral'));

        // Proccess Call Endpoin API
        $url = URLAPI . "/v1/member/get_byreferral?refcode=".$referral;
        $response = satoshiAdmin($url);
        $result = $response->result;
        echo json_encode($result);

    }

    public function upgrade_proccess()
    {
        // Validation Field
        $rules = $this->validate([
            'email'     => [
                'label'     => 'Email',
                'rules'     => 'required|valid_email'
            ],
            'subs'     => [
                'label'     => 'Subscription',
                'rules'     => 'required'
            ],
        ]);
        
        $token = htmlspecialchars($this->request->getVar('stripeToken'));
        $subs = htmlspecialchars($this->request->getVar('subs'));
        
        $arraySubs = explode(',', $subs);
        $amount = $arraySubs[0];
        $desc = $arraySubs[1];

        $arrayDesc = explode(' ', $desc);
        $total_period = $arrayDesc[0];

        // Init Data
        $mdata = [
            'email'     => htmlspecialchars($this->request->getVar('email')),
            'amount'    => $amount*100,
            "period"    => ($total_period==12) ? 365 : $total_period * 30,
            'referral'  => htmlspecialchars($this->request->getVar('new_referral'))
        ];

        // Checking Validation
        if(!$rules){
            session()->setFlashdata('failed', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'widget/subscription/upgrade/'.$mdata['email']);
        }

        // Stripe secret key
        \Stripe\Stripe::setApiKey(SECRET_KEY); 
        $paymentMethodId = $_POST['payment_method_id'];
        $currency = 'usd';

        try {

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'payment_method' => $paymentMethodId,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never', // Disable redirect-based payment methods
                ],
            ]);

            if ($paymentIntent->status === 'requires_confirmation') {
                $confirmedPaymentIntent = $paymentIntent->confirm();
                
                // If the payment was successful, proceed with creating the calendar event
                if ($confirmedPaymentIntent->status === 'succeeded') {
                    // POST subscribe member
                    $url = URLAPI . "/v1/subscription/paidsubscribe";
                    $result = satoshiAdmin($url,  json_encode($mdata))->result->message;
                }
            }

            session()->setFlashdata('failed', 'Payment Failed: Please Try Again');
            header("Location: ". BASE_URL . 'widget/subscription/upgrade/'.$mdata['email']);
            exit();

        } catch (\Stripe\Exception\CardException $e) {
            session()->setFlashdata('failed', 'Payment Failed: '. $e->getError()->message);
            header("Location: ". BASE_URL . 'widget/subscription/upgrade/'.$mdata['email']);
            exit();
        }
        
    }

    
    public function upgrade_success()
    {
        $mdata = [
            'title'     => 'Subscription Success - ' . SATOSHITITLE ,
            'content'   => 'widget/subscription/upgrade_success',
            'extra'     => 'widget/subscription/js/_js_success',
        ];

        return view('widget/layout/wrapper', $mdata);
    }
}