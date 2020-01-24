/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//import router from './routes.js'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('my-button', require('./components/MyButton.vue').default);
Vue.component('wepage', require('./components/WEPage.vue').default);
Vue.component('staffprofilepage', require('./components/StaffProfilePage.vue').default);
Vue.component('staffachievementspage', require('./components/StaffAchievementsPage.vue').default);
Vue.component('index', require('./components/Index.vue').default);
Vue.component('staffpassword', require('./components/StaffPassword.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
