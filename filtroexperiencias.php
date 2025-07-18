<?php

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

switch ($filtro) {
    case 'mejor_valoracion':
        $sql = "SELECT * FROM experiencias ORDER BY valoracion DESC, fecha DESC";
        break;
    case 'mas_critica':
        $sql = "SELECT * FROM experiencias ORDER BY valoracion ASC, fecha DESC";
        break;
    case 'mas_antigua':
        $sql = "SELECT * FROM experiencias ORDER BY fecha ASC";
        break;    
    case 'mas_reciente':
        $sql = "SELECT * FROM experiencias ORDER BY fecha DESC";
        break;
    default:
        $sql = "SELECT * FROM experiencias ORDER BY fecha DESC";
        break;
}

?>