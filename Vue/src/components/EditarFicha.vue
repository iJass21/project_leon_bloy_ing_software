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
        <a  href="/AdminPanel">Inicio</a>
        <a href="/CrearNino">Integrar Niño</a>
        <a href="/AdultCreatePanel">Crear Adultos</a>
        <a href="/PerfilesPanel">Perfiles</a>
        <a href="/CrearTrabajadorPanel">Crear Trabajador</a>
      </nav>
      <a href="/" class="donate-link">Cerrar Sesion</a>
    </div>
  </header>
        <div class="d-flex justify-content-center mt-5">
            <form @submit.prevent="EditFicha()" class="my-form">
                <div class="container">
                    <div class="row input-container">
                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <textarea required v-model="ficha.objetivos"></textarea>
                                <label>Observaciones</label>
                            </div>
                        </div>


                        <div class="col-xs-12" id="ButtonNino">
                            <button type="submit" class="btn justify-content-center btn-primary mt-4">Editar Ficha</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</template>




<script>
import axios from 'axios'
export default {
    // ...
    name: 'EditarFicha',
    data() {
        return {
            ficha: {
                objetivos: '',
            }
        }
    },
    methods: {
        EditFicha() {
            let result = axios.patch('http://127.0.0.1:8000/api/update-fichas/' + this.$route.params.id, {
                objetivos: this.objetivos
            });
            console.log(result);
            this.$router.push('/AdminPanel')
        },
        RedirigirAdminPanel() {
            this.$router.push('/AdminPanel')
        }
    }
}

</script>
<style>
@import '../assets/css/ingresinino.css';
</style>