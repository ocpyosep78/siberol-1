<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Upload Helper
 *
 * @license	MIT License
 * @category	Helpers
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

function do_upload ($input)
{
        $CI = & get_instance();
        
        // load library
        $CI->load->library('upload');
        
        $storage = './upload/'.date('Ym').'/' ;
        if ( ! is_dir ($storage)) mkdir($storage, 0777, TRUE);
        
        $conf_upload['upload_path']          = $storage;
        $conf_upload['allowed_types']        = 'pdf|gif|jpg|png|jpeg';
        $conf_upload['max_size']             = '5000';
        $conf_upload['encrypt_name']         = TRUE;
        
        $CI->upload->initialize($conf_upload);
        
        if ($CI->upload->do_upload($input))
        {
                $data = $CI->upload->data();
                return $data;
        }
        else
        {
                return FALSE;
        }
}
