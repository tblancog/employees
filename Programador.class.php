<?php
class Programador extends Empleado{
  private $lenguaje;
  public function setLenguaje($value){
    $this->lenguaje = $value;
  }
  public function getLenguaje(){
    return $this->lenguaje;
  }
}
