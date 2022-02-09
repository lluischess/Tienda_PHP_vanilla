<h1>Registro</h1>

<form action="index.php?controller=userController&action=save" method="post">
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