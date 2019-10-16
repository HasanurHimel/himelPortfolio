
require('./bootstrap');
window.Vue = require('vue');




import {Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';
import Swal from 'sweetalert2';
window.Swal=Swal;
window.Fire=new Vue();

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast=Toast;

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '10px'
});

Window.Form= Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router'

Vue.use(VueRouter);




let routes = [
    { path: '/seo', component: require('./components/seo.vue').default },
    { path: '/banner', component: require('./components/banner.vue').default },
    { path: '/designation', component: require('./components/designation.vue').default },
    { path: '/objective', component: require('./components/objective.vue').default },
    { path: '/about', component: require('./components/about.vue').default },
    { path: '/skill', component: require('./components/skill.vue').default },
    { path: '/experience', component: require('./components/experience.vue').default },
    { path: '/animation', component: require('./components/animation.vue').default },
    { path: '/offer', component: require('./components/offer.vue').default },
    { path: '/portfolio', component: require('./components/portfolio.vue').default },
    { path: '/testimonial', component: require('./components/testimonial.vue').default },
    { path: '/contact', component: require('./components/contact.vue').default },
    { path: '/brand', component: require('./components/brand.vue').default },

];


const router = new VueRouter({
    mode: 'history',
    routes
});



// Vue.component(
//     'passport-clients',
//     require('./components/passport/Clients.vue').default
// );
//
// Vue.component(
//     'passport-authorized-clients',
//     require('./components/passport/AuthorizedClients.vue').default
// );
//
// Vue.component(
//     'passport-personal-access-tokens',
//     require('./components/passport/PersonalAccessTokens.vue').default
// );
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('message', require('./components/message.vue').default);


const app = new Vue({
    router,
    el: '#app'


});
