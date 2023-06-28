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
    <HeaderComponent />
    <section class="section about-section gray-bg" id="about">
      <div class="container" style="padding-right: 200px;">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-lg-9" id="Profile">
            <div class="about-text go-to">
              <a v-for="trabajador in trabajadores" :key="trabajador.id">
                <div class="edicion-lapiz">
                  <h3 class="dark-color">{{ trabajador.name }}</h3>
                </div>
                <p id="MARK"><strong>Rol:</strong> {{ trabajador.cargo }}</p>
                <div class="row about-list" id="INFO">
                  <div class="col-md-6">
                    <div class="media">
                      <label class="nowrap-label">Rut</label>
                      <p>{{ trabajador.rut }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Teléfono</label>
                      <p>{{ trabajador.phone }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Direccion</label>
                      <p>{{ trabajador.direccion }}</p>
                    </div>
                  </div>
                </div>
                <!-- <div>
                  <button @click="redirectToPerfilTrabajador(trabajador.id)" class="button-32" role="button">Ver Ficha</button>
                </div> -->
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
  name: 'PerfilTrabajadoresFinal',
  components: {
    HeaderComponent
  },
  mounted() {
    this.getTrabajadorID();
  },
  data() {
    return {
      trabajadores: [],
      directora: {
        direct: '',
      }
    }
  },
  methods: {
    getTrabajadorID() {
      axios.get('http://127.0.0.1:8000/api/trabajador/' + this.$route.params.id)
        .then(res => {
          this.trabajadores = res.data;
          console.log(this.trabajadores);
        });
    },
    redirectToPerfilTrabajador(trabajadorID) {
      this.$router.push({ name: 'TrabajadorID', params: { id: trabajadorID } });
    },
    getUsario() {
      this.directora.direct = localStorage.getItem("directora");
      console.log(this.directora.direct);
      return (this.directora.direct);
    },
  }
};
</script>
  
<style>
@import '../assets/css/PerfilNino.css';
</style>