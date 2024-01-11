<?php
class Produto {
    public $nome; # atributos públicos, embora exista uma função de exibição as variáveis podem ser acessadas diretamente
    public $preço;
    public $quantidade;

    function __construct($nomeDefault = null, $preçoDefault = null, $quantidadeDefault = null) {
        # Cria um objeto padrão sem nome nem valores. Útil para testes.
        $this -> nome = $nomeDefault;
        $this -> preço = $preçoDefault;
        $this -> quantidade = $quantidadeDefault;
    }

    function setProduto($data) {
        # Função para setar os valores dos atributos. data é um array.
        #É esperado um array data com 3 chaves: "nome", "preço" e "quantidade"
        $this -> nome = $data["nome"];
        $this -> preço = $data["preço"];
        $this -> quantidade = $data["quantidade"];
    }

    function getProduto() 
    {
        var_dump($this); #assumi aqui que a exibição é a pura exibição do objeto, sem uma formatação específica, para fins de teste.
    }

}

?>