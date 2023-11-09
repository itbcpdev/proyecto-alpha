/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-page', require('./modules/home/PrincipalPage.vue').default);
Vue.component('payment', require('./modules/Payment/components/SuscriptionPage.vue').default);
Vue.component('recomendation-pago', require('./modules/recomendationpago/components/RecomendationResultPago.vue').default);
Vue.component('my-look', require('./modules/mylook/components/MyLookPage.vue').default);
Vue.component('guardarropa', require('./modules/guardarropa/components/guardarropaPage.vue').default);
Vue.component('guardarropaguardado', require('./modules/guardarropaguardado/components/guardarropaguardadoPage.vue').default);
Vue.component('recomendation-look-premium', require('./modules/recomendation/premium/Look.vue').default);
Vue.component('profile', require('./modules/profile/components/profilePage.vue').default);
Vue.component('test-subcription', require('./modules/subscription/components/subscriptionPage.vue').default);
Vue.component('login-page', require('./modules/login/Login.vue').default);
Vue.component('editar-respuesta', require('./modules/profile/components/editarRespuestaPage.vue').default);
Vue.component('editar-datos', require('./modules/profile/components/editarDatosPage.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
