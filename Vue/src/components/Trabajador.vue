<template>
    <div>
        <!-- <Header /> -->

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


            <div class="d-flex justify-content-center" style="margin-top: 200px;">
                <div class="col-lg-6 col-md-8 mx-auto text-center">
                    <h1 class="fw-light">Bienvenida Trabajadora</h1>
                    <div v-if="getFechaUsuario() <= 30" class="alert alert-info">
                        Bienvenido a fundación Leon Bloy, esperamos tu permanencia en esta fundación sea del mejor de los
                        agrados,
                        queremos que sepas que dentro de esta página, podrás crear solicitudes de modificación de cada niño
                        perteneciente
                        al programa, ver los perfiles de ellos y su ficha, donde además podrás ver los datos del adulto
                        responsable.
                    </div>
                </div>
            </div>
            <div id="TABLAS-TITULO">
                <h3 class="fw-light">Cantidad de niños, trabajadores y adultos activos.</h3>
                <table>
                    <thead>
                        <tr>
                            <td>Niños</td>
                            <td>Adultos</td>
                            <td>Trabajadores</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ contadorChildren }}</td>
                            <td>{{ contadorAdultos }}</td>
                            <td>{{ contadorTrabajadores }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">

                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="name" class="filter__link">Id Alerta</a></div>
                        <div class="header__item"><a id="wins" class="filter__link filter__link--number">Nombre Niño</a>
                        </div>
                        <div class="header__item"><a id="draws" class="filter__link filter__link--number">Fecha Alerta</a>
                        </div>
                        <div class="header__item"><a id="losses" class="filter__link filter__link--number">Descripcion</a>
                        </div>
                    </div>
                    <div class="table-content">
                        <div class="table-row">
                            <div class="table-data">Alerta1</div>
                            <div class="table-data">2</div>
                            <div class="table-data">0</div>
                            <div class="table-data">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </div>
</template>

<script>
//import Header from './components/header.vue';
import axios from 'axios';
import HeaderComponent from './header.vue';

export default {
    name: 'TrabajadorPanel',
    components: {
        HeaderComponent,
    },
    mounted() {
        this.getNinos();
        this.getAdultos();
        this.getTrabajadores();
    },

    data() {
        return {
            userCreatedAt: null,
            contadorChildren: '',
            contadorTrabajadores: '',
            contadorAdultos: '',
        };
    },
    // created() {
    //     this.userCreatedAt = this.userCreatedAt;
    // },
    methods: {
        RedirigirIngresoNino() {
            this.$router.push('/CrearNino')
        },
        fechaDesdeIngreso() {
            const today = new Date(); // Fecha actual
            const createdAt = new Date(this.userCreatedAt); // Fecha a Date
            const timeDiff = Math.abs(today.getTime() - createdAt.getTime()); // Diferencia en milisegundos
            const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Convierte milisegundos a días
            return daysDiff;
        },
        getNinos() {
            axios.get('http://127.0.0.1:8000/api/children-count')
                .then(res => {
                    this.contadorChildren = res.data;
                    console.log(this.contadorChildren);
                });
        },
        getAdultos() {
            axios.get('http://127.0.0.1:8000/api/adultos-count')
                .then(res => {
                    this.contadorAdultos = res.data;
                    console.log(this.contadorAdultos);
                });
        },
        getTrabajadores() {
            axios.get('http://127.0.0.1:8000/api/Trabajadores-count')
                .then(res => {
                    this.contadorTrabajadores = res.data;
                    console.log(this.contadorTrabajadores);
                });
        },
        getFechaUsuario() {
            console.log(localStorage.getItem("id_trabajador"));
            /*axios.get('http://127.0.0.1:8000/api/trabajador/' + localStorage.getItem(id_trabajador))
            .then(res => {
                console.log(res.data);
            });*/
        }
    },

}
</script>


<style>
@import '../assets/css/admincss.css';
@import '../assets/css/tablatranajador.css';
@import '../assets/css/ListaAlertas.css';</style>