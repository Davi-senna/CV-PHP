<?php

require_once("view_config.php");

$objectController = new Controller_Usuario();

extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
            $objectController->deleteUser($id);
            } catch (\Throwable $th) {
            header("Location:public/user/usuario.php?error=Não foi possivel deletar esse usuario");
            }
            header("Location:public/user/usuario.php?success=Usuário deletado com sucesso");

        break;

        case 'insert':
            
        break;
    }
}else{
    header("Location:public/user/usuario.php?error=Usuário não encontrado");
}
