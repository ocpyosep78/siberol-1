<?php defined ('SISPATH') or die ('Acces Denied');
/**
 * Database Class
 *
 * @package     Database Class
 * @author      Purwandi <pur@purwandi.me>
 * @copyright   2011
 * @license     BSD
 */

class Database {
        
        private $host           = 'localhost';
        private $username       = 'root';
        private $password       = 'neki';
        private $db             = 'siberol';
        private $connection;
        private $arr            = array ();
        
        
        /**
         * Constructor
         *
         * @access      public
         * @return      void
         */
        public function __construct ()
        {
                $this->connection = @mysql_pconnect ($this->host, $this->username, $this->password);
                
                try
                {
                        if ( ! $this->connection)
                        {
                                throw new Exception ('Connection Error');
                        }
                        else
                        {
                                try
                                {
                                        if ( ! @mysql_select_db($this->db, $this->connection))
                                        {
                                               throw new Exception ('Database Salah'); 
                                        }
                                }
                                catch (Exception $m)
                                {
                                        echo " Error : ". $m->getMessage ();
                                }
                        }
                }
                catch ( Exception $m)
                {
                        echo " Error : ". $m->getMessage ();
                }
                
        }
        
        /**
         * Database Query
         *
         * @access      public
         * @param       string
         * @return      void
         */
        public function query ( $SQL = FALSE )
        {
                if ($SQL)
                {
                        try
                        {
                                $query = mysql_query ($SQL);
                                if  ( ! $query)
                                {
                                        throw new Exception ('Query Gagal');
                                }
                                else
                                {
                                        return mysql_query ($SQL);
                                }
                        }
                        catch ( Exception $m)
                        {
                                echo " Error : ". $m->getMessage ();
                        }
                }
        }
        
        /**
         * Get All Record
         *
         * @access      public
         * @param       string
         * @return      void
         */
        public function get ( $SQL = FALSE , $tipe = 'all')
        {
                if ($SQL)
                {
                        $SQL = $this->query ($SQL);
                        if ( $SQL AND  mysql_num_rows($SQL) > 0 )
                        {
                                if ($tipe === 'all')
                                {
                                        while ($row = mysql_fetch_object ($SQL))
                                        {
                                                $this->arr[] = $row;
                                        }
                                        return $this->arr;
                                }
                                else
                                {
                                        return mysql_fetch_object ($SQL);
                                }
                        }
                       
                }
        }
        
}


/**
 * Create Instance dari dabatase class
 *
 */

$DB = new Database ();


/*  End class Database  */