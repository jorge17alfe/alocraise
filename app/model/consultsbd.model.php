<?php
class ConsultsBD
{

    private $pdo;

    public function __CONSTRUCT()
    {

        $this->pdo = Database::StartUp();
    }

    public function insertInto($table, $column, $data)
    {
        $sql = "INSERT INTO  $table ($column) VALUES (?)";
        $result = $this->pdo->prepare($sql);
        $result->execute(array($data));
    }

    public function getData($table, $column)
    {
        try {
            $sql = "SELECT $column FROM $table";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
                $json[] = $row;
            }
            return $json[0];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getRow($table, $column, $where)
    {
        try {
            $sql = "SELECT $column FROM $table WHERE $where[0] = ? ";
            $result = $this->pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $result->execute(array($where[1]));
            $result_final = $result->fetch(PDO::FETCH_OBJ);
            return $result_final;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function getGroupRows($table, $column, $since, $total_rows)
    {
        try {
            $sql = "SELECT $column FROM $table LIMIT $since, $total_rows";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
                $json[] = $row;
            }
            return $json[0];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function updateRow($table, $name, $value, $where)
    {
        try {
            $sql = "UPDATE  $table SET	
						    $name       = ?
 					WHERE   $where[0]   = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $value,
                        $where[1]
                    )
                );
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchData($table, $column, $where)
    {
        try {
            if ($table && $column && $where) {
                $sql = "SELECT $column FROM $table WHERE $where[0] LIKE '$where[1]%' ";
                $result = $this->pdo->prepare($sql);
                $result->execute();
                $json = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $json[] = $row
                        // 'usuario' => $row->usuarios,
                        // 'id_usuario' => $row->id_usuario,
                        // 'fecha_registro' => $row->fecha_registro,
                        // 'email' => $row->email,
                        // // 'apellidos' => $row->apellidos,
                        // 'id' => $row->id
                    ;
                }
                return $json;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($table,  $where)
    {
        try {
            if ($table  && $where) {
                $sql = $this->pdo
                    ->prepare("DELETE FROM $table WHERE $where[0] = ?");
                $sql->execute(array($where[1]));
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
