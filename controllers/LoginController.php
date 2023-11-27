<?php

namespace Controllers;

use Model\usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new usuario($_POST);

            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                // comprobar si exsite el susario
                $usuario = usuario::where('email', $auth->email);

                if ($usuario) {


                    if (empty($alertas)) {
                        //iniciar sesion
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['administrador'] = $usuario->administrador;
                        $_SESSION['phone'] = $usuario->phone;
                        $_SESSION['login'] = true;

                        if ($usuario->administrador === "1") {
                            $_SESSION['administrador'] = $usuario->administrador ?? null;
                            header('Location: /admin');
                        } else {
                            header('Location: /cita');
                        }
                    }
                } else {
                    usuario::setAlerta('error', 'Email Invalido');
                }
            }
        }

        $alertas = usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function registro(Router $router)
    {
        $usuario = new usuario($_POST);

        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarRegistro();

            //revisar que alertas esté vacío
            if (empty($alertas)) {
                //comprobar que no exista el email ni el correo en la bd
                $alertas = $usuario->existeUsuario();
                if (empty($alertas)) {

                    //hashear password
                    $usuario->hashPassword();
                    // ver si hay otro usuario con la contraseña
                    //$alertas= $usuario->samePassword();
                    if (empty($alertas)) {
                        $usuario->primeraMayuscula();

                        //crear usuario
                        $resultado = $usuario->guardar();
                        if ($resultado) {
                            header('Location:/');
                        }
                    }
                }
            }
        }
        $router->render('auth/registro', [
            //pasarle el objeto usuario al php que va a renderizar
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function salir()
    {
        echo "salir" . "<br>";
    }


    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }



}
