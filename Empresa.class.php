<?php
class Empresa {
  private $id;
  private $nombre;
  private $empleados;

  public function __construct($id, $nombre){
    $this->id = $id;
    $this->nombre = $nombre;
  }
  public function addEmpleados(array $empArray){
    $this->empleados = $empArray;
  }
  public function listEmpleados(){
    return $this->empleados;
  }
  public function findById($id){
    foreach ($this->empleados as $emp) {
      if($emp->getId() == $id) return $emp;
    }
    return 'not found empleado with id: '.$id;
  }
  public function getAverageAge(){
    $sum = 0;
    foreach ($this->empleados as $emp) {
      $sum += $emp->getAge();
    }
    return floor($sum / count($this->empleados));
  }
}
