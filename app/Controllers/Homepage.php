<?php

namespace App\Controllers;

class Homepage extends BaseController
{
    public function index()
    {
        $mdata = [
            'title'     => 'Homepage - ' . NAMETITLE,
            'content'   => 'homepage/index'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function hotdeals() {
        $mdata = [
            'title'     => 'Hot Deals - ' . NAMETITLE,
            'content'   => 'homepage/hotdeals'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function secret_formula() {
        $mdata = [
            'title'     => 'Secret Formula - ' . NAMETITLE,
            'content'   => 'homepage/secret-formula'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function giveaway() {
        $mdata = [
            'title'     => 'Giveaway - ' . NAMETITLE,
            'content'   => 'homepage/giveaway'
        ];

        return view('homepage/layout/wrapper', $mdata);
    }
    
        public function register()
    {
        $mdata = [
            'title'     => 'Register - ' . NAMETITLE,
            'content'   => 'homepage/register',
            'extra'     => 'homepage/service/js/_js_satoshi_price',
            'navoption' => true,
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function register_process()
    {
        // Validation Field
        $rules = $this->validate([
            'email'   => [
                'label'     => 'Email',
                'rules'     => 'valid_email'
            ],
            'pass'     => [
                'label'     => 'Password',
                'rules'     => 'required|min_length[8]'
            ],
            'cpass'     => [
                'label'     => 'Confirm Password',
                'rules'     => 'required|matches[pass]|min_length[8]'
            ],
        ]);

        // Checking Validation
        if(!$rules){
            session()->setFlashdata('failed', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'homepage/register#register')->withInput();
        }

        // Initial Data
        $mdata = [
            'email'     => htmlspecialchars($this->request->getVar('email')),
            'password'  => sha1(htmlspecialchars($this->request->getVar('pass'))),
            'ipaddress' => htmlspecialchars($this->request->getIPAddress()),
            'from'      => 'Web'
        ];

       $reff = trim(htmlspecialchars($this->request->getVar('reff')));

        // Call Endpoin Check Referral
        $urlReff = URLAPI . "/v1/member/get_byreferral?refcode=".$reff;
        $isValidReff = satoshiAdmin($urlReff)->result;

        if($isValidReff->code != "200" && $reff != ""){
            session()->setFlashdata('failed', $isValidReff->message);
            return redirect()->to(BASE_URL . 'homepage/register#register')->withInput();
        }
        
        $mdata['referral'] = empty($reff) ? null : $reff;
        // Call Endpoin Register
        $url = URLAPI . "/auth/register";
        $result = satoshiAdmin($url, json_encode($mdata))->result;
        
        if($result->code != '201'){
            session()->setFlashdata('failed', $result->message);
            return redirect()->to(BASE_URL . 'homepage/register#register')->withInput();
        }else{
            $subject = "Activation Account - " . SATOSHITITLE;
            sendmail_satoshi($mdata['email'], $subject,  emailtemplate_activation_account($result->message->token, $mdata['email']));
            return redirect()->to(BASE_URL . 'homepage/satoshi_active_account/'.base64_encode($mdata['email']));
        }
    }
    
    public function activate_account($email,$token){

        // Call Endpoin Activation Account
        $email=base64_decode($email);
        $token=base64_decode($token);
        $url = URLAPI . "/auth/activate?token=" . $token . "&email=" . $email;
        $result = satoshiAdmin($url)->result;
        return redirect()->to(BASE_URL . 'homepage/success_activated');
    }
    
    public function success_activated(){
        $mdata = [
            'title'     => 'Activation Successful - ' . NAMETITLE,
            'content'   => 'homepage/account_activation',
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function satoshi_active_account($email)
    {   
        $email = base64_decode($email);

        // Call Endpoin Get Member By Email
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $result = satoshiAdmin($url)->result;

        if($result->message->status == "active" && $result->message->membership == "expired"){
            return redirect()->to(BASE_URL . 'homepage/satoshi_register_payment/'.base64_encode($email));
        }
        
        $mdata = [
            'title'     => 'Active Account - ' . NAMETITLE,
            'content'   => 'homepage/satoshi-otp',
            'extra'     => 'homepage/js/_js_satoshi_otp',
            'navoption' => true,
            'emailuser' => $email
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function satoshi_check_otp()
    {
        $email = $this->request->getVar('email');
        // Validation Field
        $rules = $this->validate([
            'first'     => [
                'label'     => 'First Column',
                'rules'     => 'required'
            ],
            'second'     => [
                'label'     => 'Second Column',
                'rules'     => 'required'
            ],
            'third'     => [
                'label'     => 'Third Column',
                'rules'     => 'required'
            ],
            'fourth'     => [
                'label'     => 'Fourth Column',
                'rules'     => 'required'
            ],
            'email'     => [
                'label'     => 'Email',
                'rules'     => 'required'
            ],
        ]);

        // Checking Validation
        if(!$rules){
            session()->setFlashdata('failed', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'homepage/satoshi_active_account/' .  base64_encode($email));
        }

        $first = htmlspecialchars($this->request->getVar('first'));
        $second = htmlspecialchars($this->request->getVar('second'));
        $third = htmlspecialchars($this->request->getVar('third'));
        $fourth = htmlspecialchars($this->request->getVar('fourth'));

        $mdata = [
            "otp"   => $first.$second.$third.$fourth,
            "email" => htmlspecialchars($this->request->getVar('email'))
        ];

        // Call Endpoin Activation Account
        $url = URLAPI . "/auth/activate?token=" . $mdata['otp'] . "&email=" . $mdata['email'];
        $result = satoshiAdmin($url, json_encode($mdata))->result;

        if ($result->code!=200){
            session()->setFlashdata('failed', $result->message);
            return redirect()->to(BASE_URL . 'homepage/satoshi_active_account/' .  base64_encode($email));
        }else{
            return redirect()->to(BASE_URL . 'homepage/satoshi_register_payment/' .  base64_encode($email));
        }
    }

    public function satoshi_register_payment($email)
    {
        $email = base64_decode($email);
        // Call Endpoin Get Member By Email
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $result = satoshiAdmin($url)->result->message;
        
        // Call Endpoin total_exclusive
        $urlprice = URLAPI . "/auth/readprice";
        $rprice = satoshiAdmin($urlprice)->result->message;

        $price = [
            "1m"    => $rprice[0]->price,
            "3m"    => $rprice[1]->price,
            "6m"    => $rprice[2]->price,
            "1y"    => $rprice[3]->price
        ];

        $selisihReferral = [
            "1m"    => $rprice[0]->price-$rprice[0]->ref_price,
            "3m"    => $rprice[1]->price-$rprice[1]->ref_price,
            "6m"    => $rprice[2]->price-$rprice[2]->ref_price,
            "1y"    => $rprice[3]->price-$rprice[3]->ref_price
        ];
     
        $mdata = [
            'title'     => 'Active Account - ' . NAMETITLE,
            'content'   => 'homepage/satoshi-payment',
            'extra'     => 'homepage/js/_js_satoshi_payment',
            'navoption' => true,
            'member'    => $result,
            'price'     => $price,
            'disc'      => $selisihReferral
        ];

        return view('homepage/layout/wrapper', $mdata);
    }

    public function satoshi_register_process($email)
    {
        $email = base64_decode($email);
        // Call Endpoin Get Member By Email
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $result = satoshiAdmin($url)->result->message;

        // Stripe secret key
        \Stripe\Stripe::setApiKey(SECRET_KEY); 
        $paymentMethodId = $_POST['payment_method_id'];

        $getprice = htmlspecialchars($this->request->getVar('price'));
        $currency = 'eur';
        $mdata = [
            "email" => $result->email,
            "referral"  => $result->id_referral
        ];

        $urlprice = URLAPI . "/auth/readprice";
        $rprice = satoshiAdmin($urlprice)->result->message;

        if(!empty($result->id_referral)){
            $discount = [
                "1m"    => $rprice[0]->price-$rprice[0]->ref_price,
                "3m"    => $rprice[1]->price-$rprice[1]->ref_price,
                "6m"    => $rprice[2]->price-$rprice[2]->ref_price,
                "1y"    => $rprice[3]->price-$rprice[3]->ref_price
            ];   

        }else {
            $discount = [
                "1m"    => 0,
                "3m"    => 0,
                "6m"    => 0,
                "1y"    => 0  
            ];            
        }


        $price_id="";
        if($getprice == 250){
            if(!empty($result->id_referral)){
                $price_id=$rprice[0]->stripe_id_ref;
            }else{
                $price_id=$rprice[0]->stripe_id;
            }
            $mdata['amount'] = $getprice - $discount['1m'];
            $mdata['period'] = 30;
        }else if($getprice == 600){
            if(!empty($result->id_referral)){
                $price_id=$rprice[1]->stripe_id_ref;
            }else{
                $price_id=$rprice[1]->stripe_id;
            }
            $mdata['amount'] = $getprice - $discount['3m'];
            $mdata['period'] = 30 * 3;
        }else if($getprice == 1050){
            if(!empty($result->id_referral)){
                $price_id=$rprice[2]->stripe_id_ref;
            }else{
                $price_id=$rprice[2]->stripe_id;
            }
            $mdata['amount'] = $getprice - $discount['6m'];
            $mdata['period'] = 30 * 6;
        }else if($getprice == 1800){
            if(!empty($result->id_referral)){
                $price_id=$rprice[3]->stripe_id_ref;
            }else{
                $price_id=$rprice[3]->stripe_id;
            }
            $mdata['amount'] = $getprice - $discount['1y'];
            $mdata['period'] = 365;
        }else{
            session()->setFlashdata('failed', "Invalid Amount, Please Try Again");
            return redirect()->to(BASE_URL . 'homepage/satoshi_register_payment/' .  base64_encode($result->email));
        }


        try {
            // Step 1: Create or retrieve a customer
            $customer = \Stripe\Customer::create([
                'email' => $mdata['email'], // Replace with your customer's email
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
                header("Location: " . BASE_URL . "homepage/register");
                exit();
            } else {
                throw new Exception("Subscription payment failed. Status: " . $paymentIntent->status);
            }
        } catch (\Stripe\Exception\CardException $e) {
            session()->setFlashdata('failed', 'Payment Failed: ' . $e->getError()->message);
            header("Location: " . BASE_URL . 'homepage/satoshi_register_payment/' . base64_encode($mdata['email']));
            exit();
        } catch (Exception $e) {
            session()->setFlashdata('failed', 'Error: ' . $e->getMessage());
            header("Location: " . BASE_URL . 'homepage/satoshi_register_payment/' . base64_encode($mdata['email']));
            exit();
        }

    }
    
    
    public function resendotp($email){
        $email = base64_decode($email);

        // Call Endpoin Get Member By Email
        $url = URLAPI . "/auth/resendotp?email=".$email;
        $result = satoshiAdmin($url)->result;

        $subject = "Activation Account - " . SATOSHITITLE;
        sendmail_satoshi($email, $subject,  emailtemplate_activation_account($result->message->token, $email));
        return redirect()->to(BASE_URL . 'homepage/satoshi_active_account/'.base64_encode($email));
    }

    public function notify(){
        // Set your Stripe secret key
        $secretKey = SECRET_KEY;
        $endpointSecret= SIGNING_WEBHOOK; 

        \Stripe\Stripe::setApiKey($secretKey);

        // Retrieve the request's body and headers
        $payload = @file_get_contents('php://input');
        $sigHeader = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

        try {
            // Verify the event by checking the signature
            $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (SignatureVerificationException $e) {
            // Log the error and return a 400 response
            log_message('error', 'Stripe webhook signature verification failed: ' . $e->getMessage());
            return $this->response->setStatusCode(400)->setBody('Invalid signature');
        }

        // Handle the event
        switch ($event->type) {
            case 'invoice.payment_succeeded':
                $invoice = $event->data->object;

                // Process successful payment
                $this->handlePaymentSuccess($invoice);
                break;

            default:
                log_message('info', 'Unhandled event type: ' . $event->type);
        }

        return $this->response->setStatusCode(200)->setBody('Webhook handled successfully');
    }

    private function handlePaymentSuccess($invoice)
    {
        // Extract relevant information from the invoice object
        $customerId = $invoice->customer;
        $amountPaid = $invoice->amount_paid / 100; // Stripe uses cents
        $subscriptionId = $invoice->subscription;
        try {
            $customer = \Stripe\Customer::retrieve($customerId);
            $email = $customer->email; // Customer email
        } catch (\Exception $e) {
            log_message('error', 'Failed to retrieve customer details: ' . $e->getMessage());
            return;
        }
        
        $priceId="";
        foreach ($invoice->lines->data as $lineItem) {
            if (isset($lineItem->price->id)) {
                $priceId = $lineItem->price->id; // Extract price ID
                $endDate = date('Y-m-d H:i:s', $lineItem->period->end);

                // Process the price ID or save it to the database
            } else {
                log_message('error', 'Price ID not found in line item');
            }
        }
        
        $mdata=array(
                "email"         => $email,
                "price_id"      => $priceId,
                "subscription"  => $subscriptionId,
                "end_date"      => $endDate
            );
        $url = URLAPI . "/v1/subscription/paidsubscribe";
        $result = satoshiAdmin($url, json_encode($mdata));//->result->message;
        print_r($result);

            // Log or use the email
        log_message('info', json_encode($mdata));
    }
}
