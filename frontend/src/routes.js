import VueRouter from 'vue-router'

const routes = [
  {
    path: '/',
    component: require('./components/pages/HomePage.vue').default
  },
  {
    path: '/landlord',
    component: require('./components/pages/LandlordSignup.vue').default
  },
  {
    path: '/admin',
    component: require('./components/pages/AdminPanel.vue').default
  },
  {
    path: '*',
    component: require('./components/pages/NotFound.vue').default
  }
]

const router = new VueRouter({
  mode: 'history',
  routes,
  linkActiveClass: 'active'
})

export default router
