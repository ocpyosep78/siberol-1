<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wartawan extends MY_Controller{
    
    // set module is wartawan
    public $module = 'wartawan';
    
    /**
     * Get all berita
     *
     * Berita berdasarkan tipe, tayang dan review
     *
     * @param   string
     * @return  mixed
     */
    public function index ($tipe = FALSE)
    {
        $this->load->helper(array('text','html'));
        
        // create new object berita
        $b = new Berita_m();
        
        // cek tipe
        if ($tipe === 'review')
        {
            // get data berita
            $this->params['berita'] = $b->where('user_id', $this->auth->data('user_id'))
                                        ->where('status',0)
                                        ->order_by('tgl_post ASC')
                                        ->get();
            //  
            $this->params['desc'] = '<h2>Berita Review <small> Daftar berita masih di review </small></h2>';
            
        }
        else
        {
            // get data berita
            $this->params['berita'] = $b->where('user_id', $this->auth->data('user_id'))
                                        ->where('status',1)
                                        ->order_by('tgl_post ASC')
                                        ->get();
                                        
            $this->params['desc'] = '<h2>Berita Tayang <small> Daftar berita sudah tayang </small></h2>';
        }
        
        parent :: index ();
    }
    
    /**
     * Insert new berita
     *
     * @return  mixed
     */
    public function insert ()
    {
        $this->load->helper('form');
        
        if ($_POST)
        {
            
        }
        
        parent :: insert ();
    }
    
    
    /**
     * Update berita
     *
     * @return  mixed
     */
    public function update ($id)
    {
        $this->load->helper('form');
        
        if ($_POST)
        {
            
        }
        
        parent :: update ();
    }
    
    /**
     * Delete berita
     *
     * @return  mixed
     */
    public function delete ($id)
    {
        $this->load->helper('form');
        
        if ($_POST)
        {
            
        }
        
        parent :: delete ();
    }
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */