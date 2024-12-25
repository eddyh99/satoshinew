<?php

namespace App\Controllers\Godmode;

use App\Controllers\BaseController;

class Freemember extends BaseController
{
    public function index()
    {
        $mdata = [
            'title'     => 'Free Member - ' . SATOSHITITLE,
            'content'   => 'godmode/freemember/index',
            'extra'     => 'godmode/freemember/js/_js_index',
            'active_free'    => 'active active-menu'
        ];

        return view('godmode/layout/admin_wrapper', $mdata);
    }

    public function createfree()
    {
        // Validation Field
        $rules = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            'expired' => [
                'label' => 'Free Member Expiration Date',
                'rules' => 'required'
            ],
        ]);
    
        // Checking Validation
        if (!$rules) {
            session()->setFlashdata('error_validation', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'godmode/freemember');
        }
    
        // Init Data
        $mdata = [
            'email'   => htmlspecialchars($this->request->getVar('email')),
            'expired' => htmlspecialchars($this->request->getVar('expired')),
        ];
    
        // Process API Request
        $url = URLAPI . "/v1/member/create_freemember";
        $response = satoshiAdmin($url, json_encode($mdata));
    
        // Debugging the API Response
        if (!$response) {
            log_message('error', 'No response from API');
            session()->setFlashdata('failed', 'No response from API.');
            return redirect()->to(BASE_URL . 'godmode/freemember');
        }
    
        // Handle Response with Null Result
        if ($response->status == 201) {
            // Success case with status but no result data
            $subject = "Free Member Registration - " . SATOSHITITLE;
            sendmail_satoshi($mdata['email'], $subject, emailtemplate_free_account($mdata['email']));
            session()->setFlashdata('success', "Free membership has been created successfully");
            return redirect()->to(BASE_URL . 'godmode/freemember');
        } elseif ($response->result && isset($response->result->code) && $response->result->code != 201) {
            // Handle specific API error messages
            session()->setFlashdata('failed', $response->result->message ?? 'Failed to create free membership.');
            return redirect()->to(BASE_URL . 'godmode/freemember');
        } else {
            // Generic failure case
            log_message('error', 'Unexpected API Response: ' . json_encode($response));
            session()->setFlashdata('failed', 'Unexpected API response.');
            return redirect()->to(BASE_URL . 'godmode/freemember');
        }
    }


    public function detailmember($email)
    {

        // Call Get Memeber By Email
        $url = URLAPI . "/auth/getmember_byemail?email=".base64_decode($email);
        $resultMember = satoshiAdmin($url)->result->message;

        // Call Get Detail Referral
        $url = URLAPI . "/v1/member/detailreferral?id=".$resultMember->id;
        $resultReferral = satoshiAdmin($url)->result->message;

        $mdata = [
            'title'     => 'Detail Member - ' . SATOSHITITLE,
            'content'   => 'godmode/freemember/detail_freemember',
            'extra'     => 'godmode/freemember/js/_js_detailreferral',
            'active_free'  => 'active',
            'member'    => $resultMember,
            'referral'  => $resultReferral,
            'emailreferral' => base64_decode($email),
        ];

        return view('godmode/layout/admin_wrapper', $mdata);
    }

    
}