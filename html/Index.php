<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");
?>
    <div id="principal">
        <h1>Ultimas publicaciones</h1>

        <?php foreach ($this->publicaciones as $p): ?>
            
            <?php $desc = str_replace(PHP_EOL, '<p>', substr($p["descripcion"], 0,200)); ?>
            <article>
                <a href="publicacion-<?=$p['titulo']?>">
                    <h2><?=$p['titulo']?></h2>
                    <span class="fecha"><?=$p['fecha']?> | <?=$p['nombre']?></span>
                    <p><?=$desc?>...</p>
                </a>
            </article>
        <?php endforeach;?>

        <div id="ver-todas">
            <a href="todos">Ver todas</a>
        </div>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");

