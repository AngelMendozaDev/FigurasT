<?php
require_once "control.php";
class Cotiza extends Control
{

    public function cotizacion($object)
    {
        $con = Control::conexion();
        $med = $object['alto'] . "-" . $object['ancho'] . "-" . $object['largo'];
        $uso = isset($object['otro']) ? $object['otro'] : $object['uso'];
        $comment = isset($object['comentario']) ? $object['comentario'] : "---";
        $price = "0";

        $query = $con->prepare("CALL newPresupuesto(?,?,?,?,?,?,?,?,?)");

        $query->bind_param(
            'sssssssss',
            $object['sol'],
            $med,
            $object['posicion'],
            $uso,
            $object['acabado'],
            $object['pintura'],
            $object['pz'],
            $price,
            $comment
        );

        $res = $query->execute();

        $query->close();

        return self::getLastID();
    }

    public function getLastID()
    {
        $con = Control::conexion();

        $query = $con->prepare("SELECT presupuestos.folio_pres AS ID FROM presupuestos ORDER BY presupuestos.folio_pres DESC LIMIT 1");
        $query->execute();

        $row = $query->get_result();
        $id = 'ERR';

        if ($row->num_rows > 0) {
            $row = $row->fetch_assoc();
            $id = $row['ID'];
        }

        return $id;
    }


    public function getCotizaciones($user)
    {
        $con = Control::conexion();
        $query = $con->prepare("SELECT p.folio_pres, p.fecha_pres, p.piezas, p.precio FROM presupuestos AS p WHERE p.solicito = ? ORDER BY p.fecha_pres DESC");
        $query->bind_param('s', $user);
        $query->execute();
        $res = $query->get_result();

        $query->close();

        return $res;
    }

    public function getCotizacin($ID)
    {
        $con = Control::conexion();
        $query = $con->prepare("SELECT p.*, u.nombre, u.app, u.apm FROM presupuestos AS p INNER JOIN usuarios AS u ON u.ID_user = p.solicito WHERE p.folio_pres = ?");
        $query->bind_param('s', $ID);
        $query->execute();
        $res = $query->get_result();

        $query->close();

        return $res;
    }

    public function getCotiza($estado)
    {
        $con = Control::conexion();
        if ($estado == 0) {
            $query = $con->prepare("SELECT p.*, u.nombre, u.app, u.apm, u.telefono, u.mail FROM presupuestos AS p INNER JOIN usuarios AS u ON u.ID_user = p.solicito WHERE p.precio = 0 ORDER BY p.fecha_pres ASC");
        }
        if ($estado == 0) {
            $query = $con->prepare("SELECT p.*, u.nombre, u.app, u.apm, u.telefono, u.mail FROM presupuestos AS p INNER JOIN usuarios AS u ON u.ID_user = p.solicito WHERE p.precio = 0 ORDER BY p.fecha_pres ASC");
        }
        $query->execute();
        $res = $query->get_result();

        $query->close();

        return $res;
    }

    public function setPrice($price, $pres, $fecha){
        $con = Control::conexion();
        $query = $con->prepare("CALL setPrice(?,?,?)");
        $query->bind_param('sss', $pres, $fecha, $price);
        $response = $query->execute();

        $query->close();

        return $response;
    }
}
