<template>
  <div>
    <nav-bar />
    <div class="container mt-4">
      <router-view />
    </div>
  </div>
</template>

<script>
import NavBar from './components/parts/NavBar.vue'
export default {
  components: { NavBar }
}
</script>

<style lang="scss">
@import "assets/scss/_variables.scss";
@import '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
