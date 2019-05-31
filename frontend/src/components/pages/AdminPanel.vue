<template>
  <div>
    <h3>Recent Offers</h3>
    <div
      v-for="offer in offers"
      :key="offer.id"
      class="card mb-3"
    >
      <div class="card-header">
        <div class="font-weight-bold d-md-block d-md-flex justify-content-between">
          <span>{{ offer.address }} {{ offer.city }}, {{ offer.state }} {{ offer.zip }}</span>
          <br class="d-block d-md-none">
          <a
            :href="'mailto:' + offer.email"
            class="text-dark"
          >{{ offer.email }}</a>
        </div>
      </div>
      <div class="card-body">
        <div
          class="d-block d-md-flex justify-content-between"
        >
          <div>
            <div class="data-title">
              Square footage
            </div>
            <span class="text-dark data-value">{{ offer.square_footage }} sq. ft.</span>
          </div>
          <div>
            <div class="data-title">
              Bed / bath
            </div>
            <span class="text-dark data-value">{{ offer.bedrooms }} / {{ offer.bathrooms }}</span>
          </div>
          <div>
            <div class="data-title">
              Full home
            </div>
            <span class="text-dark data-value">${{ offer.estimated_full_rent }}/mo</span>
          </div>
          <div>
            <div class="data-title">
              Renter
            </div>
            <span class="text-dark data-value">${{ offer.estimated_renter_rent }}/mo</span>
          </div>
          <div>
            <div class="data-title">
              Airbnb
            </div>
            <span class="text-dark data-value">${{ offer.estimated_airbnb_income }}/mo</span>
          </div>
          <div>
            <div class="data-title">
              Offer made
            </div>
            <span
              v-if="offer.offer_made"
              class="text-success data-value"
            >${{ offer.offer_amount }}/mo</span>
            <span
              v-else
              class="text-danger data-value"
            >None</span>
          </div>
        </div>
      </div>
    </div>
    <pagination-buttons
      :current-page="meta.current_page"
      :total-pages="meta.last_page"
      @setPage="fetchPage($event)"
    />
  </div>
</template>

<script>
import InstantOfferService from './../../services/InstantOfferService'
import PaginationButtons from './../parts/PaginationButtons'

export default {
  components: {
    PaginationButtons
  },

  data () {
    return {
      offers: [],
      meta: {
        current_page: 1,
        last_page: 1,
      },
    }
  },

  mounted () {
    this.fetchPage(1)
  },

  methods: {
    fetchPage (page) {
      InstantOfferService.fetchPage(page)
        .then(response => {
          this.offers = response.data.data
          this.meta = response.data.meta
        })
    },
  },
}
</script>

<style scoped>
.data-title {
  font-size: 1rem;
  font-weight: 500;
}
.data-value {
  font-weight: 400;
  font-size: 1.2rem;
}

</style>
