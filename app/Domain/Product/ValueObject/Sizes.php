<?php

namespace Product\ValueObject;


use App\Exceptions\TypeException;
use Mockery\Exception;

class Sizes
{
    private float $height;
    private float $width;

    public function __construct(string $sizes)
    {
        $array = explode('x', $sizes);

        if (is_numeric($array[0])) {
            $this->height = (float)$array[0];
        } else {
            throw new TypeException('Invalid Size Value: ' . $sizes);
        }

        if (isset($array[1]) && is_numeric($array[0])) {
            $this->width = (float)$array[1];
        } else {
            throw new TypeException('Invalid Size Value: ' . $sizes);
        }
    }

    public function __toString()
    {
        return $this->height . 'x' . $this->width;
    }
}
