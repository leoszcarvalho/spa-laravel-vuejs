require('./bootstrap');

window.Vue = require('vue');

Vue.component('form-component', require('./components/FormComponent.vue'));

Vue.component('my-users-component', require('./components/MyUsersComponent.vue'));
Vue.component('users-component', require('./components/UsersComponent.vue'));

const app = new Vue({
    el: '#app'
});
