<?php

include("components/includes/nav.php");

?>


<h4>Estas en Index.php </h4><br>


<form class="adminForm" action="addCategory.proc.php">
    <h3>AÑADIR CATEGORIA</h3>

    Nombre de categoria: <br><input value="newCat" type="text" name="name" id="name"><br>
    Imagen: <br><input value="https://ethic.es/wp-content/uploads/2023/03/imagen.jpg" type="text" name="img" id="img"><br>

    <input type="submit" value="Enviar">
    
</form>

<form class="adminForm"  action="updateCategory.proc.php">
    <h3>MODIFICAR CATEGORIA</h3>

    <select name="id" id="id">
        <?php
        $url = 'https://api.escuelajs.co/api/v1/categories';

        $response = file_get_contents($url);
        
        $data = json_decode($response,true);
        foreach($data as $cat){
            echo "<option value=$cat[id] >$cat[id] - $cat[name]</option>";
        }
        ?>
    </select><br>

    Nuevo nombre: <input type="text" name="name" id="name"><br>

    <input type="submit" value="Enviar">
    
</form>

<form class="adminForm"  action="deleteCategory.proc.php" method="POST">
    <h3>ELIMINAR CATEGORIA</h3>

    <select name="id" id="id">
        <?php
        $url = 'https://api.escuelajs.co/api/v1/categories';

        $response = file_get_contents($url);
        
        $data = json_decode($response,true);
        foreach($data as $cat){
            echo "<option value=$cat[id] >$cat[id] - $cat[name]</option>";
        }
        ?>
    </select>

    <input type="submit" value="Enviar">
    
</form>


<?php

include("components/includes/footer.html");

?>