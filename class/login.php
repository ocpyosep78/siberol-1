<?php defined ('SISPATH') or die ('Acces Denied');

if ($_POST)
{
        $username = get_post('username');
        $pass   = get_post ('password');
        $word = get_post('word');
        
         $CAPTH = 'SELECT * FROM captcha WHERE word="'.$word.'" AND ip_address="'.getRealIpAddr().'"';
       //  $CAPTH = 'SELECT * FROM captcha WHERE word="'.$word.'"';
        // print_r ($CAPTH);

        $CEK = $DB->get($CAPTH, 'one');
        
        if ($CEK)
        {
                $SQL = 'SELECT * FROM user WHERE username="'.$username.'" AND password="'.$pass.'"';
                $data = $DB->get($SQL, 'one');
                
                $expiration = time() - 7200; // Two hour limit
                $DB->query("DELETE FROM captcha WHERE captcha_time < ".$expiration."");
                
                if ( ! empty ($data))
                {
                        $_SESSION['nama_lengkap'] = $data->nama_lengkap;
                        $_SESSION['tipe']         = $data->tipe;
                        
                        if ($data->tipe === 'Redaktur')
                        {
                                header('Location:'. base_url().'redaktur');
                        }
                        elseif ($data->tipe =='Wartawan')
                        {
                                header('Location:'. base_url().'wartawan');
                        }
                }
                else
                {
                        throw new Exception ('Username dan Password tidak valid', 404);
                }
        }
        else
        {
                throw new Exception ('Captha yang anda tulis salah', 404);       
        }
        
}
else
{
        header('Location:'. base_url());
}