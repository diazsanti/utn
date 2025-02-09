<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../includes/db.php");
require_once("../../controllers/validar_user.php");
include("../../menu.php");

$stmt = $conx->prepare("SELECT * FROM usuarios");
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Listado de Usuarios</title>
</head>
<body>
<main class="container mt-4">
    <div class="mb-3">
        <a class="btn btn-primary" href="formulario.php">
            <i style="color:white" class='bx bxs-folder-plus bx-md'></i> Agregar Usuario
        </a>
    </div>
    <table class="table table-striped">
        <thead>    
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Password</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $resultado->fetch_object()) { ?>
            <tr>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->email ?></td>
                <td><?php echo str_repeat('*', 10); ?></td>
                <td>
                    <a href="formulario.php?operacion=EDIT&id=<?php echo $fila->id ?>" class="text-success me-2">
                        <i class='bx bx-edit bx-md'></i>
                    </a>
                </td>
                <td>
                    <a href="../../controllers/usuarios.php?operacion=DELETE&id=<?php echo $fila->id ?>" class="text-danger">
                        <i class='bx bxs-trash bx-md'></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
