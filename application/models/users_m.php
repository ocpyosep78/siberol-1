<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Users
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Model
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */
class Users_m extends DataMapper {
    
    var $model = 'users_m';
    var $table = 'user';
    //var $has_many = array('berita_m');
    //var $has_one = array();
    var $_session_key = '76112dasdsa^%$';

    public function login()
    {
        // Create a temporary user object
        $u = new Users_m();

        // Get this users stored record via their username
        $loged = $u->where('username', $this->username)
                    ->where('password', $this->password)
                    ->get();

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($loged->id))
        {
            return FALSE;
        }
        else
        {
            return $loged;
        }
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */