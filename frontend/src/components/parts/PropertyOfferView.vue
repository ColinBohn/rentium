<template>
  <div class="col-lg-8 offset-lg-2">
    <div class="card">
      <div
        v-if="offer.offer_made"
        class="card-body"
      >
        <div class="row">
          <div class="col-md-7">
            <h3 class="mt-3">
              Your instant offer:
            </h3>
            <h1 class="text-success text-xl">
              ${{ offer.offer_amount }}<small>/mo</small>
            </h1>
            <p>Ready to sign up? Click the button below to finish the registration process.</p>
          </div>
          <div class="col-md-5">
            <img
              class="img-fluid"
              src="./../../assets/img/savings.svg"
              alt="Drawing of a piggy bank"
            >
          </div>
        </div>
        <button class="btn btn-success btn-xl mx-auto d-block">
          Sign up now &raquo;
        </button>
      </div>

      <div
        v-else
        class="card-body"
      >
        <h4 class="text-dark">
          Sorry, we were unable to make an offer for your property.
        </h4>
        <p>
          We thank you for your interest in Rentium, and encourage you to keep up to date with what we're doing!
          You can sign up for our mailing list below.
        </p>
        <div class="input-group col-md-6 offset-md-3">
          <input
            type="text"
            class="form-control"
            placeholder="myself@example.com"
          >
          <div class="input-group-append">
            <button class="btn btn-success">
              Sign up
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    offer: {
      type: Object,
      default () {
        return {
          offer_made: false,
          offer_amount: 0
        }
      }
    }
  }
}
</script>

<style scoped>
.text-xl {
  font-size: 3.5rem;
}
.btn-xl {
    margin-top: 2rem;
    font-size: 1.2rem;
    box-shadow: 0px 2px 2px 1px #088C7C;
}

</style>
