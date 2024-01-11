<?php
class CadastroProdutos {
    private $cadastro = array(); # O array armazena os produtos cadastrados

    function findProduto($nomeFind){ # busca o array de trás para frente por um registro com o nome do produto. Para evitar cópias duplicadas no cadastro.
        foreach (array_reverse($this->cadastro) as $produto) {
            if ($produto["produto"] -> nome == $nomeFind){
                return $produto;
            }
        }
        return null; # retorna null se não for encontrado.
    }

    function cadastrar($arrayProduto){
        # função para cadastrar um produto.
        # cria um objeto do produto e um objeto de venda associado a ele.
        # é um array com arrays d 2 posições: "produto" e "venda", para cada objeto relacionado.

        if ($this -> findProduto($arrayProduto["nome"]) == null){ # se o produto já não estiver no array de cadastro. Evita duplicados.
            $produto = new Produto(); # instancia produto
            $produto -> setProduto($arrayProduto);
            $venda = new Venda($produto); # instancia venda
            $array = array(
                "produto" => $produto, # assignment dos valores
                "venda" => $venda, # assignment dos valores
            );
            array_push($this->cadastro, $array); # push do array com "produto" e "venda" no array de cadastro.
            return true; # confirma que a operação foi realizada com sucesso. False caso contrário.
        } else {
            return false;
        }
    }
}


?>