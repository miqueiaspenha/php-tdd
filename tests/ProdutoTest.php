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

        $this->assertEquals("Produto 1", $produto->getName(), "Valores não são iguais");
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setPrice(3.25);

        $this->assertEquals(3.25, $produto->getPrice());
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setSlug("produto-1");

        $this->assertEquals("produto-1", $produto->getSlug());
    }
}
