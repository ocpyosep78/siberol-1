<?php
/**
 * Set error reporting and display errors settings.  You will want to change these when in production.
 */
session_start();
error_reporting(-1);
ini_set('display_errors', 1);

define('APPPATH', realpath(__DIR__.'/class/').DIRECTORY_SEPARATOR);
define('SISPATH','index.php');
define('LIB', realpath(__DIR__.'/lib/').DIRECTORY_SEPARATOR);

require LIB. 'Database.php';
require LIB. 'Helper.php';

try
{
        if ( method_name() == FALSE )
        {
                require APPPATH . 'news.php';
        }
        elseif ( file_exists (APPPATH .method_name () .'.php' ))
        {
                require APPPATH . method_name().'.php';
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