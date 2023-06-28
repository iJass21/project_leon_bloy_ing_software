<template>
  <router-view></router-view>
  
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

