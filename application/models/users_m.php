<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_m extends DataMapper {
    
    var $model = 'users_m';
    var $table = 'user';
    var $has_many = array('berita_m');
    var $has_one = array();
    var $_session_key = '76112dasdsa^%$';

    public function login()
    {
        // Create a temporary user object
        $u = new Users_m();

        // Get this users stored record via their username
        $u->where('username', $this->username)
            ->where('password', $this->password)
            ->get();

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($u->id))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */