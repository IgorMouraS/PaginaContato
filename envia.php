<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recebedados</title>
</head>
<body>
<?php
$conexao = mysqli_connect("localhost", "root", "abcdefg", "teste");

if (!$conexao) {
    echo "Não Conectado";
} else {
    echo "Conectado ao Banco >>>>>>>>>>>>";

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $cpf = mysqli_real_escape_string($conexao, $cpf);

    $sql = "SELECT cpf FROM teste.dados WHERE cpf = '$cpf'";
    $retorno = mysqli_query($conexao, $sql);

    if (!$retorno) {
        echo "Erro na consulta: " . mysqli_error($conexao);
    } else {
        if (mysqli_num_rows($retorno) > 0) {
            echo "CPF Já Cadastrado!<br>";
        } else {
            
            $nome = mysqli_real_escape_string($conexao, $nome);
            $idade = mysqli_real_escape_string($conexao, $idade);

            $sql_insert = "INSERT INTO teste.dados(nome, idade, cpf) VALUES ('$nome','$idade','$cpf')";
            $resultado_insert = mysqli_query($conexao, $sql_insert);

            if (!$resultado_insert) {
                echo "Erro ao inserir dados: " . mysqli_error($conexao);
            } else {
                echo "Usuário Cadastrado Com Sucesso!<br>";
                $sql = "SELECT cpf FROM teste.dados";
                echo "$retorno<br>";
            }
        }
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>

</body>
</html>