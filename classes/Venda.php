<?php
include 'Produto.php';
include 'RegistroVendas.php';
class Venda extends Produto {
    public $desconto;
    public $quantidadeVendas;

    function __construct(Produto $produto, $descontoDefault = 0, $quantidadeVendasDefault = 0){
        # achei uma boa idéia colocar o produto como parâmetro no construtor.
        # dessa forma venda cria uma cópia dos atributos de um produto.
        # assim podemos criar um produto e uma venda separadamente mas acessar os valores por qualquer um dos dois
        # a única exigência é atualizar valores tanto na venda quanto no próprio produto, o que pode ser feito no método setVenda
        $this -> nome = $produto -> nome;
        $this -> preço = $produto -> preço;
        $this -> quantidade = $produto -> quantidade;
        $this -> desconto = $descontoDefault;
        $this -> quantidadeVendas = $quantidadeVendasDefault;
    }

    function setVenda(RegistroVendas $registroVendas, Produto $produto, int $compras=1){
        if ($this -> nome != null){ # Um produto não cadastrado não tem nome
            if($this->quantidade >= $compras) {
                $this -> quantidade -= $compras; # Compras representa a quantidade comprada. Padrão é 1. Pode ser alterado com o parâmetro.
                $produto -> quantidade -= $compras; # Decrementa compras do produto original também.
                $this -> quantidadeVendas += $compras;
                $registroVendas -> RegistrarVenda($this); # RegistrarVenda vai registrar a venda em um array com todas as vendas e data da venda.
                return true; # O retorno de true indica se a venda foi bem sucedida ex.: if (setVenda(...))
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function setDesconto($valor){
        $this -> desconto = $valor; # seta o valor do desconto
    }

    function getVenda(RegistroVendas $registroVendas){
        $venda = $registroVendas -> getUltimaVenda($this->nome); # chama o método do objeto RegistroVendas que retorna a última venda.
        if ($venda != null) {
            var_dump($venda); # faz o var_dump da venda. Não possui uma formatação específica.
        } else {
            echo "Nenhuma venda registrada"; # retorna essa mensagem se o nome não foi encontrado no registro de vendas.
        }
    }
}

?>