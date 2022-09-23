<?php


namespace App\Shapes;


use App\Interfaces\Shape;

class Square implements Shape
{
    public $width;
    public $height;
    public function __construct($width , $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function area()
    {
        return $this->width * $this->height;
    }


}
