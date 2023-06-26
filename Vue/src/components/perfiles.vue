<template>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hola mundo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>

    <body>
        <header>
            <div class="inner">
                <div class="logo"><img src="../assets/fundacion.png"></div>
                <div class="burger"></div>
                <nav>
                    <a href="/AdminPanel">Inicio</a>
                    <a href="/CrearNino">Integrar Niño</a>
                    <a href="/AdultCreatePanel">Crear Adultos</a>
                    <a href="/PerfilesPanel">Perfiles</a>
                    <a href="/CrearTrabajadorPanel">Crear Trabajador</a>
                </nav>
                <a href="/" class="donate-link">Cerrar Sesion</a>
            </div>
        </header>
        <div id="cards" style="display: flex;">
            <div id="cartaEspecifica" class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover"
                style="width: 360px; overflow: hidden; border-radius: 1px;">
                <img src="../assets/niños.jpg"
                    alt="Man with backpack" class="d-block w-full">

                <div class="px-2 py-2">
                    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                        Niños
                    </p>

                    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                        Listado de todos los niños
                    </h1>
                    <p class="mb-1">
                        Aqui se observaran los niños que se encuentran dentro del sistema, además este permite ingresar a su perfil, ficha y editar esta misma.
                    </p>
                </div>

                <a href="/PerfilNinoPanel"
                    class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
                    Ver Lista
                </a>
            </div>
            <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover"
                style="width: 360px; overflow: hidden; border-radius: 1px;">
                <img src="../assets/adultos.jpg"
                    alt="Man with backpack" class="d-block w-full">

                <div class="px-2 py-2">
                    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                        Adultos Responsables
                    </p>

                    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                        Listado de todos los adultos responsables
                    </h1>

                    <p class="mb-1">
                        Cada adulto que aparece aqui hace referencia a que tiene un niño del cual es responsable.
                    </p>

                </div>

                <a href="/PerfilResponsablePanel"
                    class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
                    Ver Lista
                </a>
            </div>
            <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover"
                style="width: 360px; overflow: hidden; border-radius: 1px;">
                <img src="../assets/trabajadores.jpg"
                    alt="Man with backpack" class="d-block w-full">

                <div class="px-2 py-2">
                    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                        Trabajadores
                    </p>

                    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                        Lista de todos los trabajadores
                    </h1>

                    <p class="mb-1">
                        Se puede observar todos los trabajadores que se encuentren dentro del sistema.
                    </p>

                </div>

                <a href="/PerfilNinoPanel"
                    class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
                    Ver Lista
                </a>
            </div>
        </div>

    </body>
</template>




<script>
export default {
    name: 'PerfilesPanel'
}
</script>

<style>@import '../assets/css/admincss.css';
@import '../assets/css/cartasperfiles.css';</style>