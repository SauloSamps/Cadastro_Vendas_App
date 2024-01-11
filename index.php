<?php
/*RESUMO: A aplicação é capaz de criar produtos e cadastrá-los em um vetor. Também é capaz de registrar os atributos do produto
após uma venda assim como a data e hora da venda. "functions.php" contém algumas funções para automatização de alguns processos.
Todos os métodos essenciais pertencem às classes que também podem ser acessadas aqui*/

include 'functions.php';

/*DEMONSTRAÇÃO DE FUNCIONAMENTO DA APLICAÇÃO*/

$registroVendas = new RegistroVendas; # inicialização dos vetores que armazenam as vendas realizadas (obrigatório)
$cadastroProdutos = new CadastroProdutos; # inicialização dos vetores que armazenam os produtos (obrigatório)

cadastrarProduto("Leite Integral", 4.0, 5, $cadastroProdutos); # cadastra o produto (ex: "Leite Integral")
cadastrarDesconto("Leite Integral", 0.15, $cadastroProdutos); # cadastra o desconto para o produto
venderProduto("Leite Integral", 2, $cadastroProdutos, $registroVendas); # registra venda do produto
exibirVendas($registroVendas); # Podemos verificar as vendas registradas até então.
debugNewline();
exibirUltimaVenda("Leite Integral", $registroVendas, $cadastroProdutos); #exibe a última venda do produto.

?>

