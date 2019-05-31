<template>
  <div class="jumbotron">
    <h1>Get above-market rent for your house, guaranteed.</h1>
    <router-link
      to="/landlord"
      tag="button"
      class="btn btn-success mx-auto d-block"
    >
      Get an instant offer &raquo;
    </router-link>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
  .jumbotron {
    background-image: url('./../../assets/img/modern_home.jpg');
    background-position: top;
    background-size: cover;
    min-height: 500px;
  }
  .jumbotron h1 {
    font-weight: 700;
    color: #444;
  }
  .jumbotron button {
    margin-top: 2rem;
    font-size: 1.6rem;
    box-shadow: 0px 2px 2px 1px #088C7C;
  }
</style>
