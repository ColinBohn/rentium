<template>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="card-title">
            Get an instant rental offer
          </h3>
          <p class="card-text">
            Tell us a few things about your house and receive a rental offer instantly.
          </p>
          <div class="form-row">
            <div
              class="form-group col-lg-6"
              :class="{'text-danger': form.errors.has('email')}"
            >
              <label for="inputEmail">Email</label>
              <input
                id="inputEmail"
                v-model="form.fields.email"
                :class="{'is-invalid': form.errors.has('email')}"
                type="email"
                class="form-control"
                placeholder="Email"
                @input="form.errors.clear('email')"
              >
              <div
                v-if="form.errors.has('email')"
                class="invalid-feedback"
                v-text="form.errors.get('email')"
              />
            </div>
          </div>
          <div
            class="form-group"
            :class="{'text-danger': form.errors.has('address')}"
          >
            <label for="inputAddress">Address</label>
            <input
              id="inputAddress"
              v-model="form.fields.address"
              :class="{'is-invalid': form.errors.has('address')}"
              type="text"
              class="form-control"
              placeholder="1234 Main St"
              @input="form.errors.clear('address')"
            >
            <div
              v-if="form.errors.has('address')"
              class="invalid-feedback"
              v-text="form.errors.get('address')"
            />
          </div>
          <div class="form-row">
            <div
              class="form-group col-lg-6"
              :class="{'text-danger': form.errors.has('city')}"
            >
              <label for="city">City</label>
              <input
                id="city"
                v-model="form.fields.city"
                :class="{'is-invalid': form.errors.has('city')}"
                type="text"
                class="form-control"
                placeholder="Seattle"
                @input="form.errors.clear('city')"
              >
              <div
                v-if="form.errors.has('city')"
                class="invalid-feedback"
                v-text="form.errors.get('city')"
              />
            </div>
            <div
              class="form-group col-lg-4"
              :class="{'text-danger': form.errors.has('state')}"
            >
              <label for="inputState">State</label>
              <select
                id="inputState"
                v-model="form.fields.state"
                :class="{'is-invalid': form.errors.has('state')}"
                class="form-control"
                @change="form.errors.clear('state')"
              >
                <option value="">
                  Choose...
                </option>
                <option value="WA">
                  Washington
                </option>
                <option value="CA">
                  California
                </option>
                <option value="CO">
                  Colorado
                </option>
              </select>
              <div
                v-if="form.errors.has('state')"
                class="invalid-feedback"
                v-text="form.errors.get('state')"
              />
            </div>
            <div
              class="form-group col-lg-2"
              :class="{'text-danger': form.errors.has('zip')}"
            >
              <label for="inputZip">Zip</label>
              <input
                id="inputZip"
                v-model.number="form.fields.zip"
                :class="{'is-invalid': form.errors.has('zip')}"
                type="text"
                class="form-control"
                placeholder="98195"
                @input="form.errors.clear('zip')"
              >
              <div
                v-if="form.errors.has('zip')"
                class="invalid-feedback"
                v-text="form.errors.get('zip')"
              />
            </div>
          </div>
          <div class="form-row">
            <div
              class="form-group col-lg-4"
              :class="{'text-danger': form.errors.has('bedrooms')}"
            >
              <label for="inputBedrooms">Bedrooms</label>
              <input
                id="inputBedrooms"
                v-model.number="form.fields.bedrooms"
                :class="{'is-invalid': form.errors.has('bedrooms')}"
                type="number"
                class="form-control d-inline"
                placeholder="3"
                @input="form.errors.clear('bedrooms')"
              >
              <div
                v-if="form.errors.has('bedrooms')"
                class="invalid-feedback"
                v-text="form.errors.get('bedrooms')"
              />
            </div>
            <div
              class="form-group col-lg-4"
              :class="{'text-danger': form.errors.has('bathrooms')}"
            >
              <label for="inputBathrooms">Bathrooms</label>
              <input
                id="inputBathrooms"
                v-model.number="form.fields.bathrooms"
                :class="{'is-invalid': form.errors.has('bathrooms')}"
                type="number"
                class="form-control d-inline"
                placeholder="2"
                @input="form.errors.clear('bathrooms')"
              >
              <div
                v-if="form.errors.has('bathrooms')"
                class="invalid-feedback"
                v-text="form.errors.get('bathrooms')"
              />
            </div>
            <div
              class="form-group col-lg-4"
              :class="{'text-danger': form.errors.has('square_footage')}"
            >
              <label for="inputSqft">Living area (sq. ft.)</label>
              <input
                id="inputSqft"
                v-model.number="form.fields.square_footage"
                :class="{'is-invalid': form.errors.has('square_footage')}"
                type="number"
                class="form-control d-inline"
                placeholder="1700"
                @input="form.errors.clear('square_footage')"
              >
              <div
                v-if="form.errors.has('square_footage')"
                class="invalid-feedback"
                v-text="form.errors.get('square_footage')"
              />
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-lg btn-success mt-4"
            @click="submit()"
          >
            Get offer
          </button>
        </div>
        <div class="col-sm-4 d-none d-sm-block">
          <img
            class="img-fluid"
            src="./../../assets/img/house_search.svg"
            alt="Drawing of a house"
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    form: {
      type: Object,
      default () {
        return {
          fields: {},
          errors: {}
        }
      }
    }
  },

  methods: {
    submit () {
      this.$emit('submit')
    }
  },
}
</script>

<style>

</style>
