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


