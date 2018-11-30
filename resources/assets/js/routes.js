import  VueRouter from "vue-router";


let routes=[
    {
        path:'/',
        redirect:'/home'
    },
    {
        path:"/home",
        name:'home',
        component:require("./components/Home")
    },
    {
        path:"/theme",
        name:'theme',
        component:require("./components/Theme")
    },
    {
        path:"/list",
        name:'list',
        component:require("./components/List")
    },
    {
        path:"/user",
        name:'user',
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Userindex")
    },
    {
        path:"/user_detail",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Userdetail")
    },
    {
        path:"/user_order",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Userorder")
    },
    {
        path:"/user_order_detail",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Userorderdetail")
    },
    {
        path:"/user_address",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Useraddress")
    },
    {
        path:"/user_address_edit",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Useraddressedit")
    },
    {
        path:"/user_detail_edit",
        meta:{
            requireAuth:true
        },
        component:require("./components/user/Userdetailedit")
    },
    {
        path:"/login",
        component:require("./components/login/Login")
    },
    {
        path:"/register",
        component:require("./components/login/Register")
    },
    {
        path:'/recommend',
        name:'recommend',
        component:require('./components/Recommend')
    },
    {
        path:'/cart',
        name:'cart',
        component:require('./components/Cart')
    }

];

var router = new VueRouter({
    routes
})
router.beforeEach((to, from, next) => {
    if (to.meta.requireAuth) {  // 判断该路由是否需要登录权限
        var islogin = localStorage.islogin=="1"? true:false
        if (islogin) {  // 通过vuex state获取当前的token是否存在
            next();
        }
        else {
            next({path: '/login'})
        }
    }
    else {
        next();
    }
})
export default router;