<template>
  <router-view></router-view>
  
  <footer id="footer-id">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">© 2023 - Todos los derechos reservados</p>
        </div>
      </div>
    </div>
  </footer>

</template>


<script>

export default {
  name: 'App',

  mounted(){
    if(localStorage.getItem('authenticated')){
      //this
    }
  }
}
</script>

<style>
  #footer-id {
    position: fixed;
    left: 0;
    width: 100%;
    background-color: #f5f5f5;
    padding: 100px;
    margin:100px;
    }
  .text-center {
    text-align: center;
  }
</style>

