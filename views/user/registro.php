<h1>Registro</h1>

<?php
if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'){
    echo "<strong>Registro completado</strong>";
} elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'){
    echo "<strong>Registro fallido</strong>";
}
// Eliminamos sesion de registro
Utils::deleteSession('register');

?>

<form action="<?=domain?>userController/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="pass">Password</label>
    <input type="password" name="pass" required>
    
    <input type="submit" name="Registrarse">
</form>