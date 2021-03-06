import 'babel-polyfill'

import VueRouter from 'vue-router'
import Home from './components/Home.vue'
import Navigation from './components/Navigation.vue'
import Hero from './components/Hero.vue'
import Card from './components/Card.vue'
import CardExpanded from './components/CardExpanded.vue'
import Bottom from './components/Bottom.vue'
import Partners from './components/Partners.vue'
import AppsCtas from './components/AppsCtas.vue'

require('./bootstrap')

window.Vue = require('vue')
Vue.component('navigation', Navigation)
Vue.component('hero', Hero)
Vue.component('card', Card)
Vue.component('bottom', Bottom)
Vue.component('partners', Partners)
Vue.component('apps-ctas', AppsCtas)

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { name: 'item', path: '/:type/:id', component: CardExpanded, props: true },
]

const router = new VueRouter({
  routes
})

router.beforeEach((to, from, next) => {
  if (to.params.title) {
    //document.title = to.params.title
  }
  console.log(to)
  next()
})

const app = new Vue({
  router
}).$mount('#app')
