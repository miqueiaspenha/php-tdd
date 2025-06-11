<?php

namespace Code\Tests;

use Code\Carrinho;
use Code\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testSeClasseCarrinhoExiste()
    {
        $classe = class_exists(Produto::class);
        $this->assertTrue($classe);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto1 = new Produto();
        $produto1->setName('Produto 1');
        $produto1->setPrice(19.99);
        $produto1->setSlug('produto-1');

        $produto2 = new Produto();
        $produto2->setName('Produto 2');
        $produto2->setPrice(19.99);
        $produto2->setSlug('produto-2');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf(Produto::class, $carrinho->getProdutos()[0]);
        $this->assertInstanceOf(Produto::class, $carrinho->getProdutos()[1]);
    }
}
