<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");
?>
    <div id="principal">
        <h1>Ultimas publicaciones</h1>

        <?php foreach ($this->publicaciones as $p): ?>
            <article>
                <a href="publicacion.php?titulo=<?=$p['titulo']?>">
                    <h2><?=$p['titulo']?></h2>
                    <span class="fecha"><?=$p['fecha']?> | <?=$p['nombre']?></span>
                    <p><?=$p['descripcion']?></p>
                </a>
            </article>
        <?php endforeach;?>



        <div id="ver-todas">
            <a href="#">Ver todas</a>
        </div>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");

