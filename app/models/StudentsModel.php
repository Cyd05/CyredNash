<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StudentsModel
 *
 * Automatically generated via CLI.
 */
class StudentsModel extends Model {
    protected $table = 'students';
    protected $user_table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q, $records_per_page = null, $page = null) {
        if (is_null($page)) {
            return $this->db->table($this->table)->get_all();
        } else {
            $query = $this->db->table($this->table);

            // Build LIKE conditions for search
            $query->like('id', '%'.$q.'%')
                  ->or_like('first_name', '%'.$q.'%')
                  ->or_like('last_name', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');

            // Clone before pagination for counting
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                             ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                     ->get_all();

            return $data;
        }
    }

    public function user_page($q, $records_per_page = null, $page = null) {
        if (is_null($page)) {
            return $this->db->table($this->user_table)->get_all();
        } else {
            $query = $this->db->table($this->user_table);

            // Build LIKE conditions for search
            $query->like('id', '%'.$q.'%')
                  ->or_like('username', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');

            // Clone before pagination for counting
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                             ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                     ->get_all();

            return $data;
        }
    }

    public function user_register($data) {
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->table($this->user_table)->insert($data);
    }

    public function user_login($username, $password) {
        $user = $this->db->table($this->user_table)
                         ->where('username', $username)
                         ->or_where('email', $username)
                         ->get();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
