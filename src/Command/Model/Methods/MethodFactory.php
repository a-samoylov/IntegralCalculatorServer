<?php

namespace IntegralCalculator\Command\Model\Methods;

use IntegralCalculator\Core\Model\IFactory;
use IntegralCalculator\Configs\MainConfigs;

class MethodFactory implements IFactory
{
    public function __construct()
    {

    }

    public function create(array $data) {

        $methodMetadata = MainConfigs::getInstance()->getMethodMetadata($data['method_id']);
        $methodClassName = $methodMetadata['class_name'];

        return new $methodClassName(
            $data['func'],
            $data['surface'],
            $data['xmin'],
            $data['xmax'],
            $methodMetadata['id'],
            $methodMetadata['name']
        );
    }
}