<?php

namespace Pattern\ObjectPool;

use Pattern\ObjectPool\Pool;
use Pattern\ObjectPool\Funcionario;

class FuncionarioPool implements Pool
{
    private $funcionarios;

    public function __construct()
    {
        $this->funcionarios = [];
        $this->funcionarios[] = new Funcionario("Caitlyn");
        $this->funcionarios[] = new Funcionario("Lissandra");
        $this->funcionarios[] = new Funcionario("Ashe");
        $this->funcionarios[] = new Funcionario("Garen");
    }

    public function acquire() 
    {
        if (count($this->funcionarios) > 0) {
            $funcionario = array_shift($this->funcionarios);

            return $funcionario;
        } else {
            return null;
        }
    }

    public function release($funcionario) 
    {
        if ($funcionario instanceof Funcionario) {
            $this->funcionarios[] = clone $funcionario;
        }
    }
}
