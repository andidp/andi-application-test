<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_users extends CI_Model
{

    /**
     * user status
     */
    public $status = array(
        'inactive',
        'active'
    );

    function __construct()
    {
        parent::__construct();

        $this->load->database();

        // Paginaiton defaults
        $this->pagination_enabled = FALSE;
        $this->pagination_per_page = 10;
        $this->pagination_num_links = 5;
        $this->pager = '';

        /**
         *    bool $this->raw_data		
         *    Used to decide what data should the SQL queries retrieve if tables are joined
         *     - TRUE:  just the field names of the users table
         *     - FALSE: related fields are replaced with the forign tables values
         *    Triggered to TRUE in the controller/edit method		 
         */
        $this->raw_data = FALSE;
    }

    function get($id, $get_one = false)
    {

        $select_statement = ( $this->raw_data ) ? 'id,role,username,email,password,user_status,token,last_login,created,updated' : 'id,role,username,email,password,user_status,token,last_login,created,updated';
        $this->db->select($select_statement);
        $this->db->from('users');


        // Pick one record
        // Field order sample may be empty because no record is requested, eg. create/GET event
        if ($get_one)
        {
            $this->db->limit(1, 0);
        } else // Select the desired record
        {
            $this->db->where('id', $id);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            return array(
                'id' => $row['id'],
                'role' => $row['role'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password'],
                'user_status' => $row['user_status'],
                'token' => $row['token'],
                'last_login' => $row['last_login'],
                'created' => $row['created'],
                'updated' => $row['updated'],
            );
        } else
        {
            return array();
        }
    }

    function insert($data)
    {
        if (isset($data['password']))
        {
            $data['password'] = md5($data['password']);
        }

        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function update($id, $data)
    {
        if (isset($data['password']))
        {
            $data['password'] = md5($data['password']);
        }
        
        $this->db->where('id', $id);
        if ($this->db->update('users', $data) ){
            return TRUE;
        }
    }

    function delete($id)
    {
        if (is_array($id))
        {
            $this->db->where_in('id', $id);
        } else
        {
            $this->db->where('id', $id);
        }
        $this->db->delete('users');
    }

    function lister($page = FALSE)
    {

        $this->db->start_cache();
        $this->db->select('id,role,username,email,password,user_status,token,last_login,created,updated');
        $this->db->from('users');
        //$this->db->order_by( '', 'ASC' );


        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE)
        {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('users');
            $config['base_url'] = 'users/index/';
            $config['uri_segment'] = 3;
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        // Get the results
        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row)
        {
            $temp_result[] = array(
                'id' => $row['id'],
                'role' => $row['role'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password'],
                'user_status' => $row['user_status'],
                'token' => $row['token'],
                'last_login' => $row['last_login'],
                'created' => $row['created'],
                'updated' => $row['updated'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    function search($keyword, $page = FALSE)
    {
        $meta = $this->metadata();
        $this->db->start_cache();
        $this->db->select('id,role,username,email,password,user_status,token,last_login,created,updated');
        $this->db->from('users');


        // Delete this line after setting up the search conditions 
        die('Please see models/model_users.php for setting up the search method.');

        /**
         *  Rename field_name_to_search to the field you wish to search 
         *  or create advanced search conditions here
         */
        $this->db->where('field_name_to_search LIKE "%' . $keyword . '%"');

        /**
         *   PAGINATION
         */
        if ($this->pagination_enabled == TRUE)
        {
            $config = array();
            $config['total_rows'] = $this->db->count_all_results('users');
            $config['base_url'] = '/users/search/' . $keyword . '/';
            $config['uri_segment'] = 4;
            $config['per_page'] = $this->pagination_per_page;
            $config['num_links'] = $this->pagination_num_links;

            $this->load->library('pagination');
            $this->pagination->initialize($config);
            $this->pager = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $page);
        }

        $query = $this->db->get();

        $temp_result = array();

        foreach ($query->result_array() as $row)
        {
            $temp_result[] = array(
                'id' => $row['id'],
                'role' => $row['role'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password'],
                'user_status' => $row['user_status'],
                'token' => $row['token'],
                'last_login' => $row['last_login'],
                'created' => $row['created'],
                'updated' => $row['updated'],
            );
        }
        $this->db->flush_cache();
        return $temp_result;
    }

    /**
     *  Some utility methods
     */
    function fields($withID = FALSE)
    {
        $fs = array(
            'id' => lang('id'),
            'role' => lang('role'),
            'username' => lang('username'),
            'email' => lang('email'),
            'password' => lang('password'),
            'user_status' => lang('user_status'),
            'token' => lang('token'),
            'last_login' => lang('last_login'),
            'created' => lang('created'),
            'updated' => lang('updated')
        );

        if ($withID == FALSE)
        {
            unset($fs[0]);
        }
        return $fs;
    }

    function pagination($bool)
    {
        $this->pagination_enabled = ( $bool === TRUE ) ? TRUE : FALSE;
    }

    /**
     *  Parses the table data and look for enum values, to match them with language variables
     */
    function metadata()
    {
        $this->load->library('explain_table');

        $metadata = $this->explain_table->parse('users');

        foreach ($metadata as $k => $md)
        {
            if (!empty($md['enum_values']))
            {
                $metadata[$k]['enum_names'] = array_map('lang', $md['enum_values']);
            }
        }
        return $metadata;
    }

    /**
     * options role
     *
     */
    function roleOptions()
    {
        return array(
            'superadmin' => 'Superadmin',
            'admin' => 'Admin',
            'author' => 'Author',
            'guest' => 'Guest'
        );
    }

    /**
     * get user data with parameter: username
     */
    function findByUniqueField($field, $value)
    {

        $fields = array(
            'id', 'role', 'username', 'email', 'password',
            'user_status', 'token', 'last_login', 'created,updated'
        );

        $select_statement = ( $this->raw_data ) ? 'id,role,username,email,password,user_status,token,last_login,created,updated' : 'id,role,username,email,password,user_status,token,last_login,created,updated';
        $this->db->select($select_statement);
        $this->db->from('users');

        if (in_array($field, $fields))
        {
            $this->db->where($field, $value);
        }
        
        $this->db->where('user_status', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            return array(
                'id' => $row['id'],
                'role' => $row['role'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password'],
                'user_status' => $row['user_status'],
                'token' => $row['token'],
                'last_login' => $row['last_login'],
                'created' => $row['created'],
                'updated' => $row['updated'],
            );
        } else
        {
            return array();
        }
    }

}
