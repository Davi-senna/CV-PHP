<?php

require_once("view_config.php");


extract($_GET);

if (isset($stmt)) {

    switch ($stmt) {

        case 'delete':

            try {
                $objectController = new Controller_Usuario();
                $objectController->deleteUser($id);
                header("Location:public/user/usuario.php?success=Usuário deletado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/user/usuario.php?error=Não foi possivel deletar esse usuario");
            }

            break;

        case 'insert':

            try {
                $objectController = new Controller_Usuario();
                $objectController->addUser($_GET);
                header("Location:public/user/usuario.php?success=Usuário cadastrado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/user/usuario.php?error=Não foi possivel cadastrar esse usuario");
            }

            break;

        case 'update':

            try {
                $objectController = new Controller_Usuario($id);
                $objectController->updateUser($_GET);
                header("Location:public/user/usuario.php?success=Usuário atualizado com sucesso");
            } catch (\Throwable $th) {
                header("Location:public/user/usuario.php?error=Não foi possivel atualizar esse usuario");
            }

            break;

        case 'login':

            try {
                $objectController = new Controller_Usuario();
                $results = $objectController->comfirmUser($_GET);
                if($results["valid"] == 1){
                    header("Location:public/user/usuario.php?success=Usuário atualizado com sucesso");
                }else{
                    header("Location:public/user/usuario.php?error=Login ou senha invalido");
                }
                
            } catch (\Throwable $th) {
                header("Location:public/user/usuario.php?error=Login ou senha invalido");
            }

            break;
    }
} else {
    header("Location:public/user/usuario.php?error=Comando invalido");
}
