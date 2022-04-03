<?php

require_once("view_config.php");
require_once("../controller/Controller_Sobre.php");
require_once("../model/user/sobre.php");

$_SESSION["id"] = 7;

extract($_GET);
//var_dump($_GET);


if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Sobre($_SESSION["id"]);
                $objectController->deleteSobre($id);
                header("Location:public/sobre/sobre.php?success=Informações deletadas com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/sobre/sobre.php?error=Não foi possivel deletar essas informações");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Sobre($_SESSION["id"]);
                $objectController->addSobre($_GET);
                header("Location:public/sobre/sobre.php?success=Informações cadastrasda com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/sobre/sobre.php?error=Não foi possivel cadastrar essas informações");
            }

            break;

        case 'update':
            echo 1;

            try {
                $objectController = new Controller_Sobre($_SESSION["id"]);
                $objectController->updateSobre($_GET);
                header("Location:public/sobre/sobre.php?success=Informações atualizadas com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/sobre/sobre.php?error=Não foi possivel atualizar essas informações");
            }

            break;
        default:
            header("Location:public/sobre/sobre.php?error=Comando invalido");
            break;
    }
} else {
    header("Location:public/sobre/sobre.php?error=Comando invalido");
}