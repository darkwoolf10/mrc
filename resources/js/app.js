
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
        },
        components: {
            Datepicker
        },
        mounted() {
            $('#birthday').addClass('form-control');
        },
    });

    const comments = new Vue({
        el: '#comments',
        date: {}
    })
}