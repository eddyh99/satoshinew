<?php

namespace App\Controllers\Member;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    
    public function register(){
         $mdata = [
            'title'     => 'Register - Satoshi Signal' ,
            'content'   => 'member/subscription/register',
            'extra'     => 'member/subscription/js/_js_register',
        ];

        return view('member/layout/wrapper', $mdata);
    }
    
    public function signup(){
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
            return redirect()->to(BASE_URL . 'member/auth/register')->withInput();
        }

        // Initial Data
        $mdata = [
            'email'         => htmlspecialchars($this->request->getVar('email')),
            'password'      => htmlspecialchars($this->request->getVar('password')),
            'referral'      => htmlspecialchars($this->request->getVar('referral')),
            'ipaddress'     => $this->request->getIPAddress(),
        ];
        
        // Trim Data
        $mdata['password'] = trim($mdata['password']);

        // Password Encrypt
        $mdata['password'] = sha1($mdata['password']);

        // Proccess Endpoin API
        $url = URLAPI . "/auth/register";
        $response = satoshiAdmin($url, json_encode($mdata));
        $result = $response->result;
        if ($result->code==201){
            $this->send_activation(urlencode($mdata["email"]),$result->message->token);
            return redirect()->to(BASE_URL . 'member/auth/pricing?email='.$mdata["email"]); 
        }else{
            session()->setFlashdata('failed', $result->message);
            return redirect()->to(BASE_URL . 'member/auth/register'); 
        }
    }
    
    public function pricing(){
        // Call Endpoin total_exclusive
        $url = URLAPI . "/auth/readprice";
        $result = satoshiAdmin($url)->result->message;
        
        $email = @$_GET['mail'];
        
        // Call Endpoin Member
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $resultMember = satoshiAdmin($url)->result->message;

        $ref = @$resultMember->id_referral;
        $mdata = [
            'title'     => 'Subscription - Satoshi Signal' ,
            'content'   => 'widget/subscription/subscription',
            'extra'     => 'widget/subscription/js/_js_subcription',
            'subsprice' => $result,
            'ref'       => $ref,
            'email'     => $email
        ];

        return view('widget/layout/wrapper', $mdata);
    }
    
	public function index(){
		$mdata = [
			'title'     => 'Active Account - Satoshi Signal' ,
			'content'   => 'widget/auth/active_account_success',
			'extra'     => 'widget/js/_js_subcription',
		];            
		return view('widget/layout/wrapper', $mdata);
	}


    public function active_account($token)
    {
        // Call Endpoin Active Account
        $url = URLAPI . "/auth/activate?token=".$token;
        $result = satoshiAdmin($url)->result;

		$mdata = [
			'title'     => 'Active Account - Satoshi Signal' ,
			'content'   => 'widget/auth/active_account_success',
			'extra'     => 'widget/js/_js_subcription',
		];            

		return view('widget/layout/wrapper', $mdata);
    }

    public function send_activation($email,$token)
	{
		$email = urldecode($email);
		$subject = "Satoshi Signal - Activation Account";


		$token = $token;

		$message = "
		<!DOCTYPE html>
		<html lang='en'>

		<head>
			<meta name='color-scheme' content='light'>
			<meta name='supported-color-schemes' content='light'>
			<title>Activation Account Satoshi Signal</title>
		</head>

		<body>
			<div style='
			max-width: 420px;
			margin: 0 auto;
			position: relative;
			padding: 1rem;
			'>
				<div style='
				text-align: center;
				padding: 3rem;
				'>
					<h3 style='
					font-weight: 600;
					font-size: 30px;
					line-height: 45px;
					color: #000000;
					margin-bottom: 1rem;
					text-align: center;
					'>
						Dear, User
					</h3>
				</div>

				<div style='
				text-align: center;
				padding-bottom: 1rem;
				'>
					<p style='
					font-weight: 400;
					font-size: 14px;
					color: #000000;
					'>
						Thank you for register Satoshi Signal. To proceed with your request, please click link Active Account Below
					</p>
					<h2><a target='_blank' href='".BASE_URL."auth/active_account/".$token."'></a>".BASE_URL."auth/active_account/".$token."</h2>
					<p style='
					font-weight: 400;
					font-size: 14px;
					color: #000000;
					'>
						Best regards,<br>  
						Satoshi Signal Team

					</p>
				</div>
				<hr>
				<hr>
				<p style='
				text-align: center;
				font-weight: 400;
				font-size: 12px;
				color: #999999;
				'>
					Copyright © " . date('Y') . "
				</p>
			</div>
		</body>
		</html>";

		sendmail_satoshi($email, $subject, $message);
	}

    public function send_resetpassword($email)
	{
		$email = urldecode($email);
		$subject = "Satoshi Signal - Reset Password";

		
        // Call Endpoin Member
        $url = URLAPI . "/auth/getmember_byemail?email=".$email;
        $resultMember = satoshiAdmin($url)->result->message;

		
		$message = "
		<!DOCTYPE html>
		<html lang='en'>

		<head>
			<meta name='color-scheme' content='light'>
			<meta name='supported-color-schemes' content='light'>
			<title>Activation Account Satoshi Signal</title>
		</head>

		<body>
			<div style='
			max-width: 420px;
			margin: 0 auto;
			position: relative;
			padding: 1rem;
			'>
				<div style='
				text-align: center;
				padding: 3rem;
				'>
					<h3 style='
					font-weight: 600;
					font-size: 20px;
					line-height: 45px;
					color: #000000;
					margin-bottom: 1rem;
					text-align: center;
					'>
						Dear, <br> ".$email."
					</h3>
				</div>

				<div style='
				text-align: center;
				padding-bottom: 1rem;
				'>
					<p style='
					font-weight: 400;
					font-size: 14px;
					color: #000000;
					'>
						Thank you for using Satoshi Signal App. To proceed with your request, please copy token reset password below 
					</p>
					<h2 id='copyToken'>
						".$resultMember->token."
					</h2>
					<p style='
					font-weight: 400;
					font-size: 14px;
					color: #000000;
					'>
						Best regards,<br>  
						Satoshi Signal Team

					</p>
				</div>
				<hr>
				<hr>
				<p style='
				text-align: center;
				font-weight: 400;
				font-size: 12px;
				color: #999999;
				'>
					Copyright © " . date('Y') . "
				</p>
			</div>
		</body>
		</html>";

		sendmail_satoshi($email, $subject, $message);
	}
}