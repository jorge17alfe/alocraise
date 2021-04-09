<?php
require helpers('validar');
model('login');
class LoginController
{
    private     $column =    'id_usuario';
    public function __construct()
    {
        $this->valide = new Validar;
        $this->model = new Login;
    }

    public function reestablecerPassword()
    {
        if (isset($_GET['i'])) {
            view('login/reset_password', HEAD, FOOTER);
            die();
        }
        redirect('');
    }

    public function register()
    {
        if (isset($_POST["usuario"])) {
            $error = array();
            $alm = new Validar();
            $registro = $alm->Filtrar_datos($_POST["usuario"]);
            $password = $alm->Filtrar_datos($_POST["password"]);
            $confirm_password = $alm->Filtrar_datos($_POST["confirm_password"]);
            $email = $alm->Filtrar_datos($_POST["email"]);
            $confirm_email = $alm->Filtrar_datos($_POST["confirm_email"]);

            // Validamos usuario
            $result_user = $this->validateUser($registro);
            if ($result_user == 1) {
                $alm->user = $registro;
            } else {
                $error[] = $result_user;
            }

            // Validamos password
            [$result_pass, $bolean_pass] = $this->validatePassword($password, $confirm_password);
            if ($bolean_pass == 1) {
                $alm->password = $result_pass;
            } else {
                $error[] = $result_pass;
            }

            // Validamos E-mail
            [$result_email, $bolean_email] = $this->validateEmail($email, $confirm_email);
            if ($bolean_email == 1) {
                $alm->email = $result_email;
            } else {
                $error[] = $result_email;
            }

            if (!empty($error)) {
                for ($i = 0; $i < count($error); $i++) {
                    echo  $i + 1 . ' .- ' . $error[$i][0] . '<br>';
                }
                die();
            } else {
                $result =  $this->model->registerUser($alm);
                msgAlert($result, 'iniciar-sesion');
                die();
            }
        }
        // notAllowed('');
    }

    public function validateUser($registro = null)
    {
        if ($registro != null) {
            $consult_users_new = $this->model->getRow(TABLE_PASS, 'usuarios', array('usuarios', $registro));
            if (!isset($consult_users_new->usuarios)) {
                $usuario = $this->valide->Validar_usuario($registro);
                if ($usuario == 1) {
                    return TRUE;
                    die();
                } else {
                    $error[] = 'Usuario erróneo, contiene espacios ó caractéres no permitidos';
                }
            } else {
                $error[] = 'El usuario no esta disponible, inténtalo de nuevo.';
            }
            return $error;
        }
        notAllowed();
    }

    public function validatePassword($password = null, $confirm_password = null)
    {
        if ($password != null && $confirm_password != null) {
            if ($password === $confirm_password) {
                $validar_pass = $this->valide->Validar_password($password);
                if ($validar_pass == 1) {
                    $pass_cifrado = password_hash($confirm_password, PASSWORD_DEFAULT, array("cost" => 12));
                    return [$pass_cifrado, TRUE];
                    die();
                } else {
                    $error[] = 'Contraseña errónea, contiene espacios ó caractéres no permitidos ';
                }
            } else {
                $error[] = 'Contraseña tienen que ser iguales';
            }
            return [$error, FALSE];
        }
        notAllowed('');
    }

    public function validateEmail($email = null, $confirm_email = null)
    {
        if ($email != null && $confirm_email != null) {
            if ($email === $confirm_email) {

                $consult_email_new = $this->model->getRow(TABLE_PASS, 'email', array('email', $email));
                if (!isset($consult_email_new->email)) {
                    $email =  filter_var($email, FILTER_VALIDATE_EMAIL);
                    return [$email, TRUE];
                    die();
                } else {
                    $error[] = "El email ya lo tenemos registrado. Si no recuerda la contraseña vaya al apartado de <a href='" . SERVERURL . "iniciar-sesion'>Reestablecer contraseña.</a>";
                }
            } else {
                $error[] = 'E-mail no coinciciden';
            }
            return [$error, FALSE];
        }
        notAllowed('');
    }

    public function checkLogin()
    {
        try {
            if (isset($_POST['login'])) {
                $alm = new Validar();
                $login = $alm->Filtrar_datos($_POST["login"]);
                $password = $alm->Filtrar_datos($_POST["password"]);
                $consult = $this->model->getRow(TABLE_PASS, 'password', array('usuarios', $login));

                if (isset($consult->password)) {
                    if (password_verify($password, $consult->password)) {
                        session_start();
                        $_SESSION["usuario"] = $login;
                        $this->model->updateRow(TABLE_PASS, 'ultima_conexion', date('Y-m-d H:i:s'), array('id_usuario', $_SESSION["usuario"]));
                        // include 'app/helpers/cookies.php';
                        // Cookies::create_cookie('user',$login, -2);
                        // Cookies::create_cookie('pass',$password, -2);
                        // Cookies::create_cookie('user',$login, 120);
                        // Cookies::create_cookie('pass',$password, 120);
                        redirect("restaurant/inicio"); 
                        die();
                    } else {
                        $msg[] = 'Contraseña incorrecta.';
                    }
                } else {
                    $msg[] = 'Usuario y contraseña incorrecta.';
                }
                echo $msg[0];
                die();
            }
            notAllowed('');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function validateMailResetPassword()
    {
        if (isset($_POST["enviar_email"])) {
            $alm = new Validar();
            $email = $alm->Filtrar_datos($_POST["email_reset_pass"]);

            $consult_email = $this->model->getRow(TABLE_PASS, 'email', array('email', $email));
            if (isset($consult_email->email)) {
                $code = md5(uniqid(mt_rand()) . time());
                $this->model->updateRow(TABLE_PASS, 'recuperar_password', $code, array('email', $consult_email->email));

                $link_reestablecer = SERVERURL . "login/reestablecerpassword/&i=$code";
                // header("location:" . SERVERURL . "login/reestablecerpassword/?i=$code");
                // exit();
                controller('email');
                $alm            = new EmailController;
                $consult = $this->model->getRow(TABLE_PASS, '*', array('email', $consult_email->email));
                $consult->link_reestablecer = $link_reestablecer;
                $result = $alm->emailReestablecerPassword($consult);
                msgAlert($result, '');
            } else {
                msgAlert('El email no esta registrado. vuelve a intentarlo.', 'iniciar-sesion');
            }
        }
        notAllowed('');
    }

    public function updatePassword()
    {
        if (isset($_REQUEST['reset_password'])) {

            $alm = new Validar();
            $password = $alm->Filtrar_datos($_POST["password"]);
            $confirm_password = $alm->Filtrar_datos($_POST["confirm_password"]);

            $token = $this->model->getRow(TABLE_PASS, 'recuperar_password', array('recuperar_password', $_POST["token"]));
            if (isset($token->recuperar_password)) {
                [$pass, $bolean_pass] = $this->validatePassword($password, $confirm_password);
                if ($bolean_pass == 1) {
                    // Ejecutamos la consulta y actualizamos contaraseña y eliminamos token BD
                    $this->model->updateRow(TABLE_PASS, 'password', $pass, array('recuperar_password', $token->recuperar_password));
                    $this->model->updateRow(TABLE_PASS, 'recuperar_password', '', array('recuperar_password', $token->recuperar_password));
                    msgAlert('Contraseña actualizada', 'iniciar-sesion');
                } else {
                    $error = $pass[0];
                }
            } else {
                $error = 'Email expirado';
            }
            msgAlert($error, 'iniciar-sesion');
        }
        notAllowed('');
    }

    public function signOut()
    {
        try {
            session_start();
            session_destroy();
            redirect("");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
