import VueRouter from 'vue-router'
import Home from './components/Home.vue';
import Navigation from './components/Navigation.vue';
import Card from './components/Card.vue';
import CardExpanded from './components/CardExpanded.vue';
import Highlights from './components/Highlights.vue';
import ProTips from './components/ProTips.vue';

require('./bootstrap');

window.Vue = require('vue');
Vue.component('navigation', Navigation);
Vue.component('card', Card);

Vue.use(VueRouter);

const routes = [
  { path: '/', component: Home },
  { name: 'entry', path: '/:type/:id', component: CardExpanded, props: true },
  { path: '/highlights', component: Highlights },
  { path: '/pro-tips', component: ProTips },
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app')
