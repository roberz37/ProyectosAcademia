<?php

session_start();

?>
<html><head><title>Medias Para Todos</title></head><body>
    <h1>VendoMedias.com</h1>
    <p>Ingrese con su cuenta para obtener las mejores ofertas.</p>
<form action="login.php" method="POST">
    Usuario: <input type="text" name='usuario'><br>
    Clave: <input type="password" name='clave'><br><br>
    <input type="submit" value="Entrar">
</form>
<?php

?>
</body>
</html>