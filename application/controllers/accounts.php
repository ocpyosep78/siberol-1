<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller
{
    
    public $module = 'accounts';
    
    public function index ()
    {
        $u = new Users_m();
        
        parent :: index ();
    }
    
    public function login()
    {
        $this->load->helper(array('form'));
        
        if ($_POST)
        {
            if (validasi_capth())
            {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('username','Username','trim|required');
                $this->form_validation->set_rules('password','Password','trim|required');
                
                if ($this->form_validation->run())
                {
                    // create object
                    $u = new Users_m();
                    
                    // asign object
                    $u->username = $this->input->post('username');
                    $u->password = $this->input->post('password');
                    
                    if ($u->login())
                    {   
                        $this->auth->save($u->get());
                        redirect ($this->module);
                    }
                    else
                    {
                        setError('Username and password is not registered');
                    }
                }
            }
            else
            {
                setError('Captcha your enter not valid');
            }
            
        }
        
        $this->params['capth'] = buat_capt();
        parent :: index ('login');
    }
    
    public function logout ()
    {
        $this->auth->logout();
        redirect($this->module.'/login');
    }
    
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */