<?php
model('consultsbd');

class Login extends ConsultsBD
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
            $this->consult = new ConsultsBD;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertInto($table, $column, $data)
    {
        $this->consult->insertInto($table, $column, $data);
    }

    public function getData($table, $column)
    {
    }

    public function getRow($table, $column, $where)
    {
        return $this->consult->getRow($table, $column, array($where[0], $where[1]));
    }

    public function updateRow($table, $name, $value, $where)
    {
        $this->consult->updateRow($table, $name, $value, $where);
    }

    public function deleteUser($table,  $where)
    {
    }

    public function registerUser($register)
    {
        try {
            if (isset($_POST['usuario'])) {
                // Ejecutamos la consulta e insertamos/registramos en BD
                $this->insertInto(TABLE_PASS, 'usuarios', $register->user);
                $datos = array(
                    'password' => $register->password,
                    'id_usuario' => $register->user,
                    'email' => $register->email,
                    'fecha_registro' => date('Y-m-d-G-i-s')
                );
                foreach ($datos as $name => $value) {
                    $this->consult->updateRow(TABLE_PASS, $name, $value, array('usuarios', $register->user));
                }
                $create_bd = $this->consult->getRow(TABLE_PASS, '*', array('usuarios', $register->user));
                $final = $this->createSections($create_bd);
                return $final;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function createSections($user)
    {
        // Create id, id_usuario at tables of Database
        $this->consult->insertInto('datos_usuarios', 'id', $user->id);
        $this->consult->updateRow('datos_usuarios', 'id_usuario', $user->id_usuario, array('id', $user->id));
        $this->consult->insertInto('menu_dia', 'id', $user->id);
        $this->consult->updateRow('menu_dia', 'id_usuario', $user->id_usuario, array('id', $user->id));
        $this->consult->insertInto('datos_personales', 'id', $user->id);
        $this->consult->updateRow('datos_personales', 'id_usuario', $user->id_usuario, array('id', $user->id));
        $this->consult->updateRow('datos_personales', 'email', $user->email, array('id', $user->id));
        // Create folders of work for images
        controller("createfolders");
        createfoldersController::createFoldersImages($user);
        // Send email of welcome our enterprice to user new
        controller('email');
        EmailController::emailWelcome($user);
        return  'Hecho, Usuario registrado';
    }
}
