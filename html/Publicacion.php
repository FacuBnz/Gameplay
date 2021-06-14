<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

if($this->publicacion){
    $titulo = $this->publicacion['titulo'];
    $fecha = $this->publicacion['fecha'];
    $catego = $this->publicacion['nombre'];
    $desc = $this->publicacion['descripcion'];
}


?>
    <div id="principal">
        <?php if($this->publicacion) : ?>
            <h1><?=$titulo?></h1>

            <article>
                <span class="fecha"><?=$fecha?> | <?=$catego?></span>
                <p><?=$desc?></p>
            </article>
        <?php else :?>
            <h1>No se ha encontrado la publicación</h1>
        <?php endif;?>
        
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");
