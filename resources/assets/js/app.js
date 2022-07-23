require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
import App from './common.js';

window.App = App;

App.init();
