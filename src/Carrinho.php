<?php

namespace Code;

use Code\Produto;

class Carrinho
{
    private $produtos = [];

    public function addProduto($produto)
    {
        $this->produtos[] = $produto;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }
}
