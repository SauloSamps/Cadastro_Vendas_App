<?php
/*Funções adicionadas para melhorar a leitura e automatizar as manipulações dos objetos nos exemplos.
A inicialização dos vetores com cadastro dos produtos e registro de vendas é necessária.
Checar index.php e os objetos na pasta classes*/

include 'classes/Venda.php';
include 'classes/CadastroProdutos.php';

function cadastrarProduto($nome, float $preço = 0.0, int $quantidade = 0, $cadastro){
    # Cadastra um produto com as características passadas 
    # "cadastro" é o vetor com cadastro dos produtos
    $array = array ( # array com as informações a serem passadas.
        'nome' => $nome,
        'preço' => $preço,
        'quantidade' => $quantidade,
    );

    if ($cadastro -> cadastrar($array)){ # chama o método do objeto CadastroProdutos e imprime mensagem de sucesso ou erro
        echo "<p>Cadastro realizado com sucesso!</p>";
    } else {
        echo "<p>Ocorreu um erro durante o cadastro</p>";
    }
}

function cadastrarDesconto($nome, $valorDesconto, $cadastro){ # cadastra um desconto para um produto já cadastrado
    $produto = $cadastro->findProduto($nome); # encontra o produto no cadastro. Retorna null se não encontrado

    if ($produto != null){
        $produto["venda"] -> setDesconto($valorDesconto); # seta o valor do desconto do produto no vetor de cadastro
        echo "<p>Cadastro de desconto realizado com sucesso!</p>";
    } else {
        echo "<p>Produto não encontrado</p>";
    }
}

function venderProduto($nome, $numeroCompras, $cadastro, $registroVendas){ # vende um produto na quantidade especificada (numerCompras)
    $produto = $cadastro->findProduto($nome); # encontra o produto no cadastro, se null não está cadastrado

    if ($produto != null){
        if ($produto["venda"] -> setVenda($registroVendas, $produto["produto"], $numeroCompras)) { # chama o método setVenda para o objeto Venda
            echo "<p>Venda bem sucedida!</p>";
        } else {
            echo "<p>Erro durante o processamento da venda</p>";
        }
    } else {
        echo "<p>Produto não encontrado</p>";
    }
}

function exibirVendas($registroVendas){ # exibe todas as vendas. Acessa o método do objeto RegistroVendas
    $registroVendas -> debugVendas(); 
}

function exibirUltimaVenda($nome, $registroVendas, $cadastro){ # exibe a última venda do produto de nome pesquisado
    $produto = $cadastro->findProduto($nome); # encontra o produto no vetor de produtos cadastrados

    if ($produto != null){
        $produto["venda"] -> getVenda($registroVendas); # chama o método para obter a última venda do objeto Venda
    } else {
        echo "<p>Produto não encontrado</p>";
    }
}

function debugNewline($linhas = 1){ # Função para debug: simplesmente imprime um número n de linhas no navegador.
    for ($i = 0; $i < $linhas; $i++){
        echo "<br></br>";
    }
}


?>
