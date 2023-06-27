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
              <a v-for="children in childrens" :key="children.id">{{ getAdultoID(children.adulto_responsable_id) }}
                
                <div class="edicion-lapiz">
                  <h3 class="dark-color">{{ children.name }} {{ children.lastname }}</h3>
                  <button @click="editarNino(children.id)"><img src="../assets/lapiz.png" alt="Editar parámetro" class="lapiz-icon"></button>
                </div>
                

                <p id="MARK"><strong>Descripcion:</strong> {{ children.description }}</p>
                <p id="MARK"><strong>Observaciones:</strong> {{ children.obs }}</p>
                <div class="row about-list" id="INFO">
                  <div class="col-md-6">
                    <div class="media">
                      <label class="nowrap-label">Fecha De Nacimiento</label>
                      <p>{{ children.f_nac }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Edad</label>
                      <p>{{ calculateAge(children.f_nac) }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Direccion</label>
                      <p>{{ children.direccion }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Telefono</label>
                      <p>{{ children.phone_contact }}</p>
                    </div>
                  </div>
                  <div class="col-md-6" v-for="adulto in adultos" :key="adulto.id">
                    <div class="media">
                      <label class="nowrap-label">Nombre Adulto Responsable</label>
                      <p>{{ adulto.name }} {{ adulto.lastname }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Rut Adulto</label>
                      <p>{{ adulto.rut }}</p>
                    </div>
                    <div class="media">
                      <label class="nowrap-label">Telefono Adulto</label>
                      <p>{{ adulto.phone }}</p>
                    </div>
                  </div>
                </div>
            <div>
              <button @click="redirectToPerfilNino(children.id)" class="button-32" role="button">Ver ficha</button>
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
import moment from 'moment';

export default {
  // ...
  name: 'PerfilNinoFInalPanel',
  mounted() {
    this.getNinoID();
    this.calculateAge();
    this.getAdultoID();
  },
  data() {
    return {
      childrens: [],
      age: null,
      adultos: {},
      adultoIDCache: {}, // Almacenamiento en caché para getAdultoID
    }
  },
  methods: {
    // Resto del código omitido por brevedad
    getNinoID() {
      axios.get('http://127.0.0.1:8000/api/children/' + this.$route.params.id)
        .then(res => {
          this.childrens = res.data;
          console.log(this.childrens);
        });
    },
    redirectToPerfilNino(childId) {
      this.$router.push({ name: 'FichaNino', params: { id: childId } });
    },
    editarNino(childId) {
      this.$router.push({ name: 'editarNino', params: { id: childId } });
    },
    calculateAge(fecha) {
      const now = moment();
      const birthdate = moment(fecha);
      const age = now.diff(birthdate, 'years');
      return age;
    },
    getAdultoID(ID) {
      if (!this.adultoIDCache[ID]) {
        axios.get('http://127.0.0.1:8000/api/adultos/' + ID)
          .then(res => {
            this.adultos = res.data;
            console.log(this.adultos);
            this.adultoIDCache[ID] = this.adultos; // Almacena el resultado en caché
          });
      } else {
        this.adultos = this.adultoIDCache[ID]; // Obtiene el resultado de la caché
      }
    },
  }
};
</script>

<style>
@import '../assets/css/PerfilNino.css';
</style>