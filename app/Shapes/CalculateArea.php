<?php


namespace App\Shapes;


class CalculateArea
{
    public function calculate(array $shapes){
        $area  = 0;
        foreach ($shapes as $shape){
            $area += $shape->area();
        }
        return $area;
    }
}
