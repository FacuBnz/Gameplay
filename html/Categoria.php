<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");
?>
    <div id="principal">
        <h1><?=$this->nombreCategoria?></h1>

        <?php foreach ($this->publicaciones as $p): ?>
            <?php if ($this->nombreCategoria == $p['nombre']) :?>
                
                <?php $desc = str_replace(PHP_EOL, '<p>', substr($p["descripcion"], 0,200)); ?>
                <article>
                    <a href="publicacion.php?titulo=<?=$p['titulo']?>">
                        <h2><?=$p['titulo']?></h2>
                        <span class="fecha"><?=$p['fecha']?> | <?=$p['nombre']?></span>
                        <p><?=$desc?>...</p>
                    </a>
                </article>
            <?php endif; ?>
        <?php endforeach;?>

        <div id="ver-todas">
            <a href="#">Ver todas</a>
        </div>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");