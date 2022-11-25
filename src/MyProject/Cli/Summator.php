<?php

namespace MyProject\Cli;

//use MyProject\Exceptions\CliException;

class Summator extends AbstractCommand
//class Summator
{
//    /** @var array */
//    private $params;
//
//    public function __construct(array $params)
//    {
//        $this->params = $params;
//        $this->checkParams();
//    }
//

//
//    private function getParam(string $paramName)
//    {
//        return $this->params[$paramName] ?? null;
//    }

    protected function checkParams()
//    private function checkParams()
    {
        $this->ensureParamExists('a');
        $this->ensureParamExists('b');
    }

    public function execute()
    {
        echo $this->getParam('a') + $this->getParam('b');
        //    getParam()- вернет параметр (при его наличии), либо вернет null (при его отсутствии)
    }

//    private function ensureParamExists(string $paramName)
//    {
//        if(!isset($this->params[$paramName])){
//            throw new CliException('Param with name "' . $paramName . '" is not set!');
//        }
//    }

}