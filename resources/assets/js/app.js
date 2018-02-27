import VueRouter from 'vue-router'
import Home from './components/Home.vue';
import Navigation from './components/Navigation.vue';
import Hero from './components/Hero.vue';
import Card from './components/Card.vue';
import CardExpanded from './components/CardExpanded.vue';

require('./bootstrap');

window.Vue = require('vue');
Vue.component('navigation', Navigation);
Vue.component('hero', Hero);
Vue.component('card', Card);

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { name: 'item', path: '/:type/:id', component: CardExpanded, props: true },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app')
