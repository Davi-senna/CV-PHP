<?php

require_once("view_config.php");
require_once("../controller/Controller_Habilidade.php");
require_once("../model/user/Habilidade.php");

$_SESSION["id"] = 7;

extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Habilidade($_SESSION["id"]);
                $objectController->deleteHabilidade($id);
                header("Location:public/habilidades/habilidades.php?success= Habilidade deletada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/habilidades/habilidades.php?error=Não foi possivel deletar essa habilidade");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Habilidade($_SESSION["id"]);
                $objectController->addHabilidade($_GET);
                header("Location:public/habilidades/habilidades.php?success= Habilidade cadastrada com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/habilidades/habilidades.php?error=Não foi possivel cadastrar essa habilidade");
            }

            break;
        default:
            header("Location:public/habilidades/habilidades.php?error=Comando invalido");
            break;
    }
} else {
    header("Location:public/habilidades/habilidades.php?error=Comando invalido");
}
