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
            <form @submit.prevent="IngresarChildren()" class="my-form" method="POST">
                <input type="hidden" name="_method" value="PATCH">
                <div class="container" v-for="data in datas" :key="data.id">
                    <div class="row">
                        <h1 class="textTittle">Editar niño</h1>
                    </div>
                    <div class="row">
                        <h4 style="text-align:center">Modifique los datos del niño</h4>
                    </div>
                    <div class="row input-container">
                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <input type="text" required v-model="data.name" />
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input">
                                <input type="text" required v-model="data.lastname" />
                                <label>Apellido</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="text" required v-model="data.adulto_responsable_id" />
                                <label>Id adulto responsable</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input">
                                <input type="integer" required v-model="data.rut" />
                                <label>Rut</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="date" required v-model="data.f_nac" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input">
                                <input type="integer" required v-model="data.direccion" />
                                <label>Direccion</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="text" required v-model="data.phone_contact" />
                                <label>Telefono</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <textarea required v-model="data.obs"></textarea>
                                <label>Observaciones</label>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="styled-input wide">
                                <textarea required v-model="data.description"></textarea>
                                <label>Descripcion</label>
                            </div>
                        </div>
                        <div class="col-xs-12" id="ButtonNino">
                            <p class="error-message" v-if="errorMessage">{{ errorMessage }}</p>
                            <button type="submit" class="btn justify-content-center btn-primary mt-4">Editar niño</button>
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

    mounted() {
        this.getNinoID();
    },
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
            datas: [],
            errorMessage: '',
        }
    },
    methods: {
        getNinoID() {
            axios.get('http://127.0.0.1:8000/api/children/' + this.$route.params.id)
                .then(res => {
                    this.datas = res.data;
                    console.log(res.data);
                    this.initialValue = this.datas.name;
                });
        },
        IngresarChildren() {
            /*if (
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
                axios.post('http://127.0.0.1:8000/api/children', this.children)
                    .then(response => {
                        console.log(response);
                        this.$router.push('/AdminPanel');
                    })
                    .catch(error => {
                        console.error(error);
                    });

                    console.log(this.datas);
            }*/

            console.log(this.datas[0].name);

            axios.patch(`http://127.0.0.1:8000/api/children/`+ this.$route.params.id + `/edit`, this.datas[0])
                .then(data => {
                    
                    if (data.data) {
                        console.log(data.data);
                        this.$router.push('/PerfilNinoPanel');
                        
                    } else {
                        this.error = true;
                        this.error_msg = data.data.result.error_msg;
                    }

                })
                .catch((error) => {
                    if(error.response.status === 404){
                        console.log("error 404");
                    }
                });


            



        },
    }
};
</script>
  
<style>
@import '../assets/css/ingresinino.css';
</style>