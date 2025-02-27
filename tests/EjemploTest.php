<?php

use PHPUnit\Framework\TestCase;

class EjemploTest extends TestCase
{
    public function testSuma()
    {
        $resultado = 2 + 2;
        $this->assertEquals(4, $resultado);
    }
}
