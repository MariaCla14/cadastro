<?php
// Verifica se os dados do formulário foram enviados
$usuario ='root';
$senha = '';
$database = 'guiajk';
$host = '127.0.0.1';


$conexao = new mysqli($host, $usuario, $senha, $database,);

if($conexao-> error) {
    die("Falha ao conectar ao Banco de Dados: " .$mysqli->error);
}
?>
