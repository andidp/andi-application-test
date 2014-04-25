<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->library( 'template' ); 
		$this->load->model( 'model_articles' ); 
		
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
        $this->model_articles->pagination( TRUE );
		$data_info = $this->model_articles->lister( $page );
        $fields = $this->model_articles->fields( TRUE );
        

        $this->template->assign( 'pager', $this->model_articles->pager );
		$this->template->assign( 'articles_fields', $fields );
		$this->template->assign( 'articles_data', $data_info );
        $this->template->assign( 'table_name', 'Articles' );
        $this->template->assign( 'template', 'list_articles' );
        
		$this->template->display( 'frame_admin.tpl' );
    }



    /**
     *  SHOWS A RECORD VIEW
     */
    function show( $id )
    {
		$data = $this->model_articles->get( $id );
        $fields = $this->model_articles->fields( TRUE );
        

        
        $this->template->assign( 'id', $id );
		$this->template->assign( 'articles_fields', $fields );
		$this->template->assign( 'articles_data', $data );
		$this->template->assign( 'table_name', 'Articles' );
		$this->template->assign( 'template', 'show_articles' );
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
                $fields = $this->model_articles->fields();
                
                
                
                $this->template->assign( 'action_mode', 'create' );
        		$this->template->assign( 'articles_fields', $fields );
                $this->template->assign( 'metadata', $this->model_articles->metadata() );
        		$this->template->assign( 'table_name', 'Articles' );
        		$this->template->assign( 'template', 'form_articles' );
        		$this->template->display( 'frame_admin.tpl' );
            break;

            /**
             *  Insert data TO articles table
             */
            case 'POST':
                $fields = $this->model_articles->fields();

                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'title', lang('title'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'content', lang('content'), 'required' );
				$this->form_validation->set_rules( 'publication_date', lang('publication_date'), 'required' );

				$data_post['title'] = $this->input->post( 'title' );
				$data_post['content'] = $this->input->post( 'content' );
				$data_post['publication_date'] = $this->input->post( 'publication_date' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'errors', $errors );
              		$this->template->assign( 'action_mode', 'create' );
            		$this->template->assign( 'articles_data', $data_post );
            		$this->template->assign( 'articles_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_articles->metadata() );
            		$this->template->assign( 'table_name', 'Articles' );
            		$this->template->assign( 'template', 'form_articles' );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
                    $insert_id = $this->model_articles->insert( $data_post );
                    
					redirect( 'articles' );
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
                $this->model_articles->raw_data = TRUE;
        		$data = $this->model_articles->get( $id );
                $fields = $this->model_articles->fields();
                
                
                
                
          		$this->template->assign( 'action_mode', 'edit' );
        		$this->template->assign( 'articles_data', $data );
        		$this->template->assign( 'articles_fields', $fields );
                $this->template->assign( 'metadata', $this->model_articles->metadata() );
        		$this->template->assign( 'table_name', 'Articles' );
        		$this->template->assign( 'template', 'form_articles' );
        		$this->template->assign( 'record_id', $id );
        		$this->template->display( 'frame_admin.tpl' );
            break;
    
            case 'POST':
    
                $fields = $this->model_articles->fields();
                /* we set the rules */
                /* don't forget to edit these */
				$this->form_validation->set_rules( 'title', lang('title'), 'required|max_length[255]' );
				$this->form_validation->set_rules( 'content', lang('content'), 'required' );
				$this->form_validation->set_rules( 'publication_date', lang('publication_date'), 'required' );

				$data_post['title'] = $this->input->post( 'title' );
				$data_post['content'] = $this->input->post( 'content' );
				$data_post['publication_date'] = $this->input->post( 'publication_date' );

                if ( $this->form_validation->run() == FALSE )
                {
                    $errors = validation_errors();
                    
                    
                    
                    
              		$this->template->assign( 'action_mode', 'edit' );
              		$this->template->assign( 'errors', $errors );
            		$this->template->assign( 'articles_data', $data_post );
            		$this->template->assign( 'articles_fields', $fields );
                    $this->template->assign( 'metadata', $this->model_articles->metadata() );
            		$this->template->assign( 'table_name', 'Articles' );
            		$this->template->assign( 'template', 'form_articles' );
        		    $this->template->assign( 'record_id', $id );
            		$this->template->display( 'frame_admin.tpl' );
                }
                elseif ( $this->form_validation->run() == TRUE )
                {
				    $this->model_articles->update( $id, $data_post );
				    
					redirect( 'articles/show/' . $id );   
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
                $this->model_articles->delete( $id );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;

            case 'POST':
                $this->model_articles->delete( $this->input->post('delete_ids') );
                redirect( $_SERVER['HTTP_REFERER'] );
            break;
        }
    }
}
