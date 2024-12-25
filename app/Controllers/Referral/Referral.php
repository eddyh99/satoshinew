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
    
}