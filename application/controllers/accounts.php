<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller
{
    
    public $module = 'accounts';
    
    public function index ()
    {
        $this->load->helper('text');
        
        $b = new Berita_m();
        $this->params['berita'] = $b->get();
        
        parent :: index ();
    }
    
    public function login()
    {
        $this->load->helper('form');
        
        if ($_POST)
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
                    setSucces('Login success');
                }
                else
                {
                    setError('Username and password is not registered');
                }
            }
        }
        
        parent :: index ('login');
    }
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */