<?php


namespace App\Shapes;


use App\Interfaces\Shape;

class Triangle implements Shape
{
    public $base;
    public $height;

    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function area()
    {
        return $this->base * $this->height / 2;
    }
}
{

}
