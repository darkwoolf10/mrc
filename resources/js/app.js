
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Include Jquery
 */
import $ from 'jquery';
window.$ = window.jQuery = $;

window.Vue = require('vue');

import Datepicker from 'vuejs-datepicker';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
window.onload = function () {
    const app = new Vue({
        el: '#app',
        data: {
        },
        methods: {
            calculateAge: function(dob) { // birthday is a date
                var diff_ms = Date.now() - dob.getTime();
                var age_dt = new Date(diff_ms);
                return Math.abs(age_dt.getUTCFullYear() - 1970);
            }
        },
        components: {
            Datepicker
        },
        mounted() {
            $('#birthday').addClass('form-control');
        },
    });
}