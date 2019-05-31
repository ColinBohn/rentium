<template>
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a
          class="page-link"
          href="#"
          @click="setPage(currentPage - 1)"
        >&laquo;</a>
      </li>
      <li
        v-for="page in pageButtons"
        :key="page"
        class="page-item"
        :class="{'active': currentPage == page}"
      >
        <a
          class="page-link"
          href="#"
          @click="setPage(page)"
        >{{ page }}</a>
      </li>
      <li class="page-item">
        <a
          class="page-link"
          href="#"
          @click="setPage(currentPage + 1)"
        >&raquo;</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    currentPage: {
      type: Number,
      default: 1
    },
    totalPages: {
      type: Number,
      default: 1
    }
  },

  computed: {
    /**
     * Generates an array of integers for pagination buttons
     * @returns {Array} An array of ints
     */
    pageButtons () {
      let pages = []
      console.log(Math.min(this.currentPage + 2, this.totalPages))
      for (let i = Math.max(this.currentPage - 5, 1); i <= Math.min(this.currentPage + 5, this.totalPages); i++) {
        pages.push(i)
      }
      return pages
    }
  },

  methods: {
    /**
     * Fires off event telling parent to update currect page
     * @param {Number} page Page to retrieve
     */
    setPage (page) {
      this.$emit('setPage', page)
    }
  }
}
</script>

<style>

</style>
