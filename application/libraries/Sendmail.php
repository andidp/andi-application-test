<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sendmail
{

    function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->library('email');
        
        $this->initEmail();
    }
    
    function initEmail()
    {
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "appltestemail@gmail.com"; 
        $config['smtp_pass'] = "4nsOK6FH";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $this->CI->email->initialize($config);
    }

    function send_email($data, $email_from, $name_from, $email_to, $subject)
    {
        $this->CI->email->from($email_from, $name_from);
        $this->CI->email->to($email_to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($this->bodyMessage($data));

        try
        {
            if ($this->CI->email->send() ) 
            {
                return true;
            }
        } catch (Exception $exc)
        {
            echo $exc->getTraceAsString();
        }
    }
    
    function bodyMessage($data)
    {   
        $reset_url = $data['reset_url'];
        
        $body = '<html>';
        $body .= '<title>Email konfirmasi forgot password</title>';
        $body .= '<body>';
        $body .= "<h1>Request ganti password</h1>";
        $body .= "<p>Klik link dibawah ini atau copas dan jalankan dibrowser untuk merubah password anda</p<br>";
        $body .= "<p>$reset_url</p>";
        $body .= '<br><br>';
        $body .= '<p>Terimakasih</p>';
        $body .= '</body>';
        $body .= '</html>';
        
        return $body;
    }

}
