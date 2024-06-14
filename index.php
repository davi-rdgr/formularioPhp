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
        <input type="text" name="nome" required><br><br>

        <label for="website">Website: <span class="error">*</span></label><br>
        <input type="url" name="website" required><br><br>

        <label for="email">Email: <span class="error">*</span></label><br>
        <input type="text" name="email" required><br><br>

        <label for="comentario">Comentário: </label><br>
        <textarea name="comentario" cols="30" rows="3"></textarea><br><br>
        
        <label for="genero">Genero: </label> <br>
        <input type="radio" value="masculino" name="genero"> Masculino <br>
        <input type="radio" value="feminino" name="genero"> Feminino <br>
        <input type="radio" value="outro" name="genero"> Outro <br>

        <button name="enviado" type="submit">Enviar</button>
        <button type="reset">Resetar</button>

        <h2>Dados Enviados: </h2>
        <?php 

        // verifica se a variável foi enviada: 
        if(isset($_POST['enviado'])) {
            $genero = "Não selecionado";
            if(isset($_POST['genero'])) {
                $genero = $_POST['genero'];
            }
            echo ("<p><b>Nome: </b>". $_POST['nome'] ."</p>");
            echo ("<p><b>Website: </b>". $_POST['website'] ."</p>");
            echo ("<p><b>Email: </b>". $_POST['email'] ."</p>");
            echo ("<p><b>Comentário: </b>". $_POST['comentario'] ."</p>");
            echo ("<p><b>Gênero: </b>". $genero ."</p>");
        }
        ?>
    </form>
    
</body>
</html>