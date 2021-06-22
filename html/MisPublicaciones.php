<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");
?>
    <div id="principal">
        <h1>Mis publicaciones</h1>

        <?php if(isset($this->completo)) :?>
            <div class="alerta alerta-exito">
                <?=$this->completo?>
            </div>
        <?php elseif(isset($this->errores)) : ?>
            <div class="alerta alerta-error">
                <?=$this->errores->getMessage()?>
            </div>
        <?php endif;?>

        <?php foreach ($this->publicaciones as $p): ?>
            
            <?php $desc = str_replace(PHP_EOL, '<p>', substr($p["descripcion"], 0,200)); ?>
            <article>
                <a href="publicacion.php?titulo=<?=$p['titulo']?>">
                    <h2><?=$p['titulo']?></h2>
                    <span class="fecha"><?=$p['fecha']?> | <?=$p['nombre']?></span>
                    <p><?=$desc?>...</p>
                </a>
            </article>
            <a href="modificar-publicacion.php?titulo=<?=$p['titulo']?>" class="boton boton-naranja\">Editar</a>
            <a href="borrar-publicacion.php?titulo=<?=$p['titulo']?>" class="boton boton-rojo">Eliminar</a>
        <?php endforeach;?>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");