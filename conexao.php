<?php

$hostname = "localhost";
$bancodedados = "cadastro";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_error . ")" . $mysqli->connect_errno;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cadastroNome = $mysqli->real_escape_string($_POST['nome']);
    $cadastroWebsite = $mysqli->real_escape_string($_POST['website']);
    $cadastroEmail = $mysqli->real_escape_string($_POST['email']);
    $cadastroComentario = $mysqli->real_escape_string($_POST['comentario']);
    $cadastroGenero = $mysqli->real_escape_string($genero);

    $sql = "INSERT INTO usuario (nome, website, email, comentario, genero) VALUES ('$cadastroNome', '$cadastroWebsite', '$cadastroEmail', '$cadastroComentario', '$cadastroGenero')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Novo registro criado !";
    } else {
        echo "Erro: " . $sql . "<br/>" . $mysqli->error;
    }
}

$mysqli->close();
