<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Account Controller
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Controller
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

class Accounts extends MY_Controller
{
    
    public $module = 'accounts';
    
    public function index ()
    {
       parent :: index ();
    }
    
    public function profile ()
    {
        
        $this->load->helper('form');
        
        if ($_POST)
        {
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('username','Username','required|min_length[5]');
            $this->form_validation->set_rules('nama_lengkap','Nama lengkap','required|min_length[5]');
            
            if ($this->form_validation->run())
            {
                $arr1 = $arr2 = array('id' => $this->auth->data('user_id'));
                
                $arr2['username']     = $this->input->post('username');
                $arr2['nama_lengkap'] = $this->input->post('nama_lengkap');
                
                // if password is exist
                if ($this->input->post('password'))
                {
                    $arr2['password ']    = $this->input->post('password');
                }
                
                if ($this->db->update('user', $arr2, $arr1))
                {
                    setSucces('Profile is updated');
                }
                else
                {
                    setError('Can not update profile');
                }
            }
        }
        
        $u = new Users_m();
        $this->params['u'] = $u->where('id',$this->auth->data('user_id'))->get();
        parent :: update();
        
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
                    
                    if ($cek = $u->login())
                    {   
                        $this->auth->save($cek);
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