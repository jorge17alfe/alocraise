<?php
model("information");
require helpers('validar');
class InformationController
{
    private $table_message = 'messages';

    public function __construct()
    {
        $this->model = new Information;
    }


    public function receiveMessage()
    {
        if (!empty($_POST)) {
            $alm = new Validar;
            [$group, $e, $user] = descomposeArray($_POST);
        
            foreach ($_POST[$group] as $k => $v) {
                $result1[$k] = $alm->Filtrar_datos($_POST[$group][$k]);
           
            }
            $result1["registration_date"] = date('Y-m-d H:i:s');
            $keys = array_keys($result1);
            $values = array_values($result1);
            $add = "?";
            $tokens = [];
            for ($i = 0; $i < count($keys); $i++) {
                array_push($tokens, $add);
            }
            $mkeys = "`" . implode("`,`", $keys) . "`";
            $mvalues = '"' . implode('","', $values) . '"';
            $mtokens = implode(',', $tokens);
            $table = $this->getTable($group);
      
            $result =  $this->model->insertInto($table, $mkeys, $mvalues, $mtokens);
            if ($result == TRUE) {
                if ($group == "commt") {
                    echo "Comentario publicado";
                } elseif ($group == "msg") {
                    echo "Mensaje recibido";
                }
            }
            die();
        } else {
            Page_404();
        }
    }
    public function getTable($group = null)
    {
        if ($group == 'msg') {
            $table = "messages";
            return $table;
            die;
        } elseif ($group == 'commt') {
            $table = "comments";
            return $table;
            die;
        }
        page_404();
    }

    public function getDataAll()
    {
        if (isset($_POST["number"])) {
            $result = $this->model->getData('comments', '*');
            $result_mediun = array_reverse($result);
            if ($_POST["number"] > count($result_mediun)) {
                echo json_encode(false);
                die();
            }
            for ($i = 0; $i < $_POST["number"]; $i++) {
                // unset($result_mediun[$i]["email"]);
                $result_final[] = $result_mediun[$i];
            }
            echo json_encode($result_final);
            die();
        }
        page_404();
    }
}
