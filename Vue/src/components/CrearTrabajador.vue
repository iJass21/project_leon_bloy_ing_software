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
    <div class="d-flex justify-content-center mt-5">
      <form @submit.prevent="IngresarTrabajador()" class="my-form">
        <div class="container">
          <div class="row">
            <h1 class="textTittle">Ingresar Nuevo Trabajador</h1>
          </div>
          <div class="row">
            <h4 style="text-align:center">Ingrese los datos del trabajador</h4>
          </div>
          <div class="row input-container">
            <div class="col-xs-12">
              <div class="styled-input wide">
                <input type="text" required v-model="trabajador.name" />
                <label>Nombre</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="text" required v-model="trabajador.email" />
                <label>Correo</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="password" required v-model="trabajador.password" />
                <label>Contraseña</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="text" required v-model="trabajador.cargo" />
                <label>Cargo</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="integer" required v-model="trabajador.rut" />
                <label>Rut</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                  <input type="text" value="FECHA NACIMIENTO" readonly />
              </div>
          </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="date" required v-model="trabajador.f_nac" />
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="trabajador.direccion" />
                <label>Direccion</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="trabajador.phone" />
                <label>Teléfono</label>
              </div>
            </div>
            <div class="col-xs-12" id="ButtonNino">
              <button type="submit" class="btn justify-content-center btn-primary mt-4">Crear Trabajador</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</template>

<script>
import axios from 'axios'
import HeaderComponent from './header.vue';

export default {
  name: 'CrearTrabajadorPanel',
  components:{
        HeaderComponent,
    },
  data() {
    return {
      trabajador: {
        name: '',
        email: '',
        password: '',
        rut: '',
        f_nac: '',
        cargo: '',
        mod_ficha: false,
        direccion: '',
        phone: ''


      }
    }
  },
  methods: {
    IngresarTrabajador() {
      if (this.trabajador.cargo == 'Directora') {
        alert('Cargo No puede ser directora');
      }
      else if (
        this.trabajador.name &&
        this.trabajador.email &&
        this.trabajador.password &&
        this.trabajador.rut &&
        this.trabajador.f_nac &&
        this.trabajador.cargo &&
        this.trabajador.direccion &&
        this.trabajador.phone
      ) {
        axios.post('http://127.0.0.1:8000/api/register', this.trabajador)
          .then(data => {
            console.log(data);
          })
          .catch((error) => {

            console.log(error.response);

          });

        //let result = axios.post('http://127.0.0.1:8000/api/register', this.trabajador);
        //console.log(result);
        this.$router.push('/AdminPanel')
      }

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