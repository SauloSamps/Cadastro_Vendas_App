<?php
/*RESUMO: A aplicação é capaz de criar produtos e cadastrá-los em um vetor. Também é capaz de registrar os atributos do produto
após uma venda assim como a data e hora da venda. "functions.php" contém algumas funções para automatização de alguns processos.
Todos os métodos essenciais pertencem às classes que também podem ser acessadas aqui*/

include 'functions.php';

/*DEMONSTRAÇÃO DE FUNCIONAMENTO DA APLICAÇÃO*/

$registroVendas = new RegistroVendas; # inicialização dos vetores que armazenam as vendas realizadas (obrigatório)
$cadastroProdutos = new CadastroProdutos; # inicialização dos vetores que armazenam os produtos (obrigatório)

/*
O vetor de CadastroProdutos é um array contendo arrays de duas posições, uma com o objeto produto e outra com o objeto venda.
O vetor de RegistroVendas é um array contendo arrays de duas posições, uma com o objeto venda e outra com o timestamp da data da venda.
*/

cadastrarProduto("Leite Integral", 4.0, 5, $cadastroProdutos); # cadastra o produto (ex: "Leite Integral")
cadastrarDesconto("Leite Integral", 0.15, $cadastroProdutos); # cadastra o desconto para o produto
venderProduto("Leite Integral", 2, $cadastroProdutos, $registroVendas); # registra venda do produto
exibirVendas($registroVendas); # Podemos verificar as vendas registradas até então.
debugNewline();
exibirUltimaVenda("Leite Integral", $registroVendas, $cadastroProdutos); #exibe a última venda do produto.

/* 
Exemplo de saída de exibirVendas após a execução acima:

object(RegistroVendas)#1 (1) { ["registro":"RegistroVendas":private]=> array(1) { [0]=> array(2) { 
["venda"]=> object(Venda)#4 (5) { ["nome"]=> string(14) "Leite Integral" ["preço"]=> float(4) ["quantidade"]=> int(3) 
["desconto"]=> float(0.15) ["quantidadeVendas"]=> int(2) } ["timestamp"]=> array(11) { ["seconds"]=> int(50) 
["minutes"]=> int(4) ["hours"]=> int(20) ["mday"]=> int(11) ["wday"]=> int(4) ["mon"]=> int(1) ["year"]=> int(2024) 
["yday"]=> int(10) ["weekday"]=> string(8) "Thursday" ["month"]=> string(7) "January" [0]=> int(1704999890) } } } }
*/

?>

