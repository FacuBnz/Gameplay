<main id="contenedor">
    <!-- sidebar -->
    <aside id="sidebar">

        <!-- Login -->

        <?php if(isset($this->user)) :?>
            <div id="login" class="bloque">
            <h3>Bienvenido/a <?=$this->user["nombre"]?></h3>
            <a href="nueva-publicacion.php" class="boton boton-verde">Crear publicación</a>
            <a href="nueva-categoria.php" class="boton boton">Crear categoria</a>
            <a href="mis-publicaciones.php" class="boton boton-turquesa">Mis publicaciones</a>
            <a href="#" class="boton boton-naranja">Modificar datos</a>
            <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
        </div>
        <?php else :?>
            <div id="login" class="bloque">
                <h3>Identificate</h3>
                <?php if(isset($this->errores) && $this->errores->getTrace()[0]['function'] == 'getUser') : ?>
                            <div class="alerta alerta-error"><?=$this->errores->getMessage()?></div>
                    <?php endif ;?>
                <form action="index.php" method="POST">
                    <label for="emaili">Email</label>
                    <input type="email" name="emaili" id="emaili">

                    <label for="passwordi">Contraseña</label>
                    <input type="password" name="passwordi" id="passwordi">
                    <input type="submit" name="entrar" value="Entrar">
                </form>
            </div>

            <!-- Registro -->

            <div id="login" class="bloque">
                <h3>Registrate</h3>
                <?php if(isset($this->completo)) :?>
                    <div class="alerta alerta-exito">
                        <?=$this->completo?>
                    </div>
                <?php endif ;?>

                <form action="index.php" method="POST">
                    <?php if(isset($this->errores) && $this->errores->getTrace()[0]['function'] == 'create') : ?>
                            <div class="alerta alerta-error"><?=$this->errores->getMessage()?></div>
                    <?php endif ;?>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                    

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido">


                    <label for="emailr">Email</label>
                    <input type="email" name="emailr" id="emailr">


                    <label for="passwordr">Contraseña</label>
                    <input type="password" name="passwordr" id="passwordr">

                    <input type="submit" name="registro" value="Registrar">
                </form>
            </div>
        <?php endif ;?>
        
        

    </aside>