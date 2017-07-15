<?php
include('Empresa.class.php');
include('Empleado.class.php');
include('Programador.class.php');
include('Disenador.class.php');

$empleado1 = new Programador(1, 'Tony', 'Blanco', '1982-03-21');
$empleado1->setLenguaje('Python');

$empleado2 = new Disenador(2, 'Victor', 'Blanco', '1988-07-12');
$empleado2->setTipo('Gráfico');

$empleado3 = new Programador(3, 'Adriana', 'Blanco', '1990-09-13');
$empleado3->setLenguaje('PHP');

$empresa = new Empresa(1, 'Google');
$empresa->addEmpleados([$empleado1, $empleado2, $empleado3]);

print_r($empresa->listEmpleados());
print_r($empresa->findById(3));
print_r($empresa->getAverageAge());
