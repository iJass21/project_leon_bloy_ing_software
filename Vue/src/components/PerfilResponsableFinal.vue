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
    <HeaderComponent/>
    <section class="section about-section gray-bg" id="about">
      <div class="container" style="padding-right: 200px;">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-lg-9" id="Profile">
            <div class="about-text go-to">
              <a v-for="adulto in adultos" :key="adulto.id">
                <h3 class="dark-color">{{ adulto.name }} {{ adulto.lastname }}</h3>
                <p id="MARK"><strong>Observaciones:</strong> {{ adulto.obs }}</p>
                <p id="MARK"><strong>Objetivos:</strong> {{ adulto.objetivos }}</p>
                <div class="row about-list" id="INFO">
                  <div class="col-md-6">
                    <div class="media">
                      <label class="nowrap-label">Rut</label>
                      <p>{{ adulto.rut }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Vinculo</label>
                      <p>{{ adulto.vinculo }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Direccion</label>
                      <p>{{ adulto.direccion }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Telefono</label>
                      <p>{{ adulto.phone }}</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="media">
                      <label class="nowrap-label">Correo</label>
                      <p>{{ adulto.email }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Rubro</label>
                      <p>{{ adulto.rubro }}</p>
                    </div>
                  </div>
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
import HeaderComponent from './header.vue';

export default {
  // ...
  name: 'PerfilResponsableFinal',
  components:{
    HeaderComponent
  },
  mounted() {
    this.getNinoID();
  },
  data() {
    return {
      adultos: [],
      children: {},
    }
  },
  methods: {
    // Resto del código omitido por brevedad
    getNinoID() {
      axios.get('http://127.0.0.1:8000/api/adultos/' + this.$route.params.id)
        .then(res => {
          this.adultos = res.data;
          console.log(this.adultos);
        });
    },
  }
};
</script>

<style>
@import '../assets/css/PerfilNino.css';
</style>