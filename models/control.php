<?php
class Control{
    public function conexion(){
        $host = "localhost";
        $user = "root";
        $pass = "LuisA5841@&";
        $db = "figuras";

        $conexion = mysqli_connect($host, $user, $pass, $db);
        if(!$conexion)
            return null;
        return $conexion;
    }

    public function newUser($object){
        $phone = "----";
        $conexion = self::conexion();
        if($conexion != null){
            if(self::existUser($_POST['mail']) == true)
                return -1;
            $query = $conexion->prepare("CALL newClient(?,?,?,?,?,?)");
            $query->bind_param("ssssss", $object['name'], $object['app'], $object['apm'], $phone, $object['mail'], $object['pass']);
            $res = $query->execute();
            
            $query->close();

            return$res;
        }
    }

    public function existUser($mail){
        $conexion = self::conexion();
        $query = $conexion->prepare("SELECT id_user from users WHERE mail = ?");
        $query->bind_param('s',$mail);
        $query->execute();
        $res = $query->get_result();
        if($res->num_rows > 0){
            return true;
        }
        return false;
    }

    public function login($user, $pass){
        $conexion = self::conexion();
        $query = $conexion->prepare("SELECT p.id_person, p.nombre, p.app, u.tipo FROM person AS p INNER JOIN users AS u ON u.id_user = p.id_person WHERE u.mail = ? AND u.pass = ?");
        $query->bind_param("ss",$user, $pass);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        if($res->num_rows > 0){
            $res = $res->fetch_assoc();
            $_SESSION['ID'] = $res['id_person'];
            $_SESSION['name'] = $res['nombre']." ".$res['app'];
            return 1;
        }
        return 0;
    }
}
?>