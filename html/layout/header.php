<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gameplay</title>
    <link rel="stylesheet" href="/gameplay/static/css/style.css">
</head>

<body>
    <!-- header -->

    <header id="cabecera">
        <!--logo-->
        <div id="logo">
            <a href="index">Gameplay</a>
        </div>

        <!-- menu -->
        <nav id="menu">
            <ul>
                <?php foreach($this->categorias as $c) {?>
                    <li><a href="categoria?id=<?=$c['id']?>"><?=$c['nombre']?></a></li>
                <?php }?>
            </ul>
        </nav>

        <div class="clearfix"></div>
    </header>