<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Berita Controller
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Controller
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

class Berita extends MY_Controller{
    
    public $module = 'berita';
    
    public function index ()
    {
        $this->load->helper(array('text','html'));
        $this->load->library(array('user_agent','cuaca'));
        
        $b = new Berita_m();
        $this->params['berita'] = $b->where('status',1)->order_by('tgl_post DESC')->get();
        
        parent :: index ();
    }
    
    public function page ($tipe = null)
    {
        $this->load->helper(array('text','html'));
        $this->load->library(array('user_agent','cuaca'));
        
        $b = new Berita_m();
        $this->params['berita'] = $b->where('status',1)->where('kategori',$tipe)->order_by('tgl_post DESC')->get();
        
        parent :: index ();
    }
    
    public function read ($id = null)
    {
        
        $this->db->where(array('status'=>1,'id'=>$id));
        $berita = $this->db->get('berita');
        
        if ($berita->num_rows() <= 0)
        {
            $this->show_404();
        }
        else
        {
            $this->load->helper(array('text','html'));
            
            $this->params['b'] = $berita->row();
            
            $this->db->where(array('status'=>1,'id !='=>$id))->limit(5);
            $this->params['other'] = $this->db->get('berita')->result();
            
            parent :: index ('read');
        }
        
    }
}

/* End of file berita.php */
/* Location: ./application/controllers/berita.php */