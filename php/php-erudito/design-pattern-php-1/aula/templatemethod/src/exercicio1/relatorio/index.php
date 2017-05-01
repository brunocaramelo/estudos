<?php

require '../../../../../autoload/autoload.php';

// require 'Relatorio.php';
// require 'TemplateRelatorio.php';

// require 'Conteudo.php';
// require 'RelatorioSimples.php';
// require 'RelatorioComplexo.php';



$conteudo = new Conteudo('$nome','$telefone','$data','$endereco','$email');

echo '<br />relatorio simples<br />';
$relatorioSimples = new RelatorioSimples($conteudo);
echo $relatorioSimples->imprime();

echo '<br />relatorio complexo<br />';
$relatorioComplexo = new RelatorioComplexo($conteudo);
echo $relatorioComplexo->imprime();
