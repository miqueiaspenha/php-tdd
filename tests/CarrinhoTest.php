<?php

namespace Code\Tests;

use Code\Carrinho;
use Code\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    private $carrinho;
    private $produto;

    public static function setUpBeforeClass(): void
    {
        // print __METHOD__;
    }

    public static function tearDownAfterClass(): void
    {
        // print __METHOD__;
    }

    protected function setUp(): void
    {
        $this->produto = new Produto();
        $this->carrinho = new Carrinho();
    }

    protected function tearDown(): void
    {
        unset($this->carrinho);
        unset($this->produto);
    }

    // public function testSeClasseCarrinhoExiste()
    // {
    //     $classe = class_exists(Produto::class);
    //     $this->assertTrue($classe);
    // }

    protected function assertPreConditions(): void
    {
        $classe = class_exists(Produto::class);
        $this->assertTrue($classe);
    }

    protected function assertPostConditions(): void
    {
        // Executa depois do teste tearDown
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto1 = $this->produto;
        $produto1->setName('Produto 1');
        $produto1->setPrice(19.99);
        $produto1->setSlug('produto-1');

        $produto2 = $this->produto;
        $produto2->setName('Produto 2');
        $produto2->setPrice(19.99);
        $produto2->setSlug('produto-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf(Produto::class, $carrinho->getProdutos()[0]);
        $this->assertInstanceOf(Produto::class, $carrinho->getProdutos()[1]);
    }

    public function testSeValoresDeProdutosNoCarrinhoEstaoCorretosConformePassado()
    {
        $produto1 = $this->produto;
        $produto1->setName('Produto 1');
        $produto1->setPrice(19.99);
        $produto1->setSlug('produto-1');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);

        $this->assertEquals('Produto 1', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals(19.99, $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeTotalDeProdutosEValorDaCompraEstaoCorretos()
    {
        $produto1 = $this->produto;
        $produto1->setName('Produto 1');
        $produto1->setPrice(19.99);
        $produto1->setSlug('produto-1');

        $produto2 = clone ($this->produto);
        $produto2->setName('Produto 2');
        $produto2->setPrice(16.55);
        $produto2->setSlug('produto-2');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertEquals(2, $carrinho->getTotalProdutos());
        $this->assertEquals(36.54, $carrinho->getTotalCompra());
    }

    public function testIncompleto()
    {
        $this->assertTrue(true);
        $this->markTestIncomplete('Teste não está completo');
    }

    public function testSeFetureEspecificaParaVersaoDoPhpTrabalhaDeFormaEsperada()
    {
        if (PHP_VERSION  != 5.3) {
            $this->markTestSkipped('Este teste só roda para versão abaixo do PHP 7');
        }
        $this->assertTrue(true);
    }
}
