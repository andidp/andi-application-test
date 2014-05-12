
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('model_users');

        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('db_fields', 'english'); // This is the language file
        $this->lang->load( 'messages', 'english' ); // This is the language file
    }

    function index()
    {
        
    }

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Register a new user
     */
    function register()
    {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD'])
        {
            case 'GET':
                $fields = $this->model_users->fields();
                $role_options = $this->model_users->roleOptions();

                $this->template->assign('action_mode', 'register');
                $this->template->assign('users_fields', $fields);
                $this->template->assign('metadata', $this->model_users->metadata());
                $this->template->assign('table_name', 'Users');
                $this->template->assign('template', 'form_register');
                $this->template->display('frame_frontend.tpl');
                break;

            /**
             *  Insert data TO users table
             */
            case 'POST':
                $fields = $this->model_users->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('username', lang('username'), 'required|is_unique[users.username]|155');
                $this->form_validation->set_rules('email', lang('email'), 'required|valid_email|is_unique[users.email]|max_length[100]');
                $this->form_validation->set_rules('password', lang('password'), 'required|155');

                /* set role as author if user register from front site */
                $data_post['role'] = 'author';

                $data_post['username'] = $this->input->post('username');
                $data_post['email'] = $this->input->post('email');
                $data_post['password'] = $this->input->post('password');
                $data_post['user_status'] = $this->input->post('user_status');
                $data_post['created'] = date('Y-m-d H:i:s');

                if ($this->form_validation->run() == FALSE)
                {
                    $errors = validation_errors();

                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'register');
                    $this->template->assign('users_data', $data_post);
                    $this->template->assign('users_fields', $fields);
                    $this->template->assign('metadata', $this->model_users->metadata());
                    $this->template->assign('table_name', 'Users');
                    $this->template->assign('template', 'form_register');
                    $this->template->display('frame_frontend.tpl');
                } elseif ($this->form_validation->run() == TRUE)
                {
                    $insert_id = $this->model_users->insert($data_post);

                    redirect('front/register');
                }
                break;
        }
    }

    function forgot_password()
    {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD'])
        {
            case 'GET':
                $fields = $this->model_users->fields();

                $this->template->assign('action_mode', 'forgot_password');
                $this->template->assign('users_fields', $fields);
                $this->template->assign('metadata', $this->model_users->metadata());
                $this->template->assign('table_name', 'Users');
                $this->template->assign('template', 'form_forgot_password');
                $this->template->display('frame_frontend.tpl');
                break;

            /**
             *  Insert data TO users table
             */
            case 'POST':
                $this->load->library('sendmail');
                $fields = $this->model_users->fields();

                /* we set the rules */
                /* don't forget to edit these */
                $this->form_validation->set_rules('email', lang('email'), 'required|valid_email|max_length[100]');

                /* set role as author if user register from front site */

                $data_post['email'] = $this->input->post('email');

                if ($this->form_validation->run() == FALSE)
                {
                    $errors = validation_errors();

                    $this->template->assign('errors', $errors);
                    $this->template->assign('action_mode', 'register');
                    $this->template->assign('users_data', $data_post);
                    $this->template->assign('users_fields', $fields);
                    $this->template->assign('metadata', $this->model_users->metadata());
                    $this->template->assign('table_name', 'Users');
                    $this->template->assign('template', 'form_forgot_password');
                    $this->template->display('frame_frontend.tpl');
                    
                } elseif ($this->form_validation->run() == TRUE)
                {
                    
                    /* find is there active user by email in database ? */
                    $emailCheck = $this->model_users->findByUniqueField('email', $data_post['email']);
                    //pr($emailCheck);exit;
                    if (!empty($emailCheck))
                    {
                        $data_post['token'] = md5(time() . $data_post['email']);
                        $token = $data_post['token'];
                        $update_user = $this->model_users->update( $emailCheck['id'], $data_post );
                        if ($update_user) 
                        {
                            $email = $data_post['email'];
                            $url = base_url()."front/reset_password/$token/$email";
                            $data_post['reset_url'] = "<a href='$url'>$url</a>" ;
                            
                            if ($this->sendmail->send_email(
                                            $data_post, 'appltestemail@gmail.com', 
                                                'Andi Application Test Admin', 
                                                    $data_post['email'], 
                                                        'Email konfirmasi'
                                    ))
                            {
                                $message = lang('fp_message_success');
                                $this->template->assign('message', $message);
                            }
                        }
                        
                    } else
                    {
                        $message = lang('fp_message_failled');
                        $this->template->assign('message', $message);
                    }
                    
                    $this->template->assign('action_mode', 'forgot_password');
                    $this->template->assign('users_fields', $fields);
                    $this->template->assign('metadata', $this->model_users->metadata());
                    $this->template->assign('table_name', 'Users');
                    $this->template->assign('template', 'form_forgot_password');
                    $this->template->display('frame_frontend.tpl');

                    //redirect('front/forgot_password');
                }
                break;
        }
    }
    
    function reset_password($token = null, $email = null)
    {
        $this->load->library('form_validation');

        switch ($_SERVER ['REQUEST_METHOD'])
        {
            case 'GET':
                $fields = $this->model_users->fields();
                $user = $this->model_users->findByUniqueField('token', $token);

                $this->template->assign('action_mode', 'reset_password');
                $this->template->assign('users_fields', $fields);
                $this->template->assign('user', $user);
                $this->template->assign('metadata', $this->model_users->metadata());
                $this->template->assign('table_name', 'Users');
                $this->template->assign('template', 'form_reset_password');
                $this->template->display('frame_frontend.tpl');
                break;

            /**
             *  Insert data TO users table
             */
            case 'POST':
                $fields = $this->model_users->fields();

                $data_post['id'] = $this->input->post('id');
                $data_post['token'] = $this->input->post('token');
                $data_post['password'] = $this->input->post('password');
                $data_post['confirm_password'] = $this->input->post('confirm_password');
                
                if ($data_post['password'] != $data_post['confirm_password'])
                {
                    $this->template->assign('action_mode', 'reset_password');
                    $this->template->assign('users_data', $data_post);
                    $this->template->assign('users_fields', $fields);
                    $this->template->assign('metadata', $this->model_users->metadata());
                    $this->template->assign('table_name', 'Users');
                    $this->template->assign('template', 'form_reset_password');
                    
                    $message = lang('rp_message_failled');
                    $this->template->assign('message', $message);
                    
                    $this->template->display('frame_frontend.tpl');
                    
                } else
                {
                    $data_post['token'] = '';
                    unset($data_post['confirm_password']);
                    
                    $update_user = $this->model_users->update( $data_post['id'], $data_post );
                    
                    if ($update_user) {
                        $message = lang('rp_message_success');
                        $this->template->assign('message', $message);
                    }
                    
                    $this->template->assign('action_mode', 'login/validate');
                    $this->template->assign('users_fields', $fields);
                    $this->template->assign('metadata', $this->model_users->metadata());
                    $this->template->assign('table_name', 'Users');
                    $this->template->assign('template', 'form_login');
                    $this->template->display('frame_frontend.tpl');

                }
                break;
        }
    }

}
