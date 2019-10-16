
require('./frontend_bootstrap');
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

import VueRouter from 'vue-router'

Vue.use(VueRouter);




let routes = [
    // { path: '/seo', component: require('./components/seo.vue').default },

];


const router = new VueRouter({
    mode: 'history',
    routes
});


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('message', require('./components/message.vue').default);


const app = new Vue({
    router,
    el: '#frontend_app'


});
