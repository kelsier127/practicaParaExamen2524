<?php

include("components/includes/nav.php");

?>


<h4>Estas en Index.php </h4><br>


<form action="login.proc.php">

    Nombre de usuario: <br><input value="john@mail.com" type="text" name="username" id="username"><br>
    Contraseña: <br><input value="changeme" type="text" name="password" id="password"><br>

    <input type="submit" value="Enviar">
    
</form>



<?php

include("components/includes/footer.html");

?>