<?php
// model('consultsbd');
class Information
{

    private $pdo;

    public function __CONSTRUCT()
    {

        $this->pdo = Database::StartUp();
        // $this->consult = new ConsultsBD;
    }

    public function insertInto($table, $column, $data, $token)
    {
            $sql = "INSERT INTO  $table ($column) VALUES ($data)";
            $result = $this->pdo->prepare($sql);
            $result->execute();
            return true;
    }
    public function getData($table, $column)
	{
		try {
            $sql = "SELECT $column FROM $table ORDER BY 'id' DESC" ;
            $result=$this->pdo->prepare($sql);
            $result->execute();
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
             $result_final= array_reverse($row);
            return $row;
            // return $row;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
    
}
