/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('event-list-component', require('./components/EventList.vue').default);

Vue.component('user-event-list-component', require('./components/UserEventList.vue').default);

Vue.component('member-list-component', require('./components/MemberList').default);

const app = new Vue({
    el: '#app',
});
