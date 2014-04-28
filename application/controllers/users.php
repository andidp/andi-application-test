<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_users' ); 
		
		$this->load->helper( 'form' );
		$this->load->helper( 'language' ); 
		$this->load->helper( 'url' );
        $this->load->model( 'model_auth' );

        $this->logged_in = $this->model_auth->check( TRUE );
        $this->template->assign( 'logged_in', $this->logged_in );

		$this->lang->load( 'db_fields', 'english' ); // This is the language file
	}



    /**
     *  LISTS MODEL DATA INTO A TABLE
     */         
    function index( $page = 0 )
    {
        $this->model_users->pagination( TRUE );
		$data_info = $this->model_users->lister( $page );
        $fields = $this->model_users->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_users->pager );
		$this->template->assign( 'users_fields', $fields );
		$this->template->assign( 'users_data', $data_info );
        $this->template->assign( 'table_name', 'Users' );
        $this->template->assign( 'template', 'list_users' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_users->get( $id );
        $fields = $this->model_users->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'users_fields', $fields );
		$this->template->assign( 'users_data', $data );
		$this->template->assign( 'table_name', 'Users' );
		$this->template->assign( 'template', 'show_users' );
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A FROM, AND HANDLES SAVING IT
     */         
    function create( $id = false )
    {
		$this->load->library('form_validation');
        
		switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $fields = $this->model_users->fields();
                $role_options = $this->model_users->roleOptions();
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'users_fields', $fields );
        		$this->template->assign( 'role_options', $role_options );
                $this->template->assign( 'metadata', $this->model_users->metadata() );
        		$this->template->assign( 'table_name', 'Users' );
        		$this->template->assign( 'template', 'form_users' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO users table
             */
            case 'POST':
                $fields = $this->model_users->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'username', lang('username'), '155' );
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'password', lang('password'), '155' );
				$this->form_validation->set_rules( 'user_status', lang('user_status'), 'required|max_length[2]|integer' );
				$this->form_validation->set_rules( 'token', lang('token'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'last_login', lang('last_login'), 'required' );

				$data_post['role'] = $this->input->post( 'role' );
				$data_post['username'] = $this->input->post( 'username' );
				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['user_status'] = $this->input->post( 'user_status' );
				$data_post['token'] = $this->input->post( 'token' );
				$data_post['last_login'] = $this->input->post( 'last_login' );
				$data_post['created'] = $this->input->post( 'created' );
				$data_post['updated'] = $this->input->post( 'updated' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'users_data', $data_post );
            		$this->template->assign( 'users_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_users->metadata() );
            		$this->template->assign( 'table_name', 'Users' );
            		$this->template->assign( 'template', 'form_users' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_users->insert( $data_post );
                    
					redirect( 'users' );
                }
            break;
        }
    }



    /**
     *  DISPLAYS THE POPULATED FORM OF THE RECORD
     *  This method uses the same template as the create method
     */
    function edit( $id = false )
    {
        $this->load->library('form_validation');

        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_users->raw_data = TRUE;
        		$data = $this->model_users->get( $id );
                $fields = $this->model_users->fields();
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'users_data', $data );
        		$this->template->assign( 'users_fields', $fields );
                $this->template->assign( 'metadata', $this->model_users->metadata() );
        		$this->template->assign( 'table_name', 'Users' );
        		$this->template->assign( 'template', 'form_users' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_users->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'username', lang('username'), '155' );
				$this->form_validation->set_rules( 'email', lang('email'), 'required|max_length[100]' );
				$this->form_validation->set_rules( 'password', lang('password'), '155' );
				$this->form_validation->set_rules( 'user_status', lang('user_status'), 'required|max_length[2]|integer' );
				$this->form_validation->set_rules( 'token', lang('token'), 'required|max_length[50]' );
				$this->form_validation->set_rules( 'last_login', lang('last_login'), 'required' );

				$data_post['role'] = $this->input->post( 'role' );
				$data_post['username'] = $this->input->post( 'username' );
				$data_post['email'] = $this->input->post( 'email' );
				$data_post['password'] = $this->input->post( 'password' );
				$data_post['user_status'] = $this->input->post( 'user_status' );
				$data_post['token'] = $this->input->post( 'token' );
				$data_post['last_login'] = $this->input->post( 'last_login' );
				$data_post['created'] = $this->input->post( 'created' );
				$data_post['updated'] = $this->input->post( 'updated' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'users_data', $data_post );
            		$this->template->assign( 'users_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_users->metadata() );
            		$this->template->assign( 'table_name', 'Users' );
            		$this->template->assign( 'template', 'form_users' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_users->update( $id, $data_post );
				    
					redirect( 'users/show/' . $id );   
                }
            break;
        }
    }



    /**
     *  DELETE RECORD(S)
     *  The 'delete' method of the model accepts int and array  
     */
    function delete( $id = FALSE )
    {
        switch ( $_SERVER ['REQUEST_METHOD'] )
        {
            case 'GET':
                $this->model_users->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_users->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
