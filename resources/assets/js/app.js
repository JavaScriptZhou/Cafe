
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');


import VueRouter from 'vue-router';


import Vant from 'vant';
import 'vant/lib/index.css';
Vue.use(Vant);


Vue.use(VueRouter);

//导入 router 路由配置文件
import router from './routes.js';


//在vue  注册   vue-awesome-swiper插件
require('swiper/dist/css/swiper.css');
import VueAwesomeSwiper from 'vue-awesome-swiper'
Vue.use(VueAwesomeSwiper);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('tab',require('./components/Tab'));

Vue.component('top', require('./components/TopTap.vue'));
const app = new Vue({
    el: '#app',
    router,
});


