<?php
session_start();

include_once(__DIR__ . '/../../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];





    // Consulta SQL
    $query = "SELECT u.idusuario, u.nombre, u.password, r.nombre AS rol 
              FROM usuario u 
              JOIN rol r ON u.idrol = r.idrol 
              WHERE u.email = ? AND u.estado = 1";
    
    // Preparar la consulta
    if ($stmt = $conn->prepare($query)) {
        // Vincular los parámetros
        $stmt->bind_param("s", $email);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user && md5($password) == $user['password']) {
            // Contraseña correcta, guardar datos en sesión
            session_start();
            $_SESSION['idusuario'] = $user['idusuario'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

          
            if ($user['rol'] === 'admin') {


                header("Location: admin_dashboard.php");
            
            
            } elseif ($user['rol'] === 'cliente') {
            
                header("Location: cliente_dashboard.php");
            
            
            } else {
            
                header("Location: user_dashboard.php");
            
            }
            exit();
        } else {

                $_SESSION['error'] = "Correo o contraseña incorrectos";
                header("Location: /MiTiendita/app/public/");
                exit();
                
        }
    } else {
        $_SESSION['error'] = "Error al preparar la consulta.";
        header("Location: /MiTiendita/app/public/");
        exit();
    }
}
?>
