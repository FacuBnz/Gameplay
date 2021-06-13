<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");

$titulo = $this->publicacion['titulo'];
$fecha = $this->publicacion['fecha'];
$catego = $this->publicacion['nombre'];
$desc = str_replace(PHP_EOL, '<p>', $this->publicacion['descripcion']);
?>
    <div id="principal">
        <h1><?=$titulo?></h1>

        <article>
            <span class="fecha"><?=$fecha?> | <?=$catego?></span>
            <p><?=$desc?></p>
        </article>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");
