<?php
class Auth extends CI_Controller
{

    public function login()
    {

        if (isset($_POST['submit'])) {

            $this->load->model('Model_auth');

            $check  = $this->Model_auth->login()->num_rows();
            $user   = $this->Model_auth->login()->row_array();

            if ($check != 0) {
                $data = array(
                    'id'                =>  $user['id'],
                    'level'             =>  $user['level'],
                    'no_uniq'           =>  $user['no_uniq'],
                    'username'          =>  $user['username'],
                    'password'          =>  $user['password'],
                    'nama_lengkap'      =>  $user['nama_lengkap'],
                    'tahun_ajaran'      =>  $user['tahun_ajaran'],
                    'semester'          =>  $user['semester']
                );
                $this->session->set_userdata($data);

                redirect('dashboard');
            } else {
                redirect('auth/login');
            }
        } else {
            afterlogin();
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        $this->load->view('auth/login');
    }
}
