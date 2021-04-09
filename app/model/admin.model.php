<?php 
model('consultsbd');

class Admin extends ConsultsBD
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
       return $this->consult->getData($table, $column);
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
        $this->consult->deleteUser($table, $where);

    }


}