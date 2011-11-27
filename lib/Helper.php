<?php

// --------------------------------------------------------------------

/**
 * Filter segments for malicious characters
 * 
 * @param	string
 * @return	string
 */
function filter_uri($str)
{
        if ($str != '')
        {
                try
                {
                        if ( ! preg_match("/^([a-z0-9-?=])+$/i", $str))
                        {
                                throw new Exception ('The URI you submitted has disallowed characters.');
                        }
                        else
                        {
                                // Convert programatic characters to entities
                                $bad	= array('$',		'(',		')',		'%28',		'%29');
                                $good	= array('&#36;',	'&#40;',	'&#41;',	'&#40;',	'&#41;');
                        
                                return str_replace($bad, $good, $str);
                        }
                }
                catch ( Exception $m)
                {
                        echo " Error : ". $m->getMessage ();
                }       
        }
}

// --------------------------------------------------------------------

/**
 * Get Base Url
 * 
 * @return	string
 */
function base_url ()
{
        if (isset($_SERVER['HTTP_HOST']))
        {
                $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
                $base_url .= '://'. $_SERVER['HTTP_HOST'];
                $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        }

        else
        {
                $base_url = 'http://localhost/';
        }
        
        return $base_url;
}

// --------------------------------------------------------------------

/**
 * Get Method Name
 * 
 * @return	string
 */
function method_name ()
{
        if (isset($_SERVER['HTTP_HOST']))
        {
                $base = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
                $base .= "://". $_SERVER['SERVER_NAME'];
                $base .= $_SERVER['REQUEST_URI'];
                
                $method = str_replace ( base_url().'index.php/','', $base );
        }
        $post = strpos($method,'?');
        
        if ( $post )
        {
                return filter_uri( substr($method, 0, $post));
        }
        else
        {
                return filter_uri($method);
        }
        
}
