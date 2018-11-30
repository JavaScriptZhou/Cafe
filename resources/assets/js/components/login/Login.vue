<template class=" register">
    <div class="register">

        <div class="container">

            <div class="icon_cof">
                <img src="images/icon.png" alt="..." >
            </div>
            <div class="tab-content mytabcon clearfix re_page">
                <div class="col-md-12">
                    <div id="search" class="tab-pane">
                        <form>
                            <div class="form-group re_input">
                                <input type="email" class="inp form-control "  placeholder="email" v-model="email">
                            </div>
                            <div class="form-group last re_input">
                                <input type="password" class="inp form-control " placeholder="6位密码" v-model="password">
                            </div>
                            <button type="button" class="btn btn-two bk btn-lg btn-block" @click="login">登录</button>
                        </form>
                        <div class="register_login">
                            <a href="#" class="fl" @click>忘记密码?</a>
                            <router-link to="/register"><a href="" class="fr">立即注册</a></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <tab></tab>

    </div>




</template>

<script>
    export default {
        name: "login",
        data(){
            return{
                email:"",
                password:""
            }
        },
        created(){

        },
        methods:{
            login(){
                var loginData ={"email":this.email,"password":this.password};
                axios.post("/user/m_login",loginData).then(res=>{
                    console.log(res.data)
                    if(res.data.islogin){
                        console.log(res.data.user.name)
                        localStorage.islogin="1";
                        for(var key in res.data.user){
                            localStorage[key] = res.data.user[key];
                        }
                        this.$router.push("/user");

                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>