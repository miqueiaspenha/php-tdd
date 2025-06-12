<?php

namespace Code\Tests;

use Code\Produto;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $produto;

    public function setUp(): void
    {
        $this->produto = new Produto();
    }

    public function testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setName("Produto 1");

        $this->assertEquals("Produto 1", $produto->getName(), "Valores não são iguais");
    }

    public function testSeOPrecoDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setPrice(3.25);

        $this->assertEquals(3.25, $produto->getPrice());
    }

    public function testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setSlug("produto-1");

        $this->assertEquals("produto-1", $produto->getSlug());
    }

    public function testSeSetSlugLancaExceptionQuandoNaoInformada()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Parâmetro inválido, informe um slug');

        $produto = $this->produto;
        $produto->setSlug('');
    }
}
