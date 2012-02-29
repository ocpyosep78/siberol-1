<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends MY_Controller{
    
    public $module = 'berita';
    
    public function index ()
    {
        $this->load->helper('text');
        
        $b = new Berita_m();
        $this->params['berita'] = $b->get();
        
        parent :: index ();
    }
}