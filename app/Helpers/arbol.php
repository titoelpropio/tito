<?php
use App\cuenta;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
/**
 * Description of arbol
 *
 * @author MODESTO
 */
class arbol {
 private $_elements = array();
 public function get() {
       $empresa=DB::select("select users.id_empresa from users where users.id=".Auth::user()->id);
       $query= DB::select("select*from cuenta where cuenta.id_empresa=".$empresa[0]->id_empresa);
     //$query= DB::select("select*from cuenta ");
        $this->_elements["masters"] = $this->_elements["childrens"] = array();
       
            foreach ($query as $element) {
                if ($element->id_padre== 0) {
                    array_push($this->_elements["masters"], $element);
                } else {
                    array_push($this->_elements["childrens"], $element);
                }
            
           
        }
        return $this->_elements;
    }
      public static function nested($rows = array(), $parent_id = 0) {
//echo json_encode($rows);
        $html = "";
        
        if (!empty($rows)) {
            $html.="<ul>";
            foreach ($rows as $row) {
                if ($row->id_padre == $parent_id) {
                    $html.="<li style='margin:5px 0px'>";
                    $html.="  <span><i class='glyphicon glyphicon-folder-open'></i></span>";
                    $html.="<a href='#' data-status='{$row->hijo}' style='margin: 5px 6px' class='btn btn-warning btn-xs btn-folder'><i class=''></i>";

                    if ($row->hijo===1) {
                        $html.="<span style='color:white' class='glyphicon glyphicon-minus-sign'><b>" .$row->codigo." ". $row->nombre . "</b></span></a>";
                    } else {
                         $html.="<span style='color:white'  class='glyphicon glyphicon-plus-sign'><b>" .$row->codigo." ". $row->nombre . "</b></span></a>";
                    }
                    
                    $html.=self::nested($rows, $row->id);
                    $html.="</li>";
                }
            }
            $html.="</ul>";
        }
     return $html;
    }
     
 

     public static function validar($tipo, $texto) {
        $texto = trim($texto);
        switch ($tipo) {
            case "texto":
                $expresion = '/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i';
                if (!preg_match('/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i', $texto)) {
                    return true;
                }

                break;
            case "vacio":
                if (strlen($texto) > 0) {
                    return true;
                }
                break;
            case "entero":
                if (!is_int($texto)) {
                    return true;
                }
                break;
            case "decimal":
                /* if(is_float($texto)){
                  return true;
                  } */
                return true;
                break;
            case "texto y entero":
                $expresion = "/^[0-9a-zA-Z\.\,\s-_º()=?¿/%$@!:;{}óíáéúñÍÁÉÚÓ]+$/";
                if (!preg_match($expresion, $texto)) {
                    return true;
                }
                break;
            case "correo":
                if (!filter_var($texto, FILTER_VALIDATE_EMAIL) === false) {
                    return true;
                }
                break;
        }
        return false;
    }
}

