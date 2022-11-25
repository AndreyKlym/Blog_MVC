<?php

namespace MyProject\Cli;

//use MyProject\Exceptions\CliException;

class Minusator extends AbstractCommand
//class Minusator
{

    protected function checkParams()
//    private function checkParams()
    {
        $this->ensureParamExists('x');
        $this->ensureParamExists('y');
    }

    public function execute()
    {
        echo $this->getParam('x') - $this->getParam('y');
        // getParam()- вернет параметр (при его наличии), либо вернет null (при его отсутствии)
    }



}