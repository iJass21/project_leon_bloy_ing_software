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
        <div class="d-flex justify-content-center mt-5">
            <form @submit.prevent="llenarFIcha()" class="my-form">
                <div class="container">
                    <div class="row">
                        <h1 class="textTittle">Ingresar Ficha niño</h1>
                    </div>
                    <div class="row">
                        <h4 style="text-align:center">Ingrese los datos del niño</h4>
                    </div>
                    <div class="row input-container">

                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="text" value="FECHA INGRESO" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="date" required v-model="ficha.fec_ingreso" />
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="text" value="FECHA EGRESO" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="date" required v-model="ficha.fec_salida" />

                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <textarea required v-model="ficha.objetivos"></textarea>
                                <label>Objetivos</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <textarea required v-model="ficha.description"></textarea>
                                <label>Descripcion</label>
                            </div>
                        </div>
                        <div class="col-xs-12" id="ButtonNino">
                            <p class="error-message" v-if="errorMessage">{{ errorMessage }}</p>
                            <button type="submit" class="btn justify-content-center btn-primary mt-4">Crear Ficha
                                Niño</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</template>
  
<script>
import axios from 'axios';
import HeaderComponent from './header.vue';


export default {
    name: 'CrearFicha',
    components: {
        HeaderComponent,
    },
    data() {
        return {
            children: {
                id: '',
                papeleo: ''
            },
            ficha: {
                children_id: '',
                fec_ingreso: '',
                fec_salida: '',
                objetivos: '',
                description: ''
            },
            alertas: {
                fecha_alerta: '',
                children_id: '',
                descripcion: ''
            },
            //fecha_alerta,

            errorMessage: ''
        }
    },
    mounted() {

        this.ObtenerChildren();
        this.crearAlerta();
        //console.log('papeleo:'+this.children.papeleo);

    },
    methods: {
        ObtenerChildren() {
            console.log(this.$route.params.rut);

            axios.get('http://127.0.0.1:8000/api/children_rut/' + this.$route.params.rut)
                .then(response => {
                    console.log(response.data[0].papeleo);
                    this.children.id = response.data[0].id;
                    this.children.papeleo = response.data[0].papeleo;
                    this.ficha.children_id = response.data[0].id;
                    //this.$router.push('/AdminPanel');

                })
                .catch(error => {
                    console.error(error);
                });
        },
        crearAlerta() {

            let papeleo = null;

            axios.get('http://127.0.0.1:8000/api/children_rut/' + this.$route.params.rut)
                .then(response => {
                    console.log('data.papeleo: ' + response.data[0].papeleo);
                    this.children.id = response.data[0].id;
                    papeleo = response.data[0].papeleo;
                    this.ficha.children_id = response.data[0].id;
                    //this.$router.push('/AdminPanel');

                    if (papeleo == true) {
                        this.alertas.children_id = this.children.id;
                        this.alertas.descripcion = 'Alerta de papeleo Nacionalidad';

                        const fecha = new Date();
                        this.fechaActual = this.formatearFecha(fecha);

                        fecha.setDate(fecha.getDate() + 10); // Sumar 10 días

                        this.fechaFutura = this.formatearFecha(fecha);

                        console.log(this.fechaFutura);

                        let datas = {
                            fecha_alerta: this.fechaFutura,
                            descripcion: 'alerta de papeleo',
                            children_id: this.children.id
                        }

                        console.log(datas);
                        axios
                            .post('http://127.0.0.1:8000/api/alertas', datas)
                            .then(response => {
                                console.log(response);

                            })
                            .catch(error => {
                                console.error(error);
                            });
                    } else {
                        console.log('NO ENTRO A IF PAPELEO TRUE');
                    }

                })
                .catch(error => {
                    console.error(error);
                });


        },
        formatearFecha(fecha) {
            const año = fecha.getFullYear();
            const mes = String(fecha.getMonth() + 1).padStart(2, '0');
            const día = String(fecha.getDate()).padStart(2, '0');

            return `${año}-${mes}-${día}`;
        },
        llenarFIcha() {
            console.log(this.ficha);

            let datas = {
                children_id: this.ficha.children_id,
                fec_ingreso: this.ficha.fec_ingreso,
                fec_salida: this.ficha.fec_salida,
                objetivos: this.ficha.objetivos,
                description: this.ficha.description
            }

            console.log(datas);
            axios.post('http://127.0.0.1:8000/api/fichas/', datas)
                .then(response => {
                    console.log(response);

                    this.$router.push('/AdminPanel');
                })
                .catch(error => {
                    console.error(error);
                });
        }

    }
};
</script>
  
<style>
@import '../assets/css/ingresinino.css';
</style>