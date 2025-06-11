<?php

namespace Code\Tests;

use Code\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setName("Produto 1");

        $this->assertEquals("Produto 1", $produto->getName());
    }
}
