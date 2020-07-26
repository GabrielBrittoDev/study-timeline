/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import vuetify from './vuetify'
import VuetifyConfirm from 'vuetify-confirm'
import VueToastr from "vue-toastr";


require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Timeline.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VuetifyConfirm, { vuetify,
    buttonTrueText: 'Sim',
    buttonFalseText: 'Não'
});
Vue.use(VueToastr, {});

Vue.component('timeline', require('./components/Timeline.vue').default);
Vue.component('user_timeline', require('./pages/UserTimeline.vue').default);
Vue.component('dialog-form', require('./components/DialogForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
let meta = document.querySelector("meta[name='user_id']");
if (meta){
    Vue.prototype.$userId = Number(meta.getAttribute('content'));
}

const app = new Vue({
    vuetify,
    el: '#app',
});
