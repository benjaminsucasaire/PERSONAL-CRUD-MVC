<?php

class Conectar{
    protected $dbh;
    protected function Conexion(){
        try{
          //bR]Ufs9krykmlBmd
        //   $conectar=$this->dbh= new PDO("mysql:local=localhost;dbname=id17030818_crud","id17030818_root2","bR]Ufs9krykmlBmd"); 
          $conectar=$this->dbh= new PDO("mysql:local=localhost;dbname=crud","root","root"); 
          return $conectar; 
        }catch(Exception $e){
            print "¡Error BD!".$e->getMessage()."<br/>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

}