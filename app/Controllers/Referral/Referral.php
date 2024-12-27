<?php

namespace App\Controllers\Referral;
use App\Controllers\BaseController;

class Referral extends BaseController
{
    public function __construct()
    {
        $session = session();
        if(!$session->has('logged_user')){
            header("Location: ". BASE_URL . 'referral/auth/signin');
            exit();
        }

    }
    
    public function index()
    {
        $mdata = [
            'title'     => 'Referral - ' . SATOSHITITLE,
            'content'   => 'referral/referral/index',
            'extra'     => 'referral/referral/js/_js_index',
            'active_reff'    => 'active active-menu'
        ];

        return view('referral/layout/admin_wrapper', $mdata);
    }
    
    public function get_downline(){
        // Call Endpoin Get Referral Member
        $url = URLAPI . "/v1/referral/getDownline?id=".$_SESSION["logged_user"]->id;
        $result = satoshiAdmin($url)->result->message;
        echo json_encode($result);
    }
    
    public function withdraw(){
        $url2   = URLAPI . "/v1/referral/commission?id=".$_SESSION["logged_user"]->id;
        $unpaid = satoshiAdmin($url2)->result->message;
         $mdata = [
            'title'     => 'Withdraw - ' . SATOSHITITLE,
            'content'   => 'referral/withdraw/index',
            'extra'     => 'referral/withdraw/js/_js_index',
            'active_wd'    => 'active active-menu',
            'unpaid'    => $unpaid
        ];

        return view('referral/layout/admin_wrapper', $mdata);
       
    }
    
    public function local(){
        $url2   = URLAPI . "/v1/referral/commission?id=".$_SESSION["logged_user"]->id;
        $unpaid = satoshiAdmin($url2)->result->message;
         $mdata = [
            'title'     => 'Withdraw - ' . SATOSHITITLE,
            'content'   => 'referral/withdraw/local',
            'extra'     => 'referral/withdraw/js/_js_local',
            'active_wd'    => 'active active-menu',
            'unpaid'    => $unpaid
        ];

        return view('referral/layout/admin_wrapper', $mdata);
        
    }
    
    public function inter(){
        $url2   = URLAPI . "/v1/referral/commission?id=".$_SESSION["logged_user"]->id;
        $unpaid = satoshiAdmin($url2)->result->message;
         $mdata = [
            'title'     => 'Withdraw - ' . SATOSHITITLE,
            'content'   => 'referral/withdraw/inter',
            'extra'     => 'referral/withdraw/js/_js_inter',
            'active_wd'    => 'active active-menu',
            'unpaid'    => $unpaid
        ];

        return view('referral/layout/admin_wrapper', $mdata);
        
    }

    public function usdt(){
        $url2   = URLAPI . "/v1/referral/commission?id=".$_SESSION["logged_user"]->id;
        $unpaid = satoshiAdmin($url2)->result->message;
        $mdata = [
            'title'     => 'Withdraw - ' . SATOSHITITLE,
            'content'   => 'referral/withdraw/usdt',
            'extra'     => 'referral/withdraw/js/_js_usdt',
            'active_wd'    => 'active active-menu',
            'unpaid'    => $unpaid
        ];

        return view('referral/layout/admin_wrapper', $mdata);
        
    }
    
    public function submitusdt_withdraw(){
        $mdata = [
            'member_id'             => $_SESSION["logged_user"]->id,
            'usdt_wallet_address'   => htmlspecialchars($this->request->getVar('wallet-address')),
        ];    
        
        $url = URLAPI . "/v1/referral/submit_usdtwithdraw";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        if($result->code != '200') {
            session()->setFlashdata('failed', "Something Wrong, Please Try Again!");
            return redirect()->to(BASE_URL . 'referral/referral/usdt');
        }else{
            session()->setFlashdata('success', "The request for withdrawal has already been submitted");
            return redirect()->to(BASE_URL . 'referral/dashboard');
        }    
    }

