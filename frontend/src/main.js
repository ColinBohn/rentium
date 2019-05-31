import Vue from 'vue'
import router from './routes'
import App from './App.vue'
import VueRouter from 'vue-router'
import 'bootstrap'

window.axios = require('axios').create({
  baseURL: '/api',
  headers: { 'X-Requested-With': 'XMLHttpRequest' }
})

Vue.config.productionTip = false
Vue.use(VueRouter)

// eslint-disable-next-line no-unused-vars
const app = new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
