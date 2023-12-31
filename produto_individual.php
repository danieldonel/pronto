<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doces</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="produto_individual.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <script src="produto_individual.js"></script>

</head>
<body>
    <div class="principal">
        <header id="header">
            <a id="logo" href=""><img src="img/seta.png" width="20px"></a>
            <nav id="nav">
                <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
            <span id="hamburger"></span>
          </button>
          <ul id="menu" role="menu">
            <li><a href="/">Minha Conta</a></li>
            <li><a href="principal.html">Produtos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
            <li><a href="carrinho.html">Carrinho</a></li>
            <li><a href="fale_conosco.html">Fale conosco</a></li>
          </ul>
        </nav>
      </header>
      <script src="./script.js"></script>
    </div>
    <div class="div2">
        <div class="barra">
            
            <img src="img/logo.png" width="110px" class="logo">
            <img src="img/titulo1.png" width="190px" class="titulo">
        </div>
    </div>
    <br><br><br>
<?php
                include("conecta.php"); // conectar com banco de dados

                $id = $_GET['id']; // Obtém o ID da URL

                $comando = $pdo->prepare("SELECT * FROM produtos WHERE produtos.Id_produtos = :id");
                $comando->bindParam(':id', $id);
                $resultado = $comando->execute();  

            while ( $linhas = $comando->fetch() )
            {
                $Nome = $linhas ["nome"];
                $imagem = $linhas ["imagem"];
                $i=base64_encode($imagem);
                $preco = $linhas ["preco"];
                $id = $linhas ["Id_produtos"];
                echo("
                <div class=\"foto\">
                    <b>$Nome</b> 
                    <img class=\"imagem\" src=\"data:image/jpeg;base64,$i\" width=\"150px\">
                </div>
                <br>
                <fieldset class=\"fil1\"> 
      
                  <table align=\"center\">
                    <tr>
                      <td> <input type=\"checkbox\"> SEM OVO</td>  <td><input type=\"checkbox\"> SEM GLÚTEM</td>
                    </tr>

                    <tr>
                      <td><input type=\"checkbox\"> SEM LEITE</td>  <td><input type=\"checkbox\"> SEM SAL</td>
                    </tr>
                  </table>
                </fieldset>
                
                <div class=\"uni\">

                <fieldset class=\"fil2\">
                 
                
                 <button onclick=\"Subtrair();\" class=\"menos\"> <b>-</b> </button>
                 <input class=\"numero\" value=\"1\" id=\"numero\" type=\"number\">
                 <button onclick=\"Adicionar();\" class=\"mais\"><b>+</b></button>
             
                </fieldset>

                <button onclick=\"comprar($id);\" class=\"comprar\"> COMPRAR </button>
                ");
            }
            

        ?>
        <div class=tudo></div>
</body>
</html>