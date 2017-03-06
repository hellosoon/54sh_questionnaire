<?php
/**
 * Created by Soon
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class DB
{
    public $db = null;

    public function __construct($dbName='')
    {
        $conf=config::$config['dbconfig'];
        if(!$dbName){
            $dbName=$conf['dbname'];
        }
        try {
            $this->db = new PDO($conf['dbhost'].$dbName,$conf['dbuser'],$conf['dbpsw']);
            $this->db->query("SET NAMES ".$conf['dbcharset']);
        } catch (PDOException $e) {
//            echo '233'.$e->getMessage();
            exit;
        }
    }
    public function init(){
        return $this->db;
    }
}