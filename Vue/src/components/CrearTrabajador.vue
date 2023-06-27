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
    <form @submit.prevent="IngresarChildren()" class="my-form">
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
                <input type="text" required v-model="name"/>
                <label>Nombre</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="text" required v-model="lastname"/>
                <label>Apellido</label>  
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="adult_respon_id" />
                <label>Id adulto responsable</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="integer" required v-model="rut"/>
                <label>Rut</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="date" required v-model="f_nac"/>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="integer" required v-model="direccion"/>
                <label>Direccion</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required v-model="phone_contact"/>
                <label>Telefono</label> 
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required v-model="obs"></textarea>
                <label>Observaciones</label>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required v-model="description"></textarea>
                <label>Descripcion</label>
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
  export default {
      name: 'NinoPanel',
      data(){
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


          }
        }
      },
      methods: {
        IngresarChildren(){
          let result = axios.post('http://127.0.0.1:8000/api/children',{
            adult_respon_id:this.adult_respon_id,
            name:this.name,
            lastname:this.lastname,
            rut: this.rut,
            f_nac: this.f_nac,
            obs: this.obs,
            direccion: this.direccion,
            phone_contact: this.phone_contact,
            description: this.description
          });
          console.log(result);
          this.$router.push('/AdminPanel')
        },
        RedirigirAdminPanel(){
          this.$router.push('/AdminPanel')
          }
      }
  }
</script>

<style>
  @import '../assets/css/ingresinino.css';
</style>