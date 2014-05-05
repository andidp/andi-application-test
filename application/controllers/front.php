
<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('template');
        $this->load->model('model_users');

        $this->load->helper('form');
        $this->load->helper('language');
        $this->load->helper('url');

        $this->lang->load('db_fields', 'english'); // This is the language file
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

}
