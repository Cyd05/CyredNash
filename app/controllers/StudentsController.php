<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentsController
 *
 * Automatically generated via CLI.
 */
class StudentsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
        $this->call->library('Session');
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        // Get current page (default 1)
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        // Get search query (optional)
        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5; // number of users per page

        // Call model's pagination method
        $all = $this->StudentsModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Configure pagination
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('tailwind'); // themes: bootstrap, tailwind, custom
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('users/index').'?q='.$q);

        // Send data to view
        $data['page'] = $this->pagination->paginate();
        $data['current_role'] = $this->session->userdata('role') ?? 'user';
        $this->call->view('users/index', $data);
    }

    function create(){
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        if($this->io->method() == 'post'){
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->StudentsModel->insert($data)){
                redirect('users/index');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('users/create');
        }
    }

    function update($id){
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user = $this->StudentsModel->find($id);
        if(!$user){
            echo "User not found.";
            return;
        }

        if($this->io->method() == 'post'){
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if($this->StudentsModel->update($id, $data)){
                redirect('users/index');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    function delete($id){
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }

        if($this->StudentsModel->delete($id)){
            redirect('users/index');
        }else{
            echo "Error in deleting user.";
        }
    }

    public function login() {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->StudentsModel->user_login($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('role', $user['role']);
                redirect('/users/index');
            } else {
                $data['error'] = 'Invalid username or password';
                $this->call->view('user_auth/login', $data);
            }
        } else {
            $this->call->view('user_auth/login');
        }
    }

    public function register() {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ];

            if ($this->StudentsModel->user_register($data)) {
                redirect('login');
            } else {
                $data['error'] = 'Registration failed. Please try again.';
                $this->call->view('user_auth/register', $data);
            }
        } else {
            $this->call->view('user_auth/register');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
