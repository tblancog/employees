<?php
class Empleado{
  protected $id;
  protected $nombre;
  protected $apellido;
  protected $fecha_nac;

  public function __construct($id, $nombre, $apellido, $fecha_nac){
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->fecha_nac = new DateTime($fecha_nac);;
  }
  public function getId(){
    return $this->id;
  }

  public function getAge(){
    $now = new DateTime("now");
    $interval = $now->diff( $this->fecha_nac );
    return $interval->y;  // integer representing years
  }
}
