
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//require('./IbanCalculator');


//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    el: '#app'
});*/



$(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(1000);
});

$(document).ready(function() {
    $(".removeCuote").click(function(){
        Swal.fire({
            title: 'Esta segur que vols eliminar la cuota?',
            text: "No sera possible desfer aquesta acció!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.value) {
                $(".formRemoveCuote").submit();
                
            }
        })
    })
});

//NAVBAR BUTTON TOGGLE
$(document).ready(function () {

    $('.first-button').on('click', function () {
  
      $('.animated-icon1').toggleClass('open');
    });
});



