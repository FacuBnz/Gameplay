<?php
include_once(__DIR__."/layout/header.php");
include_once(__DIR__."/layout/sidebar.php");
?>
    <div id="principal">
        <?php if(is_string($this->nombreCategoria)): ?>
            <h1>La categoria no es válida</h1>
        <?php else:?>
            <h1>Publicaciones de la categoria : <?=$this->nombreCategoria["nombre"]?></h1>
            
            <?php foreach ($this->publicaciones as $p): ?>
                <?php if ($this->nombreCategoria["nombre"] == $p['nombre']) :?>
                    
                    <?php $desc = str_replace(PHP_EOL, '<p>', substr($p["descripcion"], 0,200)); ?>
                        <article>
                            <a href="publicacion?titulo=<?=$p['titulo']?>">
                                <h2><?=$p['titulo']?></h2>
                                <span class="fecha"><?=$p['fecha']?> | <?=$p['nombre']?></span>
                                <p><?=$desc?>...</p>
                            </a>
                        </article>
                <?php endif; ?>
            <?php endforeach;?>
        <?php endif;?>
    </div>
</main>

<?php
include_once(__DIR__."/layout/footer.php");