    public function submitfiat_withdraw(){
        $type = htmlspecialchars($this->request->getVar('type')); // Fetch the 'type' field from the form
        if ($type == "usa") {
            $details = array(
                "usa" => array(
                    "Account Number" => htmlspecialchars($this->request->getVar('account-number')),
                    "Routing Number" => htmlspecialchars($this->request->getVar('routing-number')),
                    "Account Type"   => htmlspecialchars($this->request->getVar('account-type')),
                )
            );
        } else {
            $details = array(
                "nonusa" => array(
                    "Account Number" => htmlspecialchars($this->request->getVar('account-number')),
                    "Swift Code"     => htmlspecialchars($this->request->getVar('swift-code')),
                    "Recipient"      => htmlspecialchars($this->request->getVar('recipient')),
                    "Address"        => htmlspecialchars($this->request->getVar('address-line')),
                    "City"           => htmlspecialchars($this->request->getVar('city')),
                    "State"          => htmlspecialchars($this->request->getVar('state')),
                    "Postal Code"    => htmlspecialchars($this->request->getVar('postal-code')),
                )
            );
        }

        
        $mdata = [
            'member_id'         => $_SESSION["logged_user"]->id,
            'payment_details'   => json_encode($details),
        ];    
        
        $url = URLAPI . "/v1/referral/submit_fiatwithdraw";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        if($result->code != '200') {
            session()->setFlashdata('failed', "Something Wrong, Please Try Again!");
            return redirect()->to(BASE_URL . 'referral/referral/usdt');
        }else{
            session()->setFlashdata('success', "The request for withdrawal has already been submitted");
            return redirect()->to(BASE_URL . 'referral/dashboard');
        }    
    }
    
    public function giveaway(){
        $mdata = [
            'title'     => 'Giveaway - ' . SATOSHITITLE,
            'content'   => 'referral/giveaway/index',
            'extra'     => 'referral/giveaway/js/_js_index',
            'active_give'    => 'active active-menu',
        ];

        return view('referral/layout/admin_wrapper', $mdata);

    }

    public function giveaway1(){
        $url2    = URLAPI . "/v1/referral/giveaway?id=".$_SESSION["logged_user"]->id."&tipe=tipe1";
        $profile = satoshiAdmin($url2)->result->message;
    
        $mdata = [
            'title'     => 'Giveaway - ' . SATOSHITITLE,
            'content'   => 'referral/giveaway/giveaway1',
            'extra'     => 'referral/giveaway/js/_js_give1',
            'active_give'    => 'active active-menu',
            'profile'   => $profile
        ];

        return view('referral/layout/admin_wrapper', $mdata);

    }

    public function giveaway2(){
        $url2    = URLAPI . "/v1/referral/giveaway?id=".$_SESSION["logged_user"]->id."&tipe=tipe2";
        $profile = satoshiAdmin($url2)->result->message;
        $mdata = [
            'title'     => 'Giveaway - ' . SATOSHITITLE,
            'content'   => 'referral/giveaway/giveaway2',
            'extra'     => 'referral/giveaway/js/_js_give1',
            'active_give'    => 'active active-menu',
            'profile'   => $profile
        ];

        return view('referral/layout/admin_wrapper', $mdata);

    }
    
    public function submit_giveaway(){
        $tipe=htmlspecialchars($this->request->getVar('tipe'));
        $mdata = array(
                    "member_id" =>  $_SESSION["logged_user"]->id,
                    "tipe_giveway"  => $tipe,
                    "profile"   => htmlspecialchars($this->request->getVar('profile') ?? null),
                    "link1"     => htmlspecialchars($this->request->getVar('link1') ?? null),
                    "link2"     => htmlspecialchars($this->request->getVar('link2') ?? null),
                    "link3"     => htmlspecialchars($this->request->getVar('link3') ?? null),
                    "link4"     => htmlspecialchars($this->request->getVar('link4') ?? null),
        );
        
        $url = URLAPI . "/v1/referral/submit_giveaway";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        if($result->code != '200') {
            session()->setFlashdata('failed', "This link is already registered. Please use a different link");
            if ($tipe=="tipe1"){
                return redirect()->to(BASE_URL . 'referral/referral/giveaway1');
            }else{
                return redirect()->to(BASE_URL . 'referral/referral/giveaway2');
            }

        }else{
            session()->setFlashdata('success', "The link has been sent. We'll review");
            if ($tipe=="tipe1"){
                return redirect()->to(BASE_URL . 'referral/referral/giveaway1');
            }else{
                return redirect()->to(BASE_URL . 'referral/referral/giveaway2');
            }
        }    

    }
    
}