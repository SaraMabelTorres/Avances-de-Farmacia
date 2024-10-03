<?php
session_start(); // Iniciar la sesión

// Destruir todas las variables de sesión
$_SESSION = [];

// Si deseas destruir la sesión también, usa el siguiente código
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o al index
header("Location: login.php");
exit;
?>
