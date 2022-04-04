<?php

session_start();
$_SESSION["id"] = 7;
require_once("../../../model/Sql.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Currículum</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/aos.css?ver=1.1.0" rel="stylesheet">
  <link href="css/bootstrap.min.css?" rel="stylesheet">
  <link href="css/main.css?" rel="stylesheet">
  <link rel="shortcut icon" href="images/portfolio-icon.png" type="image/x-icon">
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">

<section id="cadastro-usu">

<form class="form_usu" id="form_cadastro_usu" action="../../view_usuario.php" method="GET">

    <span>Faça seu cadastro</span>

    <div id="login">

        <div class="container-input-dados ">
            <input class="input-dados" type="text" required name="nome" id="nome">
            <label class="label-animado" for="nome">Nome</label>
        </div>

        <div class="container-input-dados">
            <input class="input-dados" type="text" required name="login" id="input-login">
            <label class="label-animado" for="input-login">Login</label>
        </div>

        <div class="container-input-dados">
            <input class="input-dados" type="password" required name="senha" id="senha">
            <label class="label-animado" for="senha">Senha</label>
        </div>

        <div class="container-input-dados">
            <input class="input-dados" type="email" required name="email" id="email">
            <label class="label-animado" for="email">E-mail</label>
        </div>

        <input type="hidden" name="stmt" required class="form-control" id="stmt" value="insert">

        
    </div>
    <div class="container-button-dados">
        <button id="button-dados" type="submit">Entrar</button>
        <br><br>
        <a href="../../../../index.php">Já tenho conta</a>
      </div>

</form>
</section>

  <script src="js/core/jquery.3.2.1.min.js?ver=1.1.0"></script>
  <script src="js/core/popper.min.js?ver=1.1.0"></script>
  <script src="js/core/bootstrap.min.js?ver=1.1.0"></script>
  <script src="js/now-ui-kit.js?ver=1.1.0"></script>
  <script src="js/aos.js?ver=1.1.0"></script>
  <script src="scripts/main.js?ver=1.1.0"></script>
  <style>
    body {
      background-image: url("../../../../images/fundo.png");
    }

    #login{
      display: flex;
      width: 40vw;
    }

    #cadastro-usu {
      left: 15vw;
      border-radius: 0.5em;
      margin: 20vh 0 0 0vw;
    }

    .input-dados {
      outline: none;
      width: max(200px,15vw);
      background-color: transparent;
      border: 0;
      border-bottom: 1px rgb(255, 255, 255) solid;
      display: inline-block;
      color: rgb(255, 255, 255);
      padding: 0.5vw 0.5vw;
      font-size: max(15px,1.2vw);
      transition: all .3s ease-out;
    }

    .label-animado {
      color: rgb(255, 255, 255);
      position: absolute;
      font-size: max(15px,1.1vw);
      top: 0.5vw;
      left: 0;
      transition: .4s;
    }

    .input-dados:focus~label,
    .input-dados:valid~label {
      font-size: max(8px,0.6vw);
      top: -10px;
      left: 0 !important;
    }

    .input-dados:valid {
      border-bottom: 1px rgb(30, 255, 0) solid;
    }

    #header-login {
      width: 100%;
    }

    .form_usu {
      flex-wrap: wrap;
    }

    .form_usu span {
      color: rgb(255, 255, 255);
      margin: 0vh 0 10vh max(80px,13vw);
      font-size: max(30px,2.7vw);
    }



    .container-input-dados {
      position: relative;
      margin: 5vh 0 5vh 3vw;
    }

    #pg-cadastro-fundo {
      height: 100vh;
      align-items: flex-end;
    }

    #pg-cadastro-fundo figure img {
      width: 100%;
      height: 90vh;
    }

    #login {
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }


    .container-button-dados a {
      margin-left: max(140px,19.5vw);
      color: rgb(255, 255, 255) ;
      font-size: max(8px,0.8vw);

    }

    #button-dados {
      color: rgb(255, 255, 255);
      background-color: transparent;
      width: max(180px,10vw);
      height: max(20px,1.6vw);
      font-size: max(8px,0.8vw);
      justify-content: center;
      align-items: center;
      margin: 5vh 0 0 max(80px,16vw);
    }

    #button-dados:hover {
      cursor: pointer;
    }

    #container-login {
      margin-bottom: 5vh;
    }
  </style>
</body>

</html>