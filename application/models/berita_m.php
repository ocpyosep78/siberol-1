<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_m extends DataMapper {
    
    var $model = 'berita_m';
    var $table = 'berita';
    var $has_one = array('users_m');
    var $has_many = array();
    
    // set validation on table
    var $validation = array(
	'judul' => array(
	    // example is required, and cannot be more than 120 characters long.
            'rules' => array('required'),
	    'label' => 'Judul berita'
	),
        'isi'   => array(
            'rules' => array('required'),
	    'label' => 'Isi berita'
        ),
        'tgl_tayang'   => array(
            'rules' => array('required'),
	    'label' => 'Tanggal berita'
        ),
        'tgl_expire'   => array(
            'rules' => array('required'),
	    'label' => 'Tanggal exprire'
        ),
        'kategori'   => array(
            'rules' => array('required'),
	    'label' => 'Kategori'
        )
    );
    
    public function __construct($id = NULL)
    {
	parent::__construct($id);
    }
    
    function post_model_init($from_cache = FALSE)
    {
    
    }
}

/* End of file berita_m.php */
/* Location: ./application/models/berita_m.php */