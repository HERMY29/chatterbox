<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'conexion.php';

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['nom_usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $descripcion = $_POST['descripcion'];

    // Si se actualiza la contraseña, se hashea, si no, se mantiene la anterior
    if (!empty($contrasena)) {
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "UPDATE Usuarios SET nombre = ?, nom_usuario = ?, correo = ?, contrasena = ?, descripcion = ? WHERE id_Usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nombre, $usuario, $correo, $contrasena_hash, $descripcion, $usuario_id);
    } else {
        $sql = "UPDATE Usuarios SET nombre = ?, nom_usuario = ?, correo = ?, descripcion = ? WHERE id_Usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $usuario, $correo, $descripcion, $usuario_id);
    }

    if ($stmt->execute()) {
        header("Location: perfil.php"); // Redirige al perfil actualizado
        exit;
    } else {
        echo "<script>alert('Error al actualizar perfil');</script>";
    }
}

$sql = "SELECT nombre, nom_usuario, correo, descripcion FROM Usuarios WHERE id_Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>

    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/EditarP.css">

    <!-- ES PARA LOS BOTONES -->
    <link rel="stylesheet" href="css/iconsreverse.css">
    <!-- BOOTSTRAMP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <link rel="icon" type="image/png" href="images/CHATTERBOX.png">

</head>

<body>

    <!-- NAVBAR -->
    <iframe src="navbar.php" class="navbar-frame"></iframe>
    <link rel="stylesheet" href="css/navbar.css">


    <!-- BODY -->
    <div class="wrapper">
        <div class="form-header">
            <div class="titles">
                <div class="title-login">Editar</div>
            </div>
        </div>

        <!-- IMAGEN DE PERFIL -->
        <div class="profile-picture-container">
            <img src="images/PorfileP.png" class="profile-picture">
        </div>

        <div class="profile-edit">

            <!-- CONTENEDOR PARA LOS BOTONES DE CAMBIO DE IMAGEN -->
            <div class="image-buttons-container">
                <input type="file" id="profile-pic-upload" class="profile-upload" accept="image/*" hidden>
                <button class="btn-change-photo" onclick="document.getElementById('profile-pic-upload').click()">Cambiar
                    Foto de Perfil</button>

                <input type="file" id="background-pic-upload" class="background-upload" accept="image/*" hidden>
                <button class="btn-change-bg" onclick="document.getElementById('background-pic-upload').click()">Cambiar
                    Imagen de Fondo</button>
            </div>

            <!-- INFORMACION DE USUARIO -->
            <form method="POST" class="form-editar-perfil">

                <!-- USUARIO -->
                <div class="input-box">
                    <input type="text" class="input-field" id="profile-username" name="nom_usuario" value="<?php echo htmlspecialchars($usuario['nom_usuario']); ?>" required>
                    <label for="profile-username" class="label">Usuario</label>
                    <i class='bx bx-user icon'></i>
                </div>

                <!-- NOMBRE -->
                <div class="input-box">
                    <input type="text" class="input-field" id="profile-fullname" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                    <label for="profile-fullname" class="label">Nombre</label>
                    <i class='bx bx-user-pin icon'></i>
                </div>

                <!-- EMAIL -->
                <div class="input-box">
                    <input type="email" class="input-field" id="profile-email" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
                    <label for="profile-email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>

                <!-- CONTRASEÑA -->
                <div class="input-box">
                    <input type="password" class="input-field" id="profile-password" name="contrasena">
                    <label for="profile-password" class="label">Contraseña</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>

                <!-- DESCRIPCIÓN -->
                <div class="input-box-big">
                    <input type="text" class="input-field" id="profile-description" name="descripcion" value="<?php echo htmlspecialchars($usuario['descripcion'] ?? ''); ?>">
                    <label for="profile-description" class="label">Descripción</label>
                    <i class='bx bx-comment-detail icon'></i>
                </div>


                <!-- BOTONES -->
                <div class="container-navbuttons">
                    <!-- GUARDAR -->
                    <button type="submit" class="Btn">
                        <div class="sign">
                            <i class="bi bi-check"></i>
                        </div>
                        <div class="text">GUARDAR</div>
                    </button>

                    <!-- CANCELAR -->
                    <button type="button" class="RedBtn" onclick="location.href='perfil.php'">
                        <div class="sign">
                            <i class="bi bi-x"></i>
                        </div>
                        <div class="text">CANCELAR</div>
                    </button>
                </div>
            </form>



        </div>

    </div>


    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; 2024 CHATTERBOX | Todos los derechos reservados.</p>
    </footer>
    <link rel="stylesheet" href="css/footer.css">

</body>

</html>