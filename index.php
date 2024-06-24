<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <h1>Formulário com PHP</h1>

        <p>Espaços <span class="error">obrigatórios</span> precisam ser preenchidos !</p>
        <label for="nome">Nome: <span class="error">*</span></label><br>
        <input type="text" name="nome"><br><br>

        <label for="website">Website: </label><br>
        <input type="text" name="website"><br><br>

        <label for="email">Email: <span class="error">*</span></label><br>
        <input type="text" name="email"><br><br>

        <label for="comentario">Comentário: </label><br>
        <textarea name="comentario" cols="30" rows="3"></textarea><br><br>

        <label for="genero">Genero: <span class="error">*</span></label> <br>
        <input type="radio" value="masculino" name="genero"> Masculino <br>
        <input type="radio" value="feminino" name="genero"> Feminino <br>
        <input type="radio" value="outro" name="genero"> Outro <br>

        <button name="enviado" type="submit">Enviar</button>
        <button type="reset">Resetar</button>

        <h2>Dados Enviados: </h2>
        <?php

        // verifica se a variável foi enviada: 
        if (isset($_POST['enviado'])) {
            if (empty($_POST['nome']) or strlen($_POST['nome']) < 3 or strlen($_POST['nome']) > 100) {
                echo "<p class='error'> Preencha o campo nome! </p>";
            } else {
                $genero = "Não selecionado";

                if (!filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
                    echo "<p class='error'> Preencha corretamente o campo website! </p>";
                    die();
                }

                if (empty($_POST['email']) or !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    echo "<p class='error'> Preencha o campo email! </p>";
                    die();
                }

                if (isset($_POST['genero'])) {
                    $genero = $_POST['genero'];
                    if ($genero != "masculino" and $genero != "feminino" and $genero != "outro") {
                        echo "<p class='error'> Preencha o campo gênero! </p>";
                        die();
                    }
                }
                echo ("<p><b>Nome: </b>" . $_POST['nome'] . "</p>");
                echo ("<p><b>Website: </b>" . $_POST['website'] . "</p>");
                echo ("<p><b>Email: </b>" . $_POST['email'] . "</p>");
                echo ("<p><b>Comentário: </b>" . $_POST['comentario'] . "</p>");
                echo ("<p><b>Gênero: </b>" . $genero . "</p>");
            }
        }
        include('conexao.php');
        ?>
    </form>

</body>

</html>