<?php
/**
 * Set error reporting and display errors settings.  You will want to change these when in production.
 */
session_start();
error_reporting(-1);
ini_set('display_errors', 1);

define('SISPATH','index.php');

require_once ('./lib/Database.php');
require_once ('./lib/Helper.php');

try
{
        if ( method_name() == FALSE )
        {
                require_once ('./class/news.php');
        }
        elseif ( file_exists ('./class/' .method_name () .'.php' ))
        {
                require_once ('./class/'. method_name().'.php');
        }
        else
        {
                throw new Exception ('Method Not Found');
        }
    
}
catch ( Exception $m)
{
        echo " Error : ". $m->getMessage ();
} 