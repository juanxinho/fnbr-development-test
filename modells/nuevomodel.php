<?php
class NuevoModel extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try {
            $query = $this->db->connect()->prepare("INSERT INTO alumnos VALUES(:matricula, :nombre, :apellido)");
            if($query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']])){
                return true;
            }else {
                return false;
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
        
    }
    
}
?>