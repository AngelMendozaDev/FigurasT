<?php
    require_once "control.php";

    class User extends Control{
        public function getInfo($user){
            $con = Control::conexion();
            if($con != null){
                $query = $con->prepare("SELECT * FROM usuarios WHERE usuarios.ID_user = ?");
                $query->bind_param('s',$user);
                $query->execute();
                $res = $query->get_result();

                $query->close();
                
                if($res->num_rows > 0){
                    return $res;
                }
                return -1;
            }
            return -2;
        }


        public function getDomicilio($user){
            $con = Control::conexion();
            if($con != null){
                $query = $con->prepare("SELECT d.folio_domicilio, d.calle, c.*, d.referencia FROM domicilio AS d INNER JOIN cp_mun AS c ON c.clave = d.cp WHERE d.fk_user = ?");
                $query->bind_param('s',$user);
                $query->execute();
                $res = $query->get_result();

                $query->close();
                
                if($res->num_rows > 0){
                    return $res;
                }
                return -1;
            }
            return -2;
        }

        public function getCP($cp){
            $con = Control::conexion();
            if($con != null){
                $query = $con->prepare("SELECT * FROM cp_mun where cp_mun.cp = ?");
                $query->bind_param('s',$cp);
                $query->execute();
                $res = $query->get_result();

                $query->close();
                
                if($res->num_rows > 0){
                    while($item = $res->fetch_assoc()){
                        $json[] = array(
                            "clave" => $item['clave'],
                            "cp" => $item['cp'],
                            "colonia" => $item['colonia'],
                            "municipio" => $item['municipio'],
                            "estado" => $item['estado']
                        );
                    }
                    return $json;
                }
                return -1;
            }
            return -2;
        }

        public function newDomicilio($object){
            $con = Control::conexion();
            if($con != null){
                $calle = $object['calle']. " ". $object['number'];
                $query = $con->prepare("CALL newDomicilio(?,?,?,?)");
                $query->bind_param('ssss',$object['user'],$calle,$object['colonia'],$object['referencia']);
                $res = $query->execute();

                $query->close();

                return $res;
            }
            return -1;
        }

    }

?>