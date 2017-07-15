<?php
class Disenador extends Empleado{
  private $tipo;
  public function setTipo($value){
    $this->tipo = $value;
  }
  public function getTipo(){
    return $this->tipo;
  }
}
