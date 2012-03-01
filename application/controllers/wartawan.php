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
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('judul','Judul berita','required');
            $this->form_validation->set_rules('kategori','Kategori berita','required');
            $this->form_validation->set_rules('isi','Isi berita','required');
            
            if ($this->form_validation->run())
            {
                // asign new object berita
                $b = new Berita_m();
                
                /*
                // cek apakah ada file yang diupload
                if ($gambar = $_FILES['gambar'])
                {
                    // load upload helper
                    $this->load->helper('upload');
                    
                    // cek gambar apakah berhasil di upload
                    if ($file = do_upload('do_upload'))
                    {
                        $b->gambar = $file['file_name'];
                    }
                    else
                    {
                        // set error, jika gambar tidak bisa di upload
                        setError('Gambar tidak bisa di upload');
                    }
                    
                }*/
                
                $b->tgl_post= TANGGAL_FULL;
                $b->judul   = $this->input->post('judul');
                $b->isi     = $this->input->post('isi');
                $b->kategori= $this->input->post('kategori');
                $b->nm_war  = $this->auth->data('nama_lengkap');
                $b->user_id = $this->auth->data('user_id');
                
                //$b->tgl_post= TANGGAL_FULL;
                //$b->judul   = $this->input->post('judul');
                //$b->isi     = $this->input->post('isi');
                //$b->kategori= $this->input->post('kategori');
                //$b->nm_war  = $this->auth->data('nama_lengkap');
                //$b->user_id = $this->auth->data('user_id');
                
                if ($b->skip_validation()->save())
                {
                    redirect($this->module);
                }
                else
                {
                    setError('Failed to save ');
                }
            }
            
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