<template>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hola mundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
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
    <div class="d-flex justify-content-center mt-5">
        <form @submit.prevent="IngresarAdultos()">
            
            <div class="form-group mt-4">
              <label for="nombreNiño">Nombre</label>
              <input type="word" class="form-control" v-model="name" placeholder="Ingrese un nombre">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Apellido</label>
                <input type="word" class="form-control" v-model="lastname" placeholder="Ingrese un apellido">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Rut</label>
                <input type="integer" class="form-control" v-model="rut" placeholder="Ingrese un rut">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Vinculo</label>
                <input type="word" class="form-control" v-model="vinculo" placeholder="Ingrese un vinculo">
            </div>
            <div class="mt-3">
                <label for="información">Observaciones</label>
                <textarea class="form-control" v-model="obs" rows="3"></textarea>
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Dirección</label>
                <input type="word" class="form-control" v-model="direccion" placeholder="Ingrese una direccion">
            </div><div class="form-group mt-4">
                <label for="nombreNiño">Teléfono</label>
                <input type="word" class="form-control" v-model="phone" placeholder="Ingrese una direccion">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Objetivos</label>
                <input type="word" class="form-control" v-model="objetivos" placeholder="Ingrese Objetivos">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Correo</label>
                <input type="email" class="form-control" v-model="email" placeholder="Ingrese un correo">
            </div>
            <div class="form-group mt-4">
                <label for="nombreNiño">Rubro</label>
                <input type="word" class="form-control" v-model="rubro" placeholder="Ingrese un rubro">
            </div>
            <button type="submit" class="btn justify-content-center btn-primary mt-4">Crear perfil</button>
          </form>
    </div>
</body>
</template>


<script>
    import axios from 'axios'
    export default {
        name: 'AdultCreatePanel',
        data(){
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

            }
          }
        },
        methods: {
          IngresarAdultos(){
            let result = axios.post('http://127.0.0.1:8000/api/adultos',{
              name:this.name,
              lastname:this.lastname,
              rut: this.rut,
              vinculo: this.vinculo,
              obs: this.obs,
              direccion: this.direccion,
              phone: this.phone,
              objetivos: this.objetivos,
              email: this.email,
              rubro: this.rubro
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
    @import '../assets/css/admincss.css';
</style>