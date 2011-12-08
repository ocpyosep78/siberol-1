<?php defined ('SISPATH') or die ('Acces Denied');

if ($_POST)
{
        $username = get_post('username');
        $pass   = get_post ('password');
        
        $SQL = 'SELECT * FROM user WHERE username="'.$username.'" AND password="'.$pass.'"';
        $data = $DB->get($SQL, 'one');
        
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
        header('Location:'. base_url());
}