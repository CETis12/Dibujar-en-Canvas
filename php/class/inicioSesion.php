<?php
class iniSesion{
    private $datos = array("host" => "localhost", "user" => "root", "pass" => "", "db" => "planos");
    public $result;
    private $conexion;
    public $succes;
    
    public function __construct(){
        $this->conexion = new mysqli($this->datos['host'],$this->datos['user'],$this->datos['pass'],$this->datos['db']);
    }
    
    public function consultaSimple($sql){
        if($this->conexion->query($sql)){
            $this->succes = true;
        }
        
    }
    public function sqlRest($sql){
        $email = $this->conexion->query($sql)->fetch_row();
        $this->result = $email[2];
        
    }
    
    public function __destruct(){
         $this->conexion->close();
    }
}
class panoExe{
    private $datos = array("host" => "localhost", "user" => "root", "pass" => "", "db" => "planos");
    private $conexion;
    public $nameImg;
    public $urlImg;
    public $anchoImg;
    public $altoImg;
    public $proName;
    
    public function __construct(){
        $this->conexion = new mysqli($this->datos['host'],$this->datos['user'],$this->datos['pass'],$this->datos['db']);
    }
    
    public function consultaSimple($sql){
        if($this->conexion->query($sql)){
            $this->succes = true;
        }
        
    }
    public function sqlRest($sql){
        $result = $this->conexion->query($sql)->fetch_row();
        $this->nameImg = $result[1];
        $this->urlImg = $result[2];
        $this->anchoImg = $result[4];
        $this->altoImg = $result[5];
    }
    
    public function __destruct(){
         $this->conexion->close();
    }
}
?>