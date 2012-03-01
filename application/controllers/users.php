<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Users Controller
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Controller
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

class Users extends MY_Controller{
    
    // set module is wartawan
    public $module = 'users';
    
    /**
     * Get all users
     *
     * @return  mixed
     */
    public function index ()
    {
        $u = new Users_m();
        
        $this->params['u'] = $u->get();
        parent :: index();
    }
    
    /**
     * Insert new users
     *
     * @return  mixed
     */
    public function insert ()
    {
        $this->load->helper('form');
        
        if ($_POST)
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[user.username]');
            $this->form_validation->set_rules('nama_lengkap','Nama lengkap','required|min_length[5]');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
            $this->form_validation->set_rules('tipe','Level user','required');
            
            if ($this->form_validation->run())
            {
                $u = new Users_m();
                $u->username     = $this->input->post('username');
                $u->nama_lengkap = $this->input->post('nama_lengkap');
                $u->password     = $this->input->post('password');
                $u->tipe         = $this->input->post('tipe');
                
                if ($u->skip_validation()->save())
                {
                    redirect($this->module);
                }
                else
                {
                    setError('Can not insert user');
                }
            }
        }
        
        parent :: insert();
    }
    
    /**
     * Update users
     * 
     */
    public function update ($id = null)
    {
        $u = new Users_m();
        
        $user = $u->where('id',$id)->get();
        
        if ( ! $u->exists())
        {
            $this->show_404();
        }
        else
        {
            $this->load->helper('form');
            if ($_POST)
            {
                $this->load->library('form_validation');
            
                $this->form_validation->set_rules('username','Username','required|min_length[5]');
                $this->form_validation->set_rules('nama_lengkap','Nama lengkap','required|min_length[5]');
                $this->form_validation->set_rules('tipe','Level user','required');
                
                if ($this->form_validation->run())
                {
                    $arr1 = $arr2 = array('id'=>$id);
                    
                    $arr2['username']     = $this->input->post('username');
                    $arr2['nama_lengkap'] = $this->input->post('nama_lengkap');
                    $arr2['tipe']         = $this->input->post('tipe');
                    
                    // if password is exist
                    if ($this->input->post('password'))
                    {
                        $arr2['password ']    = $this->input->post('password');
                    }
                    
                    if ($this->db->update('user', $arr2, $arr1))
                    {
                        redirect($this->module);
                    }
                    else
                    {
                        setError('Can not insert user');
                    }
                }
            }
            
            $this->params['u'] = $user;
            parent :: update();
        }
        
    }
    
    /**
     * Delete user
     *
     */
    public function delete ($id = null)
    {
        $u = new Users_m();
        
        $u->where('id',$id)->get();
        
        if ( ! $u->exists())
        {
            $this->show_404();
        }
        else
        {
            $this->load->helper('form');
            
            if ($_POST)
            {
                if ($u->delete())
                {
                    redirect($this->module.'/index');
                }
                else
                {
                    setError('Failed to delete ');
                }
            }
            parent :: delete();
        }
        
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */