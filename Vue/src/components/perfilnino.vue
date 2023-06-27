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
        <div id="app" class="list-group list-group-flush border-bottom scrollarea">
            <div class="grid-container">
                <a v-for="children in paginatedChildrens" :key="children.id" href="#" id="list"
                    class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">{{ children.name }} {{ children.lastname }}</strong>
                        <button class="button-81" @click="redirectToPerfilNino(children.id)" role="button">Perfiles</button>

                    </div>
                    <div class="col-12 mb-1 small">{{ children.rut }}</div>
                </a>
            </div>
        </div>
        <div class="pagination" id="button-list">
            <button id="button-next" :disabled="currentPage === 1" @click="previousPage">Anterior</button>
            <span>{{ currentPage }}</span>
            <button id="button-next" :disabled="currentPage === totalPages" @click="nextPage">Siguiente</button>
        </div>
    </body>
</template>



<script>
import axios from 'axios';

export default {
    name: 'PerfilNinoPanel',
    mounted() {
        this.getNino();
    },
    data() {
        return {
            childrens: [],
            currentPage: 1,
            perPage: 15
        };
    },
    computed: {
        paginatedChildrens() {
            const startIndex = (this.currentPage - 1) * this.perPage;
            const endIndex = startIndex + this.perPage;
            return this.childrens.slice(startIndex, endIndex);
        },
        totalPages() {
            return Math.ceil(this.childrens.length / this.perPage);
        }
    },
    methods: {
        getNino() {
            const offset = (this.currentPage - 1) * this.perPage;
            axios.get(`http://127.0.0.1:8000/api/verChildren?offset=${offset}&limit=${this.perPage}`)
                .then(res => {
                    this.childrens = res.data;
                    console.log(this.childrens);
                });
        },
        redirectToPerfilNino(childId) {
            this.$router.push({ name: 'PerfilNinoFInalPanel', params: { id: childId } });
        },
        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.getNino();
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.getNino();
            }
        }
    }
};
</script>
<style>
@import '../assets/css/admincss.css';
@import '../assets/css/perfiles.css';
</style>