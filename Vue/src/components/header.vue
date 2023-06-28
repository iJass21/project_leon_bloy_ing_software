<template>
    <header>
        <div class="inner">
                <div class="logo"><img src="../assets/fundacion.png"></div>
                <div class="burger"></div>
                <nav>
                    <a v-if="getTipoUsario()== 'false'" href="/TrabajadorPanel">Inicio</a>
                    <a v-if="getTipoUsario()== 'true'" href="/AdminPanel">Inicio</a>
                    <a v-if="getTipoUsario()== 'true'" href="/CrearNino">Integrar Niño</a>
                    <a v-if="getTipoUsario()== 'true'" href="/AdultCreatePanel">Crear Adultos</a>
                    <a href="/PerfilesPanel">Perfiles</a>
                    <a v-if="getTipoUsario()== 'true'" href="/CrearTrabajadorPanel">Crear Trabajador</a>
                </nav>
                
                <a href="/" class="donate-link">Cerrar Sesion</a>
            </div>
    </header>
</template>
  
  <script>
  export default {
    name: 'HeaderComponent',
    data() {
    return {
      directora: {
        direct: '',
      },
    }
  },
    
    methods:{
        getTipoUsario(){
            this.directora.direct = localStorage.getItem("directora");
            console.log(this.directora.direct);
            return (this.directora.direct);
        }
    }
  }

  </script>
  