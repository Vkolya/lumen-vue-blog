<template>
  <div id="app" class="container">
    <navbar/>
    <router-view/>
  </div>
</template>

<script>
    import navbar from '@/components/navbar/navbar.vue'

    export default {
        name: 'App',
        components: {
            navbar
        }
    };
</script>

<style>
body {
  background-image: url("./assets/background.png");
  background-size: 2000px;

}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;

}
</style>
