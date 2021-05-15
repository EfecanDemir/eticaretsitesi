
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
$.ajaxSetup({
    headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});

$('.urun-adet-artir,.urun-adet-azalt').on('click',function (){
    var id=$(this).attr('data-id');
    var adet=$(this).attr('data-adet');
   $.ajax({
       type:'PATCH',
       url:'/sepet/guncelle/'+id,
       data:{adet:adet},
       success:function (result){
           window.location.href='/sepet';
       }
   });
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
