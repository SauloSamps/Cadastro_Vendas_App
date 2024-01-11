<?php
class RegistroVendas {
    private $registro = array(); # inicializa um vetor para registrar todas as vendas (de todos os produtos)

    function RegistrarVenda(Venda $venda){
        # pega o objeto inteiro de venda e salva no array, congelando os atributos nessa cópia
        $array = array(
            "venda" => $venda,
            "timestamp" => getdate(), # obtém a data usando UNIX time para registrar junto com o objeto da venda
        );
        array_push($this->registro, $array);  #faz o push para o array com registro de vendas
    }

    function getUltimaVenda($nomeFind){
        # Retorna a última venda do produto com o nome passado nos parâmetros
        # a busca é linear feita de trás para frente em todo o vetor das vendas
        foreach (array_reverse($this->registro) as $venda) {
            if ($venda["venda"] -> nome == $nomeFind){
                return $venda; # retorna a venda se encontrada, caso contrário retorna null
            }
        }
        return null;
    }

    function debugVendas(){
        var_dump($this); # para debug: imprime todo o vetor das vendas.
    }
}
?>