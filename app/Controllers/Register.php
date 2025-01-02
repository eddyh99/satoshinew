<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        // Retrieve the referral code from the query parameters
        $ref = $this->request->getGet('ref');
        
        if (!empty($ref)) {
            // Construct the API URL with the referral code
            $url = URLAPI . "/v1/member/get_byreferral?refcode=" . $ref;
            $response = satoshiAdmin($url); // Assuming this is a helper function

            // Check the response from the API
            if ($response->status != 200) {
                session()->setFlashdata('error', "Referral not found. Please check and try again.");
            } else {
                // Set a cookie with a 7-day expiry time
                $expiry_time = time() + (7 * 24 * 60 * 60);
                setcookie("ref", $ref, $expiry_time, "/");
            }
        } else {
            session()->setFlashdata('error', "Referral not found. Please check and try again.");
        }

        // Redirect to the desired page
        return redirect()->to(BASE_URL . "homepage/register");
    }
}