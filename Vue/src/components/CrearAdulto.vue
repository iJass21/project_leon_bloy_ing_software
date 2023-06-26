
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
      <a href="/CrearTrabajadorPanel">Crear Trabajador</a>
    </nav>
    <a href="/" class="donate-link">Cerrar Sesion</a>
  </div>
</header>
  <div class="d-flex justify-content-center mt-5">
    <form @submit.prevent="IngresarAdultos()" class="my-form">
      <div class="container">
        <div class="row">
            <h1 class="textTittle">Ingresar Adulto responsable</h1>
        </div>
        <div class="row">
            <h4 style="text-align:center">Ingrese los datos del adulto</h4>
        </div>
        <div class="row input-container">
            <div class="col-xs-12">
              <div class="styled-input wide">
                <input type="word" required v-model="adultos.name">
                <label>Nombre</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="word" required v-model="adultos.lastname" >
                <label>Apellido</label>  
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="integer" required v-model="adultos.rut" >
                <label>Rut</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="word" required v-model="adultos.vinculo" >
                <label>Vinculo</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="word" required v-model="direccion" >
                <label>Direccion</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="word" required v-model="adultos.phone">
                <label>Telefono</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="word" required v-model="adultos.email" >
                <label>Correo</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="word" required  v-model="adultos.rubro" >
                <label>Rubro</label> 
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required  v-model="adultos.obs"></textarea>
                <label>Observaciones</label>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required v-model="adultos.objetivos"></textarea>
                <label>Objetivos</label>
              </div>
            </div>
            <div class="col-xs-12" id="ButtonNino">
              <button type="submit" class="btn justify-content-center btn-primary mt-4">Crear adulto</button>
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
  name: 'AdultCreatePanel',
  data() {
    return {
      adultos: {
        name: '',
        lastname: '',
        rut: '',
        vinculo: '',
        obs: '',
        direccion: '',
        phone: '',
        objetivos: '',
        email: '',
        rubro: ''
      },
      errorMessage: '' // Agregamos una variable para almacenar el mensaje de error
    }
  },
  methods: {
    IngresarAdultos() {
      // Verificar si todos los campos están llenos
      if (
        this.adultos.name &&
        this.adultos.lastname &&
        this.adultos.rut &&
        this.adultos.vinculo &&
        this.adultos.obs &&
        this.adultos.direccion &&
        this.adultos.phone &&
        this.adultos.objetivos &&
        this.adultos.email &&
        this.adultos.rubro
      ) {
        axios
          .post('http://127.0.0.1:8000/api/adultos', this.adultos)
          .then((response) => {
            console.log(response);
            this.$router.push('/AdminPanel');
          })
          .catch((error) => {
            console.error(error);
            // Manejar el error de la solicitud si es necesario
          });
      } else {
        //  this.errorMessage = 'Debe llenar todos los campos'; // Mostrar mensaje de error
      }
    },
    RedirigirAdminPanel() {
      this.$router.push('/AdminPanel');
    }
  }
}
</script>

<style>
  @import '../assets/css/ingresinino.css';
</style>

