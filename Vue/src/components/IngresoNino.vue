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
    <div class="d-flex justify-content-center mt-5">
      <form @submit.prevent="IngresarChildren()" class="my-form">
        <div class="container">
          <div class="row">
            <h1 class="textTittle">Ingresar niño</h1>
          </div>
          <div class="row">
            <h4 style="text-align:center">Ingrese los datos del niño</h4>
          </div>
          <div class="row input-container">
            <div class="col-xs-12">
              <div class="styled-input wide">
                <input type="text" required v-model="children.name" />
                <label>Nombre</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="text" required v-model="children.lastname" />
                <label>Apellido</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="children.adult_respon_id" />
                <label>Id adulto responsable</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="integer" required v-model="children.rut" />
                <label>Rut</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="date" required v-model="children.f_nac" />
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="integer" required v-model="children.direccion" />
                <label>Direccion</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="children.phone_contact" />
                <label>Telefono</label>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required v-model="children.obs"></textarea>
                <label>Observaciones</label>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required v-model="children.description"></textarea>
                <label>Descripcion</label>
              </div>
            </div>
            <div class="col-xs-12" id="ButtonNino">
              <p class="error-message" v-if="errorMessage">{{ errorMessage }}</p>
              <button  type="submit" class="btn justify-content-center btn-primary mt-4">Crear niño</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</template>

<script>
import axios from 'axios';

export default {
  name: 'NinoPanel',
  data() {
    return {
      children: {
        adult_respon_id: '',
        name: '',
        lastname: '',
        rut: '',
        f_nac: '',
        obs: '',
        direccion: '',
        phone_contact: '',
        description: ''
      },
      errorMessage: ''
    }
  },
  methods: {
    IngresarChildren() {
      if (
        this.children.adult_respon_id &&
        this.children.name &&
        this.children.lastname &&
        this.children.rut &&
        this.children.f_nac &&
        this.children.obs &&
        this.children.direccion &&
        this.children.phone_contact &&
        this.children.description
      ) {
        axios
        .post('http://127.0.0.1:8000/api/children', this.children)
          .then(response => {
            console.log(response);
            console.log(this.children.rut);
            //this.$router.push('/CrearFicha', this.children.rut);
            this.$router.push({ name: 'CrearFicha', params: { rut: this.children.rut } });
            //redirectToEditFicha(this.children.rut);
          })
          .catch(error => {
            console.error(error);
          });
      } 
/*
      let datos_fichas = [
        //children_id = this.children.id,

      ];

      axios.post('http://127.0.0.1:8000/api/fichas/', datos_fichas)
                .then(res => {
                    this.fichas = res.data;
                    console.log(res.data);
                })
                .catch((error) => {
                    console.log(error.response.status);
                });*/

    },

  }
};
</script>

<style>
@import '../assets/css/ingresinino.css';
</style>