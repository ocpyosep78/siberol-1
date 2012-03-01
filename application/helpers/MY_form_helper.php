<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Form Helper
 *
 * @license	MIT License
 * @category	Helpers
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

// ------------------------------------------------------------------------

/**
 * showErrors
 *
 * Show the error of the form validations
 *
 * @access	public
 * @return	object
 */

if ( ! function_exists('showErrors'))
{
    function showErrors()
    {
	$post = '';
	
	foreach(array_keys($_POST) as $key)
	{
	    $post .= form_error($key," ","\n");
	}
	return $post;
    }
}

// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

if ( ! function_exists('setError'))
{
    function setError($message)
    {	
	$CI = &get_instance();
	$CI->session->set_userdata('errorMessage', $message);
    }
}



// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

function setSucces($message)
{	
    $CI = &get_instance();
    $CI->session->set_userdata('succesMessage', $message);
}



// ------------------------------------------------------------------------

/**
 * View Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */


function view_errors($errorMessage=false)
{
    if ($errorMessage)
    {
	echo '<div class="alert alert-success">'.$errorMessage.'</div>';
	return false;
    }
    
    $CI = &get_instance();
    
    $err = $CI->session->userdata('errorMessage');
    if($err) echo '<ul class="alert alert-error unstyled">'.$err.'</ul>';
    $CI->session->unset_userdata('errorMessage');
    
    $succ = $CI->session->userdata('succesMessage');
    if($succ) echo '<ul class="alert alert-success unstyled">'.$succ.'</ul>';
    $CI->session->unset_userdata('succesMessage');
}

// ------------------------------------------------------------------------

/**
 * Get Post Array
 *
 * Get input form auth of the form validations
 *
 * @access	public
 * @param   array 
 * @return	object
 */

if ( ! function_exists('getPosts'))
{
	function getPosts($var){
		$post = array();
		$CI = &get_instance();
		    
		foreach($var as $v)
		{
		      $post[$v] = $CI->db->escape_str($CI->input->get_post($v, TRUE));
		}
		return $post;
	}
}


// handle captha
function buat_capt ()
{
    $CI = &get_instance();
    
    // random word untuk captcha
    $pool = '23456789ABCDEFGHJKLMNPRSTUVWXYZ';

    $str = '';
    for ($i = 0; $i < 4; $i++)
    {
	$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
    }

    // load helper capthca
    $CI->load->helpers ('captcha');
    $val=array (
		'word'          => $str,
		'img_path'	    =>	'./_assets/_writable/capth/',
		'img_url'	    =>	base_url().'_assets/_writable/capth/',
		'expiration'    => 150    /* ,
		'font_size'     => 50
		     ,     
		'img_width'  	=> '70',  
		'img_height' 	=> '20'  */
	    );
    $cap = create_captcha($val); 
    $data = array (
		    'captcha_time'	=>$cap['time'],
		    'ip_address'	=>$CI->input->ip_address(),
		    'word'		=>$cap['word']
    );
    $query = $CI->db->insert_string('captcha',$data);
    $CI->db->query($query);
	
    // captcha
    $habis = time()-150;
    $CI->db->query("DELETE FROM captcha WHERE captcha_time < $habis");
    return $cap['image'];
}
    
// handle validasi capcha
function validasi_capth ()
{
    $CI = &get_instance();

    //extract(posts(array('cpt_security')));
    
    // set time
    list($usec, $sec) = explode(" ", microtime());
    $now = ((float)$usec + (float)$sec);
	
    $SQL = "SELECT COUNT(*) AS count FROM captcha WHERE word=? AND ip_address = ? AND captcha_time > ? ";
    $binds =array ($CI->input->post('captcha_secure'), $CI->input->ip_address(), $now - 200);
    $query=$CI->db->query($SQL,$binds);
    
    if ($query->row()->count == 0) return FALSE ;
    else return TRUE;
    
}


// -----------------------------------------------------------------------------------------

/**
 * Form helper
 *
 * To deal with twitter bootstrap
 */

if ( ! function_exists('form_text'))
{
    function form_text($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		    $extra .= ' id="'.$data.'"';
		    echo form_input($data, $val, $extra);
		    echo form_error($data,'<p class="help-block">','</p>');
	    echo '</div></div>';
		
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls">';
		    $extra .= ' id="'.$data.'"';
		    echo form_input($data, $val, $extra);
	    echo '</div></div>';
	}
    }
}

if ( ! function_exists('form_pass'))
{
    function form_pass($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		    $extra .= ' id="'.$data.'"';
		    echo form_password($data, $val, $extra);
		    echo form_error($data,'<p class="help-block">','</p>');
	    echo '</div></div>';
		
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls">';
		    $extra .= ' id="'.$data.'"';
		    echo form_password($data, $val, $extra);
	    echo '</div></div>';
	}
    }
}

// -----------------------------------------------------------------------------------------

if ( ! function_exists('form_area'))
{
    function form_area($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		echo '<textarea name="'.$data.'" '.$extra.' id="'.$data.'">'.$val.'</textarea>';
	        echo form_error($data,'<span class="help-inline">','</span>');
	    echo '</div></div>';
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.':</label>';
	    echo '<div class="controls">';
		echo '<textarea name="'.$data.'" '.$extra.' id="'.$data.'">'.$val.'</textarea>';
	    echo '</div></div>';
	}
    }
}

if ( ! function_exists('form_drop'))
{
    function form_drop($label, $data , $values= array(), $value,  $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error">'.$label.':</label>';
	    echo '<div class="controls error">';
		echo form_dropdown($data, $values, $val, $extra);
		echo form_error($data,'<span class="help-inline">','</span>');
	    echo '</div></div>';
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label">'.$label.':</label>';
	    echo '<div class="controls">';
		echo form_dropdown($data, $values, $val, $extra);
	    echo '</div></div>';
	}
    }
}

// -----------------------------------------------------------------------------------------

if ( ! function_exists('form_rad'))
{
    function form_rad($label, $data , $values= array(), $value,  $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error">'.$label.':</label>';
	    echo '<div class="controls error">';
	    echo '<div class="control-list">';
		echo form_radios($data, $values, $val, $extra);
		echo form_error($data,'<span class="help-inline">','</span>');
	    echo '</div></div></div>';
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label">'.$label.':</label>';
	    echo '<div class="controls">';
	    echo '<div class="control-list">';
		echo form_radios($data, $values, $val, $extra);
	    echo '</div></div></div>';
	}
    }
}

// -----------------------------------------------------------------------------------------

if ( ! function_exists('form_file'))
{
    function form_file($label, $data , $value = FALSE,  $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error">'.$label.':</label>';
	    echo '<div class="controls error">';
	    echo '<div class="control-list">';
		echo form_upload($data, $val, $extra);
		echo form_error($data,'<span class="help-inline">','</span>');
	    echo '</div></div></div>';
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label">'.$label.':</label>';
	    echo '<div class="controls">';
	    echo '<div class="control-list">';
		echo form_upload($data, '', $extra);
	    echo '</div></div></div>';
	}
    }
}

/* End of file MY_form_helper.php */
/* Location: ./application/helper/MY_form_helper.php */