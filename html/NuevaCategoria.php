<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

?>
    <div id="principal">

        <h1>Crear Categoria</h1>

        <?php if(isset($this->completo)) :?>
            <div class="alerta alerta-exito">
                <?=$this->completo?>
            </div>
        <?php elseif(isset($this->errores)) : ?>
            <div class="alerta alerta-error">
                <?=$this->errores->getMessage()?>
            </div>
        <?php endif;?>

        <form action="nueva-categoria" method="post">
            <label for="nombre">Nombre de categoria :</label>
            <input type="text" name="nombre" id="nombre">
            <input type="submit" name="nueva_categoria" value="Crear">
        </form>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");
