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
        <section class="section about-section gray-bg" id="about">
            <div class="container" style="padding-right: 200px;">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-9" id="Profile">
                        <div class="about-text go-to">
                            <a v-for="ficha in fichas" :key="ficha.id">
                                <h3 class="dark-color"><strong>Objetivos:</strong>{{ ficha.objetivos }}</h3>
                                <p id="MARK"><strong>Descripcion:</strong> {{ ficha.description }}</p>
                                <div class="row about-list" id="INFO">
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>Fecha De Ingreso</label>
                                            <p>{{ ficha.fec_ingreso }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="media">
                                            <label>Fecha De Salida</label>
                                            <p>{{ ficha.fec_salida }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button @click="redirectToEditFicha()" class="button-32" role="button">Editar Ficha</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</template>



<script>
import axios from 'axios';
export default {
    // ...
    name: 'FichaNino',

    mounted() {
        this.getNinoID();
    },

    data() {
        return {
            fichas: [],
        }
    },

    methods: {
        getNinoID() {
            axios.get('http://127.0.0.1:8000/api/fichas/' + this.$route.params.id)
                .then(res => {
                    this.fichas = res.data;
                    console.log(this.fichas);
                });
        },
        redirectToEditFicha() {
            this.$router.push({ name: 'EditarFicha', params: { id: this.$route.params.id } });
        },
    }
}

</script>

<style>
@import '../assets/css/FichaNino.css';
</style>