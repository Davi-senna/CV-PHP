<?php

require_once("view_config.php");
require_once("../controller/Controller_Academico.php");
require_once("../model/user/Academico.php");

$_SERVER["id"] = 1;

extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Academico($_SERVER["id"]);
                $objectController->deleteAcademico($id);
                header("Location:public/academico/academico.php?success=Experiência deletada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/academico/academico.php?error=Não foi possivel deletar essa experiência");
            }

            break;
/*
        case 'insert':

            try {
                $objectController = new Controller_Academico();
                $objectController->addacademico($_GET);
                header("Location:public/academico/academico.php?success=Usuário cadastrado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/academico/academico.php?error=Não foi possivel cadastrar esse usuario");
            }

            break;

        case 'update':

            try {
                $objectController = new Controller_Academico($id);
                $objectController->updateacademico($_GET);
                header("Location:public/academico/academico.php?success=Usuário atualizado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/academico/academico.php?error=Não foi possivel atualizar esse usuario");
            }

            break;
*/
    }
} else {
    header("Location:public/academico/academico.php?error=Comando invalido");
}
