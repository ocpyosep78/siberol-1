<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Auth Libraries
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Libraries
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

class Auth
{

    private $_session_key = '12^%$asdauyd787^';
    
    public function __construct()
    {
        $ci = & get_instance();
        $this->session = $ci->session;
    }
    
    /**
     * Save session
     * 
     * @access  public
     * @param   array
     * @return  string
     */
    public function save($loged)
    {
        $key = array (
            'user_id'       => $loged->id,
            'username'      => $loged->username,
            'nama_lengkap'  => $loged->nama_lengkap,
            'tipe'          => $loged->tipe
        );
        $this->session->set_userdata($this->_session_key, $key);
    }
    
    /**
     * Get data session
     * 
     * @access  public
     * @param   string
     * @return  string
     */
    public function data ($key)
    {
        $data = $this->session->userdata($this->_session_key);
        return $data[$key];
    }
    
    /**
     * Cek is login
     * 
     * @access public
     * @return void
     */
    public function is_secure ()
    {
        if ($this->session->userdata($this->_session_key))
        {
            return TRUE;
        }
    }
    
    /**
     * Cek is login
     * 
     * @access public
     * @return void
     */
    public function is_secure_redirect ()
    {
        if ( ! $this->is_secure())
        {
            redirect (base_url().'/accounts/login');
            exit;
        }
    }
    
    /**
     * Destroy session
     *
     * return array     data array session
     */
    public function logout()
    {
        return $this->session->unset_userdata($this->_session_key);
    }
}

/* End of file auth.php */
/* Location: ./application/libraries/auth.php */