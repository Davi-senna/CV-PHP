<?php

require_once("view_config.php");
require_once("../controller/Controller_Experiencia.php");
require_once("../model/user/Experiencia.php");

$_SESSION["id"] = 7;

extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Experiencia($_SESSION["id"]);
                $objectController->deleteExperiencia($id);
                header("Location:public/experiencia/experiencia.php?success=Experiência deletada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/experiencia/experiencia.php?error=Não foi possivel deletar essa experiência");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Experiencia($_SESSION["id"]);
                $objectController->addExperiencia($_GET);
                header("Location:public/experiencia/experiencia.php?success=Experiência cadastrada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/experiencia/experiencia.php?error=Não foi possivel cadastrar essa experiência");
            }

            break;
        default:
            header("Location:public/experiencia/experiencia.php?error=Comando invalido");
            break;
    }
} else {
    header("Location:public/experiencia/experiencia.php?error=Comando invalido");
}
