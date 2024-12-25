<?php

namespace App\Controllers\Referral;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function signin()
    {
        $mdata = [
            'title'     => 'Sign in - ' . SATOSHITITLE,
            'content'   => 'referral/auth/index',
            'extra'     => 'referral/auth/js/_js_index',
        ];

        return view('referral/layout/login_wrapper', $mdata);
    }

    public function auth_proccess()
    {
        // Validation Field
        $rules = $this->validate([
            'email'     => [
                'label'     => 'Email',
                'rules'     => 'required|valid_email'
            ],
            'password'     => [
                'label'     => 'Password',
                'rules'     => 'required'
            ],
        ]);

        // Checking Validation
        if(!$rules){
            session()->setFlashdata('failed', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'godmode/auth/signin')->withInput();
        }

        // Initial Data
        $mdata = [
            'email'         => htmlspecialchars($this->request->getVar('email')),
            'password'      => htmlspecialchars($this->request->getVar('password')),
        ];
        
        // Trim Data
        $mdata['password'] = trim($mdata['password']);

        // Password Encrypt
        $mdata['password'] = sha1($mdata['password']);

        // Proccess Endpoin API
        $url = URLAPI . "/auth/signin";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;


        if($response->status != 200 || $result->code != 200) {
            session()->setFlashdata('failed', $result->message);
            return redirect()->to(BASE_URL . 'referral/auth/signin');
        }else{
            $this->session->set('logged_user', $result->message);
            session()->setFlashdata('success', 'Welcome to admin panel');
            return redirect()->to(BASE_URL . 'referral/dashboard');
        }
    }
    
    public function activate_account($email){
        $email=base64_decode($email);
        $mdata = [
            'title'     => 'Sign in - ' . SATOSHITITLE,
            'content'   => 'referral/auth/create_password',
            'extra'     => 'referral/auth/js/_js_index',
            'email'     => $email
        ];

        return view('referral/layout/login_wrapper', $mdata);
    }
    
    public function activate(){
        // Validation Field
        $rules = $this->validate([
            'email'     => [
                'label'     => 'Email',
                'rules'     => 'required|valid_email'
            ],
            'password'     => [
                'label'     => 'Password',
                'rules'     => 'required'
            ],
            'confpassword'     => [
                'label'     => 'Confirm Password',
                'rules'     => 'required'
            ],
        ]);

        // Checking Validation
        $email  = htmlspecialchars($this->request->getVar('email'));
        if(!$rules){
            session()->setFlashdata('failed', $this->validation->listErrors());
            return redirect()->to(BASE_URL . 'referral/auth/activate_account/'.base64_encode($email))->withInput();
        }
        
        $pass   = htmlspecialchars($this->request->getVar('password'));
        $confpass = htmlspecialchars($this->request->getVar('confpassword'));
        
        if ($pass!=$confpass){
            session()->setFlashdata('failed', "Password and Confirm Password do not match");
            return redirect()->to(BASE_URL . 'referral/auth/activate_account/'.base64_encode($email))->withInput();
        }


        // Trim Data
        $mdata['password'] = trim(htmlspecialchars($this->request->getVar('password')));

        // Password Encrypt
        $mdata['password'] = sha1($mdata['password']);

        // Proccess Endpoin API
        $url = URLAPI . "/auth/referral_activate?email=".urlencode($email);
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;


        if($response->status != 200 || $result->code != 200) {
            session()->setFlashdata('failed', $result->message);
            return redirect()->to(BASE_URL . 'referral/auth/activate_account/'.base64_encode($email))->withInput();
        }else{
            $this->session->set('logged_user', $result->message);
            session()->setFlashdata('success', 'Welcome to Member panel');
            return redirect()->to(BASE_URL . 'referral/auth/signin');
        }
    }

    public function logout()
    {
        $this->session->remove('logged_user');
        return redirect()->to(BASE_URL . 'referral/auth/signin');
    }
}
