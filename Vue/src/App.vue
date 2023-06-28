<template>
  <router-view></router-view>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">© 2018 - Todos os direitos reservados</p>
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


