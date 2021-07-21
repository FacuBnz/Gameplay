<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

?>
    <div id="principal">
        <?php if(is_array($this->publicacion)) : ?>
            <h1><?=$this->publicacion['titulo']?></h1>
            <article>
                <span class="fecha"><?=$this->publicacion['fecha']?> | <?=$this->publicacion['nombre']?></span>
                <p><?=preg_replace("/[\r\n|\n|\r]+/", "<br>", $this->publicacion['descripcion'])?></p>
            </article>
        <?php elseif(is_null($this->publicacion)) :?>
            <h1>No se encontró la publicación</h1>
        <?php endif;?>
        
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");
