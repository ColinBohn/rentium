<template>
  <div>
    <property-offer-form
      v-if="step == 1"
      :form="form"
      @submit="createOffer"
    />
    <property-offer-view
      v-if="step == 2"
      :offer="offer"
    />
  </div>
</template>

<script>
import PropertyOfferForm from './../parts/PropertyOfferForm.vue'
import PropertyOfferView from './../parts/PropertyOfferView.vue'
import InstantOfferService from './../../services/InstantOfferService'
import FormValidationService from './../../services/FormValidationService'

export default {
  components: { PropertyOfferForm, PropertyOfferView },

  data () {
    return {
      form: {
        fields: {
          email: '',
          address: '',
          city: '',
          state: '',
          zip: null,
          bedrooms: null,
          bathrooms: null,
          square_footage: null,
        },
        errors: FormValidationService,
      },
      offer: {
        offer_made: false,
        offer_amount: 0,
      },
      step: 1,
    }
  },

  methods: {
    /**
     * Submits request to API to generate offer, and handles response
     */
    createOffer () {
      InstantOfferService.create(this.form.fields)
        .then(response => {
          this.offer.offer_made = response.data.data.offer_made
          this.offer.offer_amount = response.data.data.offer_amount
          this.step = 2
        })
        .catch(error => {
          if (error.response) {
            this.form.errors.record(error.response.data.errors)
          }
        })
    }
  }
}
</script>

<style>

</style>
