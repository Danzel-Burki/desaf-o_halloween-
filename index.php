<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Concurso de disfraces de Halloween</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#disfraces-list">Ver Disfraces</a></li>
            <li><a href="#registro" <?php if (isset($_SESSION["username"])) echo 'style="display:none;"'; ?>>Registro</a></li>
            <li><a href="#login" <?php if (isset($_SESSION["username"])) echo 'style="display:none;"'; ?>>Iniciar Sesión</a></li>
            <li><a href="#admin">Panel de Administración</a></li>
            <?php if (isset($_SESSION["username"])): ?>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <?php
    if (isset($_GET["welcome"])) {
        echo "<p>Bienvenido, " . htmlspecialchars($_SESSION["username"]) . "!</p>";
    } elseif (isset($_GET["error"])) {
        if ($_GET["error"] == "invalid") {
            echo "<p>Credenciales incorrectas. Intente de nuevo.</p>";
        } elseif ($_GET["error"] == "usuario_existente") {
            echo "<p>El nombre de usuario ya está en uso. Intente con otro.</p>";
        }
    }
    ?>

    <header>
        <h1>Concurso de disfraces de Halloween</h1>
    </header>

    <main>
        <section id="disfraces-list" class="section">
            <h2>Lista de Disfraces</h2>
            <div class="disfraz">
                <h3>Disfraz de Boogeyman</h3>
                <p>Conviértete en el temido Boogeyman con este disfraz oscuro y aterrador. Incluye una capa larga y una máscara espeluznante. ¡Perfecto para asustar en Halloween!</p>
                <img src="imagenes/disfraz_boogeyman.jpg" width="100%">
                <button class="votar">Votar</button>
            </div>
            <hr>
            <div class="disfraz">
                <h3>Disfraz de Jason Voorhees</h3>
                <p>Disfrazate de Jason Voorhees con su emblemática máscara de hockey, camisa desgastada y machete. ¡Ideal para una noche aterradora!</p>
                <img src="imagenes/disfraz_jason_voorhees.jpg" width="100%">
                <button class="votar">Votar</button>
            </div>
        </section>


        <section id="registro" class="section" <?php if (isset($_SESSION["username"])) echo 'style="display:none;"'; ?>>
            <h2>Registro</h2>
            <form action="procesar_registro.php" method="POST">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Registrarse</button>
            </form>
        </section>

        <section id="login" class="section" <?php if (isset($_SESSION["username"])) echo 'style="display:none;"'; ?>>
            <h2>Iniciar Sesión</h2>
            <form action="procesar_login.php" method="POST">
                <label for="login-username">Nombre de Usuario:</label>
                <input type="text" id="login-username" name="login-username" required>
                
                <label for="login-password">Contraseña:</label>
                <input type="password" id="login-password" name="login-password" required>
                
                <button type="submit">Iniciar Sesión</button>
            </form>
        </section>

        <section id="admin" class="section">
            <h2>Panel de Administración</h2>
            <form action="procesar_disfraz.php" method="POST" enctype="multipart/form-data">
                <label for="disfraz-nombre">Nombre del Disfraz:</label>
                <input type="text" id="disfraz-nombre" name="disfraz-nombre" required>
                
                <label for="disfraz-descripcion">Descripción del Disfraz:</label>
                <textarea id="disfraz-descripcion" name="disfraz-descripcion" required></textarea>
                
                <label for="disfraz-foto">Foto:</label>
                <input type="file" id="disfraz-foto" name="disfraz-foto" required>

                <button type="submit">Agregar Disfraz</button>
            </form>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
