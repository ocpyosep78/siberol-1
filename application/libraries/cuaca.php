<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Cuaca Libraries
 *
 * @package     Siberol
 * @license	MIT License
 * @category	Libraries
 * @author	Purwandi <free6300@gmail.com>
 * @link	http://www.purwandi.me
 */

class Cuaca
{
    private     $url = 'http://meteo.bmkg.go.id/prakiraan/indonesia';
    
    private     $daerah = array(
        'Banda Aceh',
        'Jakarta',
        'Serang',
        'Bandung',
        'Semarang',
        'Yogyakarta',
        'Surabaya',
        'Denpasar',
        'Jayapura'
    );
    
    public function get ()
    {
        $o = curl_init ($this->url);
        curl_setopt($o, CURLOPT_RETURNTRANSFER, TRUE);
        $opt = curl_exec ($o) or die ('CURL FAILED');
        curl_close($o);
        
        foreach ($this->daerah as $daerah)
        {
            $pos1 = strpos($opt, $daerah."</td>");
            
            for ($j = 0; $j <=2; $j++)
            {
                $pos1 = strpos($opt, "<td>",$pos1 + 1 );
                $pos2 = strpos($opt, "</td>", $pos1 + 1 );
                if ($j === 0) $cuaca = substr($opt, $pos1, $pos2 - $pos1);
                elseif ($j === 1) $suhu = substr($opt, $pos1, $pos2 - $pos1);
                elseif ($j === 2) $lembab = substr($opt, $pos1, $pos2 - $pos1);
            }
            
            
            echo '<tr>';
                echo '<td>'.$daerah.'</td>';
                echo $cuaca.$suhu.$lembab;
            echo '</tr>';
        }
    }
}

/* End of file cuaca.php */
/* Location: ./application/libraries/cuaca.php */