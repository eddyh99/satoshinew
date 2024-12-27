<?php

namespace App\Controllers\Godmode;

use App\Controllers\BaseController;

class Payment extends BaseController
{
    public function index()
    {
        $mdata = [
            'title'     => 'Payment - ' . SATOSHITITLE,
            'content'   => 'godmode/payment/index',
            'extra'     => 'godmode/payment/js/_js_index',
            'active_payment'    => 'active active-menu'
        ];

        return view('godmode/layout/admin_wrapper', $mdata);
    }
    
    public function get_requestpayment(){
        // Call Endpoin Get Total Member
        $url = URLAPI . "/v1/payment/requestpayment";
        $result = satoshiAdmin($url)->result->message;
        echo json_encode($result);
    }

    public function detailpayment($id,$email)
    {
        // Call Get Detail Request
        $url = URLAPI . "/v1/payment/detailpayment?email=".base64_decode($email)."&id=".$id;
        $resultPayment = satoshiAdmin($url)->result->message;
        $mdata = [
            'title'     => 'Detail Member - ' . SATOSHITITLE,
            'content'   => 'godmode/payment/detail_payment',
            'extra'     => 'godmode/payment/js/_js_detailpayment',
            'active_payment'  => 'active',
            'payment'    => $resultPayment,
        ];

        return view('godmode/layout/admin_wrapper', $mdata);
    }

    public function payment_process()
    {
        // Init Data
        $mdata = [
            'member_id'    => htmlspecialchars($this->request->getVar('member_id')),
            'reqid'  => htmlspecialchars($this->request->getVar('reqid')),
        ];

        // Proccess Endpoin API
        $url = URLAPI . "/v1/payment/paid_request";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        
        if($result->code != '200') {
            session()->setFlashdata('failed', "Something Wrong, Please Try Again!");
            return redirect()->to(BASE_URL . 'godmode/payment/detailpayment/'.base64_encode($mdata["email"]));
        }else{
            session()->setFlashdata('success', "Successfully paid transaction");
            return redirect()->to(BASE_URL . 'godmode/payment');
        }    
        
    }
    
    public function sendbonus(){
        // Init Data
        $mdata = [
            'email'    => htmlspecialchars($this->request->getVar('email')),
            'amount'  => htmlspecialchars($this->request->getVar('amount')),
        ];
        
        // Proccess Endpoin API
        $url = URLAPI . "/v1/payment/send_bonus";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        
        if($result->code != '200') {
            session()->setFlashdata('failed', "Something Wrong, Please Try Again!");
            if ($_GET["type"]=="free"){
                return redirect()->to(BASE_URL . 'godmode/freemember/detailmember/'.base64_encode($mdata["email"]));
            }elseif ($_GET["type"]=="ref"){
                return redirect()->to(BASE_URL . 'godmode/referral/detailmember/'.base64_encode($mdata["email"]));
            }else{
                return redirect()->to(BASE_URL . 'godmode/dashboard/detailmember/'.base64_encode("totalmember").'/'.base64_encode($mdata["email"]));
            }
        }else{
            session()->setFlashdata('success', "Bonus has been successfully sent");
            return redirect()->to(BASE_URL . 'godmode/dashboard');
        }    
    }
    
}