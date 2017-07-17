<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SummaRequirementsTest extends TestCase
{
    public function testAnEmpresaCanBeInstantiated(){
      $this->assertInstanceOf(Empresa::class,
                              new Empresa(1, 'Microsoft'));
    }

    public function testAnEmpleadoCanBeInstantiated(){
      $this->assertInstanceOf(Empleado::class,
                              new Empleado(1, 'Tony', 'Blanco', '1982-03-21'));
    }

    public function testAnEmpleadoCanBeAddedToACompany(){
      $empresa = new Empresa(1, 'Google');

      $programmer = new Programador(1, 'Tony', 'Blanco', '1982-03-21');
      $programmer->setLenguaje('Python');

      $disenador = new Disenador(2, 'Victor', 'Blanco', '1988-07-12');
      $disenador->setTipo('Gráfico');

      $empresa->addEmpleados([$programmer]);

      $this->assertClassHasAttribute('empleados', Empresa::class);
      $this->assertContains($programmer, $empresa->listEmpleados());

      $empresa->addEmpleados([$disenador]);
      $this->assertContains($disenador, $empresa->listEmpleados());
    }

    public function testEmpresaEmpleadosAreListed(){
      $empleado1 = new Programador(1, 'Tony', 'Blanco', '1982-03-21');
      $empleado1->setLenguaje('Python');

      $empleado2 = new Disenador(2, 'Victor', 'Blanco', '1988-07-12');
      $empleado2->setTipo('Gráfico');

      $empleado3 = new Programador(3, 'Adriana', 'Blanco', '1990-09-13');
      $empleado3->setLenguaje('PHP');

      $empresa = new Empresa(1, 'Oracle');
      $empresa->addEmpleados([$empleado1, $empleado2, $empleado3]);

      $this->assertArraySubset(
        [$empleado1, $empleado2, $empleado3],
        $empresa->listEmpleados()
      );
    }
    public function testSearchEmpleadoById(){
        $empleado1 = new Programador(1, 'Tony', 'Blanco', '1982-03-21');
        $empleado1->setLenguaje('Python');

        $empleado2 = new Disenador(2, 'Victor', 'Blanco', '1988-07-12');
        $empleado2->setTipo('Gráfico');

        $empleado3 = new Programador(3, 'Adriana', 'Blanco', '1990-09-13');
        $empleado3->setLenguaje('PHP');

        $empresa = new Empresa(1, 'Oracle');
        $empresa->addEmpleados([$empleado1, $empleado2, $empleado3]);

        $this->assertEquals(
          $empresa->findById(2),
          $empleado2  // Victor
        );
        $this->assertNotEquals(
          $empresa->findById(2),
          $empleado3  // Adriana
        );
    }

      public function testGetEmpleadosAverageAge(){
        $empleado1 = new Programador(1, 'Tony', 'Blanco', '1982-03-21');
        $empleado1->setLenguaje('Python');

        $empleado2 = new Disenador(2, 'Victor', 'Blanco', '1988-07-12');
        $empleado2->setTipo('Gráfico');

        $empleado3 = new Programador(3, 'Adriana', 'Blanco', '1990-09-13');
        $empleado3->setLenguaje('PHP');

        $empresa = new Empresa(1, 'Oracle');
        $empresa->addEmpleados([$empleado1, $empleado2, $empleado3]);

        // get age average without the method
        $ages = 0;
        $count = count($empresa->listEmpleados());
        foreach ($empresa->listEmpleados() as $emp) {
          $ages+= $emp->getAge();
        }
        $average = floor($ages / $count);

        $this->assertEquals(
          $average,
          $empresa->getAverageAge()
        );

      }

}
