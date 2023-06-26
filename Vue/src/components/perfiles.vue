<template>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hola mundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <header>
    <div class="inner">
      <div class="logo"><img src="../assets/fundacion.png"></div>
      <div class="burger"></div>
      <nav>
        <a  href="/AdminPanel">Inicio</a>
        <a href="/CrearNino">Integrar Niño</a>
        <a href="/AdultCreatePanel">Crear Adultos</a>
        <a href="/PerfilesPanel">Perfiles</a>
        <a href="/CrearTrabajador">Crear trabajador</a>
      </nav>
      <a href="/" class="donate-link">Cerrar Sesion</a>
    </div>
  </header>
    <div class="d-flex justify-content-center py-3 mt-5">
        <ul class="nav">
            <li class="nav-item">
                <a href="/PerfilTrabajadoresPanel" class="nav-link">Trabajadores</a>
            </li>
            <li class="nav-item">
                <router-link to="/PerfilResponsablePanel" class="nav-link">Responsables</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/PerfilNinoPanel" class="nav-link">Niños</router-link>
            </li>
        </ul>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: 200px;">
        <div class="col-lg-6 col-md-8 mx-auto text-center">
            <h1 class="fw-light">Porfavor haga click en los perfiles que desee ver.</h1>
            <p class="lead text-body-secondary">Si no aparece el perfil que usted desee, favor revisar si está creado.</p>
        </div>
    </div>
</body>
</template>




<script>
    export default{
        name: 'PerfilesPanel'
    }
</script>

<style>
    @import '../assets/css/admincss.css';
</style>