<?php
$conx = new mysqli("test-mysql", "root","password", "base");
if ($conx->connect_errno){
    echo "ERROR DE CONEXION";
}
$conx->set_charset("utf8mb4");
?>