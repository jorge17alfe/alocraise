<?php
model('consultsbd');

class Restaurant extends ConsultsBD
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
       return $this->consult->updateRow($table, $name, $value, $where);
    }

    public function deleteUser($table,  $where)
    {
    }


}
