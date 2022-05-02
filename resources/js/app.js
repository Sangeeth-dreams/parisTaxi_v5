
require('./bootstrap');

// main.js
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import swal from 'sweetalert2';
window.Swal = swal;


import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)


Vue.use(VueSweetalert2);

window.Vue = require('vue').default;
import VueRouter from "vue-router";
Vue.use(VueRouter)



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('one-vue', require('./components/One.vue'));


import Dashboard from './components/admins/Dashboard'
import Admins from './components/admins/Admins.vue'
// import TourCategories from './components/admins/TourCategories.vue'
import Places from './components/admins/Places.vue'
import PassengerCategories from './components/admins/PassengerCategories.vue'
// import TourSubCategories from './components/admins/TourSubCategories.vue'
import Rates from './components/admins/Rates.vue'
import Tours from './components/admins/Tours.vue'
import OtherReservations from './components/admins/OtherReservations.vue'
import Faq from './components/admins/Faq.vue'
import ExcursionTourCategories from './components/admins/ExcursionTourCategories.vue'
import ExcursionTourRates from './components/admins/ExcursionTourRates.vue'
import ExcursionTours from './components/admins/ExcursionTours.vue'

import CreateUser from './components/pages/CreateUser'


const routes = [

    //admin routes
    { path:'/home', component:Dashboard},     //dashboard

    { path: '/admin/admin-users', component : Admins},  //to load admin page
   
    // {path:'/admin/tourCategories',component : TourCategories},//tour Catogaries
    
    {path:'/admin/places',component : Places}, //tour Catogaries

    {path:'/admin/passengerCategories',component : PassengerCategories},//passenger Catogaries

    // {path:'/admin/tourSubCategories',component : TourSubCategories},//tour sub Catogaries

    {path:'/admin/rates',component : Rates},//tour sub Catogaries
    
    {path:'/admin/tours',component : Tours},//tours 

    {path:'/admin/otherReservations',component : OtherReservations},//tours 
    
    {path:'/admin/faq',component : Faq},//tours 

    {path:'/admin/excursionTourCategories',component : ExcursionTourCategories},

    {path:'/admin/excursionTourRates',component : ExcursionTourRates},

    {path:'/admin/excursionTours',component : ExcursionTours},
    

  ];


const router = new VueRouter({
    mode:'history',
    routes,
})


const app = new Vue({
    el: '#app',
    router,
    components:{
        CreateUser,
        Dashboard,

    },

    mounted() {
        console.log('mounted');
      }
});
