<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function provinsi ()
{
    
    $url = str_replace ('http://','',base_url());
    $url = substr($url,0,strpos($url,'.'));
    return $url;
}

function nama_provinsi ()
{
    $query = mysql_query('SELECT * FROM tb_provinsi WHERE sub_domain = "'.provinsi().'"');
    
    if ($query && mysql_num_rows($query) == 1){
        return mysql_fetch_object($query)->nama_provinsi;
    }
    mysql_free_result($query);
}

function id_provinsi ()
{
    $query = mysql_query('SELECT * FROM tb_provinsi WHERE sub_domain = "'.provinsi().'"');
    
    if ($query && mysql_num_rows($query) == 1){
        return mysql_fetch_object($query)->id_provinsi;
    }
    mysql_free_result($query);
}

function group_jenjang ($idx_jenjang)
{
    switch($idx_jenjang){
        case '10'   :
        case '11'   : $group = '10'; break;
        case '12'   :
        case '13'   : $group = '11'; break;
        case '14'   :
        case '15'   : $group = '12'; break;
        case '16'   :
        case '17'   : $group = '13'; break;
        case '18'   :
        case '19'   : $group = '14'; break;
        case '20'   : $group = '15'; break;
    }
    return $group;
}


function jawab ($var=TRUE){
    switch ($var){
        case 'A' :  case 'a' : $isi =4; break;
        case 'B' :  case 'b' : $isi =3; break;
        case 'C' :  case 'c' : $isi =2; break;
        case 'D' :  case 'd' : $isi =1; break;
        case 'E' :  case 'e' : $isi =0; break;
        default : $isi =0;break;
    }
    return $isi;
}
function decode_jawab ($var)
{
    switch ($var){
        case '4' : return 'A'; break;
        case '3' : return 'B'; break;
        case '2' : return 'C'; break;
        case '1' : return 'D'; break;
        default :  return 'E'; break;
    }
}

function makeDecimal($num,$decimal=2)
{
    return sprintf('%.'.$decimal.'f',$num);
}

function getPeringkat($nilai)
{
    if      ($nilai > 85 AND $nilai <=100)  return 'A';
    elseif  ($nilai > 70 AND $nilai <= 85)	return 'B';
    elseif  ($nilai > 55 AND $nilai <= 70)	return 'C';
    else return 'TT';
}
	
function getLayak($nilai)
{
    return ($nilai  >= 56) ? 'Layak' : 'Tidak Layak';
}