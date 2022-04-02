<?php

require_once("view_config.php");
require_once("../controller/Controller_Academico.php");
require_once("../model/user/Academico.php");

$_SESSION["id"] = 7;

extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Academico($_SESSION["id"]);
                $objectController->deleteAcademico($id);
                header("Location:public/academico/academico.php?success=Experiência deletada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/academico/academico.php?error=Não foi possivel deletar essa experiência");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Academico($_SESSION["id"]);
                $objectController->addAcademico($_GET);
                header("Location:public/academico/academico.php?success=Experiência cadastrada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/academico/academico.php?error=Não foi possivel cadastrar essa experiência");
            }

            break;
        default:
            header("Location:public/academico/academico.php?error=Comando invalido");
            break;
    }
} else {
    header("Location:public/academico/academico.php?error=Comando invalido");
}
