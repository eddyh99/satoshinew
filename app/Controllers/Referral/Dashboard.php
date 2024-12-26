<?php

namespace App\Controllers\Referral;
use App\Controllers\BaseController;

class Dashboard extends BaseController
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
        // Call Endpoin total_member
        $url            = URLAPI . "/v1/referral/total_downline?id=".$_SESSION["logged_user"]->id;
        $resultReferral = satoshiAdmin($url)->result->message;

        $url2   = URLAPI . "/v1/referral/commission?id=".$_SESSION["logged_user"]->id;
        $unpaid = satoshiAdmin($url2)->result->message;
        $mdata = [
            'title'     => 'Dashboard - ' . SATOSHITITLE,
            'content'   => 'referral/dashboard/index',
            'extra'     => 'referral/dashboard/js/_js_index',
            'active_dash' => 'active',
            'referral'    => $resultReferral,
            'unpaid'      => $unpaid
        ];

        return view('referral/layout/admin_wrapper', $mdata);
    }
    
    public function get_withdrawal(){
        // Call Endpoin Get Referral Member
        $url = URLAPI . "/v1/referral/getwithdraw?id=".$_SESSION["logged_user"]->id;
        $result = satoshiAdmin($url)->result->message;
        echo json_encode($result);
    }
}