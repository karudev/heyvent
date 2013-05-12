<?php
namespace Hey\AccountBundle\Models;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ftp
 *
 * @author RENAULT
 */
class Ftp
{
    private $connection;
  

    public function __construct($host)
    {

        $this->connection = ftp_connect($host);
        if (! $this->connection)
            throw new \Exception("Could not connect to $host");
    }

    public function login($username,$password)
    {
        
        
        if (! ftp_login($this->connection, $username, $password))
            throw new \Exception("Could not authenticate with username ".$username ."and password ".$password);

     
    }
    public function close(){
          ftp_close($this->connection);
    }
    public function put($pathStream,$pathFile){
        $fp = fopen($pathStream, 'r');
        $state = ftp_fput($this->connection,$pathFile,$fp,FTP_ASCII);
        fclose($fp);
        return $state;
    }
    public function mkdir($dir,$mask){
        
        ftp_mkdir($this->connection, $dir);
        ftp_chmod($this->connection, $mask, $dir);

        
    }

  
    
}
?>
