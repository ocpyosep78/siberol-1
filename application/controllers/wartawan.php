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
                
                // cek apakah ada file yang diupload
                if ($_FILES['gambar'])
                {
                    // load upload helper
                    $this->load->helper('upload');
                    
                    // do upload gambar
                    $file = do_upload('gambar');
                    
                    // cek gambar apakah berhasil di upload
                    if ($file[0] == 'OK')
                    {
                        $b->gambar = $file[1]['file_name'];
                    }
                    else
                    {
                        // set error, jika gambar tidak bisa di upload
                        setError($file[1]);
                    }
                    
                }
                
                $b->tgl_post= TANGGAL_FULL;
                $b->judul   = $this->input->post('judul');
                $b->isi     = $this->input->post('isi');
                $b->kategori= $this->input->post('kategori');
                $b->nm_war  = $this->auth->data('nama_lengkap');
                $b->user_id = $this->auth->data('user_id');
                
                if ($b->skip_validation()->save())
                {
                    redirect($this->module.'/index/review');
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
        // validate it
        $b = new Berita_m();
        $berita = $b->get_by_id($id);
        
        if ( ! $berita->exists())
        {
            $this->show_404();
            //exit;
        }
        else
        {
            $this->load->helper('form');
            
            if ($_POST)
            {
                // load form_validation
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('judul','Judul berita','required');
                $this->form_validation->set_rules('kategori','Kategori berita','required');
                $this->form_validation->set_rules('isi','Isi berita','required');
                
                if ($this->form_validation->run())
                {
                    // set array where
                    $arr1 = $arr2 = array('id' => $id);
                    
                    // set array to set field
                    $arr2['tgl_post']   = TANGGAL_FULL;
                    $arr2['judul']      = $this->input->post('judul');
                    $arr2['isi']        = $this->input->post('isi');
                    $arr2['nm_war']     = $this->auth->data('nama_lengkap');
                    $arr2['user_id']    = $this->auth->data('user_id');
                    
                    // cek apakah ada file yang diupload
                    if ($_FILES['gambar'])
                    {
                        // load upload helper
                        $this->load->helper('upload');
                        
                        // do upload gambar
                        $file = do_upload('gambar');
                        
                        // cek gambar apakah berhasil di upload
                        if ($file[0] == 'OK')
                        {
                            $arr2['gambar'] = $file[1]['file_name'];
                        }
                        else
                        {
                            // set error, jika gambar tidak bisa di upload
                            setError($file[1]);
                        }
                        
                    }
                    
                    if ($this->db->update('berita',$arr2, $arr1))
                    {
                        redirect($this->module.'/index/review');
                    }
                    else
                    {
                        setError('Failed to update ');
                    }
                    
                }
                
            }
            $this->params['b'] = $berita;
            parent :: update ();
        }
    }
    
    /**
     * Delete berita
     *
     * @return  mixed
     */
    public function delete ($id)
    {
        // validate it
        $b = new Berita_m();
        $b->where('id',$id)->where('status',0)->get();
        
        if ( ! $b->exists())
        {
            $this->show_404();
        }
        else
        {
            $this->load->helper('form');
            
            if ($_POST)
            {
                if ($b->delete())
                {
                    redirect($this->module.'/index/review');
                }
                else
                {
                    setError('Failed to delete ');
                }
            }
            
            parent :: delete ();
        }
        
    }
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */