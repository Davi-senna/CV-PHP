<?php

require_once("view_config.php");
require_once("../controller/Controller_Portfolio.php");
require_once("../model/user/Portfolio.php");

$_SESSION["id"] = 7;

if(!empty($_POST)){

    extract($_POST);

}else{
    extract($_GET);
}

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

             try {
                $objectController = new Controller_Portfolio($_SESSION["id"]);
                $objectController->deletePortfolio($id,$_FILES);
                header("Location:public/portfolio/portfolio.php?success= emelemento deletado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/portfolio/portfolio.php?error=Não foi possivel deletar esse elemento");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Portfolio($_SESSION["id"]);
                $objectController->addPortfolio($_POST,$_FILES);
                header("Location:public/portfolio/portfolio.php?success= Elemento cadastrado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/portfolio/portfolio.php?error=Não foi possivel cadastrar esse elemento");
            }

            break;
        default:
            header("Location:public/portfolio/portfolio.php?error=Comando invalido");
            break;
    }
} else {
    header("Location:public/portfolio/portfolio.php?error=Comando invalido");
}
