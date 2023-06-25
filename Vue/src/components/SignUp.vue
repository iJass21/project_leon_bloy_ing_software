<template>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hola mundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <header class="d-flex flex-wrap align-items-center justify-content-center py-3 mb-4">
      <div class="align-items-center justify-content-center">
      <h1>Bienvenido a la página de la fundación</h1>
        <p>Porfavor ingresa tu usuario para poder ingresar al perfil de rol. Si no tienes usuario, favor comunicarse con la directora y solicitar una cuenta.</p>
      </div>
    </header>
      <div class="d-flex justify-content-center " style="height: 100vh;" id="app">
          <form v-on:submit.prevent = "login">
              <img class="mb-4 justify-content-center align-items-center" src="https://fundacionleonbloy.cl/wp-content/themes/mydefault/img/fundacion.png" alt="" width="250" height="100">
              <h1 class="h3 mb-3 fw-normal ">Ingrese su usuario</h1>
          
              <div class="form-floating">
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com" v-model="user">
                <label for="user_email">Mail</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" v-model="password" >
                <label for="password">Contraseña</label>
              </div>
              <!-- Aqui el id perfil Ingreso sirve para conectarlo con backend y que este nos lleve al perfil correspondiente -->
              <button class="w-100 btn btn-lg btn-primary mt-1" type="submit" >Entrar</button>
            </form>

            <div class="alert alert-danger" role="alert" v-if="error">
              {{ error_msg }}
            </div>

        </div>
  </body>
</template>

<script>

  import axios from 'axios';
  //test
    export default {
      name: 'SignUp',
      components: {
        
      },
      data: function(){
        return {
          user: '',
          password: '',
          error: false,
          error_msg: '',
        }
      },
      methods:{
        login(){
          //console.log(this.user+this.password);
          let json = {
            "email" : this.user,
            "password" : this.password
          };

          axios.post(`http://127.0.0.1:8000/api/login`, json)
          .then(data => {
            console.log(data);
            //console.log(data.data.user.cargo);

            if(data.data.message == "Unauthorized"){
              console.log('Datos incorrectos');
              this.error_msg = 'Datos incorrectos';

            }else if( data.status == 200 && data.data.user.cargo == 'Directora'){
              console.log('Cargo Directora');

            }else if(data.status == 200 && data.data.user.id){
              console.log('Bienvenido trabajador');
              
            }else{
              this.error = true;
              this.error_msg = data.data.result.error_msg;
            }

          });

        }
      }
    }
</script>