
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
import VModal from 'vue-js-modal';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VModal, {componentName: 'hello-modal'});

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('comment-component', require('./components/CommentComponent.vue'));
Vue.component('stat-component', require('./components/StatComponent.vue'));

window.onload = function () {
    const app = new Vue({
        el: '#app',
        data: {
        },
        methods: {
            show () {
                this.$modal.show('hello-world');
            },
            hide () {
                this.$modal.hide('hello-world');
            },
            beforeOpen (event) {
                console.log("run modal window");
            }
        },
        components: {
            Datepicker
        },
        mounted() {
            $('meta[name="csrf-token"]').attr('content');
            $('#birthday').addClass('form-control');
        },
    });
};