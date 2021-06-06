<main id="contenedor">
    <!-- sidebar -->
    <aside id="sidebar">
        <!-- Si el usuario está logueado -->

        <!--
        <div id="login" class="bloque">
          <h3>Bienvenido facu</h3>
          <a href="#" class="boton boton-verde">Crear publicación</a>
          <a href="#" class="boton boton">Crear categoria</a>
          <a href="#" class="boton boton-turquesa">Mis publicaciones</a>
          <a href="#" class="boton boton-naranja">Modificar datos</a>
          <a href="#" class="boton boton-rojo">Cerrar sesion</a>
        </div>
        -->
        <!-- Login -->
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <form action="#" method="POST">
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
            <form action="#" method="POST">
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

    </aside>