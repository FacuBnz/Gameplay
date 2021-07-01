<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

?>
    <div id="principal">

        <h1>Crear publicación</h1>

        <?php if(isset($this->completo)) :?>
            <div class="alerta alerta-exito">
                <?=$this->completo?>
            </div>
        <?php elseif(isset($this->errores)) : ?>
            <div class="alerta alerta-error">
                <?=$this->errores->getMessage()?>
            </div>
        <?php endif;?>
        
        <form action="" method="POST">

        <label for="titulo">Titulo : </label>
        <input type="text" name="titulo" id="titulo">

        <label for="categoria">Categoria :</label>
        <select name="categoria" id="categoria">
            <?php foreach($this->categorias as $c) : ?>
                <option value="<?=$c['id']?>"><?=$c['nombre']?></option>
            <?php endforeach;?>
        </select>

        <label for="descripcion">Descripcion :</label>
        <textarea name="descripcion" id="descripcion" rows="10" cols="100"></textarea>

        <input type="submit" name="nuevo" value="Crear">

        </form>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");
