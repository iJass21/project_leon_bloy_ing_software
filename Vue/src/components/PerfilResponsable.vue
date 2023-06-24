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
      </nav>
      <a href="/" class="donate-link">Cerrar Sesion</a>
    </div>
  </header>
    <div id="app" class="list-group list-group-flush border-bottom scrollarea">
        <a v-for="responsable in responsables" :key="responsable.id" href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">{{ responsable.name }}</strong>
          <small>Ver perfil</small>
        </div>
        <div class="col-10 mb-1 small">Fecha de ingreso.</div>
      </a>
    </div>
    </body>
</template>


<script>
    import axios from 'axios';
    export default{
        name: 'PerfilResponsablePanel',
        mounted(){
            this.getResponsable();
        },
        data(){
            return {
                responsables: []
            }
        },
        methods: {
            getResponsable(){
                axios.get('http://127.0.0.1:8000/api/VerAdultos')
                .then(res => {
                    this.responsables = res.data;
                    console.log(this.responsables);
                });
            }
        }
    };
</script>


<style>
    @import '../assets/css/admincss.css';
</style>
