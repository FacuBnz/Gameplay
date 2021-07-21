<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

?>
    <div id="principal">

        <h1>Modificar publicación</h1>
        
        <?php if(isset($this->errores)) : ?>
            <div class="alerta alerta-error">
                <?=$this->errores->getMessage()?>
            </div>
        <?php endif;?>
        
        <form action="" method="POST">

        <label for="titulo">Titulo : </label>
        <input type="text" name="titulo" id="titulo" value="<?=isset($this->publicacion['titulo']) ? $this->publicacion['titulo'] : ""?>" required>
        <input type="hidden" name="titulo_anti" value="<?=isset($this->publicacion['titulo']) ? $this->publicacion['titulo'] : ""?>">

        <label for="categoria">Categoria :</label>
        <select name="categoria" id="categoria">
            <?php foreach($this->categorias as $c) : ?>
                <?php if($c['id'] == $this->publicacion['categoria_id']) :?>
                        <option value="<?=$c['id']?>" selected><?=$c['nombre']?></option>
                    
                    <?php else : ?>
                        <option value="<?=$c['id']?>"><?=$c['nombre']?></option>
                <?php endif; ?>
            <?php endforeach;?>
        </select>

        <label for="descripcion">Descripcion :</label>
        <textarea name="descripcion" id="descripcion" rows="10" cols="100" required><?=isset($this->publicacion['descripcion']) ? $this->publicacion['descripcion'] : ""?></textarea>

        <input type="submit" name="modificar" value="Editar">

        </form>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");