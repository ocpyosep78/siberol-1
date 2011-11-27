<?php
/**
 * Set error reporting and display errors settings.  You will want to change these when in production.
 */
error_reporting(-1);
ini_set('display_errors', 1);

define('APPPATH', realpath(__DIR__.'/class/').DIRECTORY_SEPARATOR);
define('LIB', realpath(__DIR__.'/lib/').DIRECTORY_SEPARATOR);

require LIB. 'Database.php';
require LIB. 'Helper.php';

try
{
        if ( ! file_exists (APPPATH .method_name () .'.php' ))
        {
                throw new Exception ('Method Not Found');
        }
        else
        {
                require APPPATH . method_name().'.php';
        }
     
    
}
catch ( Exception $m)
{
        echo " Error : ". $m->getMessage ();
} 