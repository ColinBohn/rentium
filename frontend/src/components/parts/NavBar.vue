<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarCollapse"
        aria-controls="navbarCollapse"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>

      <a
        class="navbar-brand"
        href="/"
      >
        Rentium
      </a>

      <div
        id="navbarCollapse"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav">
          <li class="nav-link">
            Renters
          </li>
          <router-link
            tag="li"
            to="/landlord"
            class="nav-item"
          >
            <a
              class="nav-link"
              href="/landlord"
            >Landlords</a>
          </router-link>
          <li class="nav-link">
            FAQs
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <router-link
            tag="li"
            to="/admin"
            class="nav-item"
          >
            <a
              class="nav-link"
              href="/admin"
            >Admin</a>
          </router-link>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {

}
</script>

<style>
.nav-link {
  margin-left: 2rem;
}

</style>
