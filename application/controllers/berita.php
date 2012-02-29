<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends MY_Controller{
    
    public $module = 'berita';
    
    public function index ()
    {
        $this->load->helper('text');
        
        $b = new Berita_m();
        $this->params['berita'] = $b->get();
        
        parent :: index ();
    }
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */