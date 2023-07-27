<?php
error_reporting(E_ERROR | E_WARNING);
class Control{
    public function conexion(){
        $host = "localhost";
        $user = "root";
        $pass = "LuisA5841@&";
        $db = "figuras";

        $conexion = mysqli_connect($host, $user, $pass, $db);
        if(!$conexion)
            return null;

        mysqli_set_charset($conexion,'utf8');
        return $conexion;
    }

    public function newUser($object){
        $conexion = self::conexion();
        if($conexion != null){
            if(self::existUser($_POST['mail'], $_POST['phone']) == true)
                return -1;
            $query = $conexion->prepare("CALL newClient(?,?,?,?,?,?)");
            $query->bind_param("ssssss", strtoupper($object['name']), strtoupper($object['app']), strtoupper($object['apm']), $object['phone'], $object['mail'], $object['pass']);
            $res = $query->execute();
            
            $query->close();

            return$res;
        }
    }

    public function existUser($mail, $phone){
        $conexion = self::conexion();
        $query = $conexion->prepare("SELECT usuarios.ID_user from usuarios WHERE usuarios.mail = ? OR usuarios.telefono = ?");
        $query->bind_param('ss',$mail, $phone);
        $query->execute();
        $res = $query->get_result();
        if($res->num_rows > 0){
            return true;
        }
        return false;
    }

    public function login($user, $pass){
        $conexion = self::conexion();
        $query = $conexion->prepare("SELECT usuarios.ID_user FROM usuarios WHERE usuarios.mail = ? OR usuarios.telefono = ?");
        $query->bind_param("ss",$user,$user);
        $query->execute();
        $res = $query->get_result();
        $query->close();

        if($res->num_rows > 0){
            $res = $res->fetch_assoc();
            $user = $res['ID_user'];
            $query = $conexion->prepare("SELECT usuarios.ID_user, usuarios.nombre, usuarios.app, usuarios.tipo FROM usuarios WHERE usuarios.ID_user = ? AND usuarios.pass = ?");
            $query->bind_param("ss",$user, $pass);
            $query->execute();
            $res = $query->get_result();
            $query->close();
            if($res->num_rows > 0){
                $res = $res->fetch_assoc();
                $_SESSION['ID'] = $res['ID_user'];
                $_SESSION['name'] = $res['nombre']." ".$res['app'];
                return $res['tipo'];
            }
        }
        return 0;
    }
}
?>