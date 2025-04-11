<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- ES PARA LOS BOTONES -->
    <link rel="stylesheet" href="css/iconsreverse.css">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="icon" type="image/png" href="images/CHATTERBOX.png">

</head>

<body>

    <!-- NAVBAR -->
    <iframe src="navbar.php" class="navbar-frame"></iframe>
    <link rel="stylesheet" href="css/navbar.css">

    <!-- BOTÓN DE CREAR POST -->
    <button class="create-post-btn">
        <i class="bi bi-plus-lg"></i>
        <span class="create-text">CREAR POST</span>
    </button>

    <div id="overlay" class="overlay"></div>

    <!-- FORMULARIO CREAR POST -->
    <div id="create-post-form" class="create-post-container">
        <div class="form-header">
            <div class="titles">
                <div class="title-login">CREAR POST</div>
            </div>
        </div>

        <div class="post-content">
            <div class="image-preview-container">
                <img id="post-preview" src="">
            </div>

            <div class="post-inputs">
                <div class="input-box-big">
                    <textarea class="input-field" id="post-description" required></textarea>
                    <label for="post-description" class="label">Descripción</label>
                </div>

                <input type="file" id="post-image-upload" class="post-upload" accept="image/*" hidden>
                <button class="btn-change-photo" onclick="document.getElementById('post-image-upload').click()">
                    <i class="bi bi-upload"></i>
                    Subir Imagen
                </button>

                <!-- BOTONES -->
                <div class="container-navbuttons">
                    <button class="Btn" id="publish-post">
                        <div class="sign">
                            <i class="bi bi-check"></i>
                        </div>
                        <div class="text">Publicar</div>
                    </button>

                    <button class="RedBtn" id="cancel-post">
                        <div class="sign">
                            <i class="bi bi-x"></i>
                        </div>
                        <div class="text">Cancelar</div>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- PUBLICACIONES -->
    <div class="post-container">

        <div class="post">
            <div class="post-image">
                <img src="images/PUBLICACION.png">
            </div>
            <div class="post-info">
                <div class="post-owner">
                    <img src="images/PorfileP.png" class="owner-picture">
                    <span class="owner-name">Pedro Pascal</span>
                </div>
                <p class="post-description">
                    Albion Online es un MMORPG no lineal en el que escribes tu propia historia sin
                    limitarte a seguir un camino prefijado. Explora un amplio mundo abierto con cinco biomas únicos.
                    Todo cuanto
                    hagas tendrá repercusión en el mundo.
                </p>
                <div class="post-buttons">
                    <button class="like-btn"><i class="bi bi-heart"></i></button>
                    <button class="download-btn"><i class="bi bi-download"></i></button>
                </div>
            </div>
        </div>

        <div class="post">
            <div class="post-image">
                <img src="images/PUBLICACION.png">
            </div>
            <div class="post-info">
                <div class="post-owner">
                    <img src="images/PorfileP.png" class="owner-picture">
                    <span class="owner-name">Pedro Pascal</span>
                </div>
                <p class="post-description">
                    Albion Online es un MMORPG no lineal en el que escribes tu propia historia sin
                    limitarte a seguir un camino prefijado. Explora un amplio mundo abierto con cinco biomas únicos.
                    Todo cuanto
                    hagas tendrá repercusión en el mundo.
                </p>
                <div class="post-buttons">
                    <button class="like-btn"><i class="bi bi-heart"></i></button>
                    <button class="download-btn"><i class="bi bi-download"></i></button>
                </div>
            </div>
        </div>

        <div class="post">
            <div class="post-image">
                <img src="images/PUBLICACION.png">
            </div>
            <div class="post-info">
                <div class="post-owner">
                    <img src="images/PorfileP.png" class="owner-picture">
                    <span class="owner-name">Pedro Pascal</span>
                </div>
                <p class="post-description">
                    Albion Online es un MMORPG no lineal en el que escribes tu propia historia sin
                    limitarte a seguir un camino prefijado. Explora un amplio mundo abierto con cinco biomas únicos.
                    Todo cuanto
                    hagas tendrá repercusión en el mundo.
                </p>
                <div class="post-buttons">
                    <button class="like-btn"><i class="bi bi-heart"></i></button>
                    <button class="download-btn"><i class="bi bi-download"></i></button>
                </div>
            </div>
        </div>


        <div class="post">
            <div class="post-image">
                <img src="images/PUBLICACION.png">
            </div>
            <div class="post-info">
                <div class="post-owner">
                    <img src="images/PorfileP.png" class="owner-picture">
                    <span class="owner-name">Pedro Pascal</span>
                </div>
                <p class="post-description">
                    Albion Online es un MMORPG no lineal en el que escribes tu propia historia sin
                    limitarte a seguir un camino prefijado. Explora un amplio mundo abierto con cinco biomas únicos.
                    Todo cuanto
                    hagas tendrá repercusión en el mundo.
                </p>
                <div class="post-buttons">
                    <button class="like-btn"><i class="bi bi-heart"></i></button>
                    <button class="download-btn"><i class="bi bi-download"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/dashboard.js"></script>

    <!-- FOOTER -->
    <footer class="footer">
        <p>&copy; 2024 CHATTERBOX | Todos los derechos reservados.</p>
    </footer>
    <link rel="stylesheet" href="css/footer.css">

</body>

</html>