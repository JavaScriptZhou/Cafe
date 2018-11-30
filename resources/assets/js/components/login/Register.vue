<template>
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
                                <input type="text" class="inp form-control "  placeholder="请输入用户名" v-model="name">
                            </div>
                            <div class="form-group re_input">
                                <input type="email" class="inp form-control " id="exampleInputEmail1" placeholder="email" v-model="email">
                            </div>
                            <!--<div class="form-group re_input">
                                <input type="text" class="inp form-control btns" id="exampleInputEmail1" placeholder="6位验证码">
                                <input type="button" class="button code" value="获取验证码">
                            </div>-->
                            <div class="form-group last re_input">
                                <input type="password" class="inp form-control " placeholder="6位密码" v-model="password">
                            </div>
                            <button type="button" class="btn btn-two bk btn-lg btn-block" @click="register">注册</button>
                        </form>
                        <div class="register_login">
                            <p>登录即代表同意咖啡的《用户使用协议》</p>
                            <router-link to="/login">已有账户，马上登陆 </router-link>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "register",
        data(){
            return {
                name:"",
                email:"",
                password:"",
            }
        },
        methods:{
            register(){
                var register_data = {"name":this.name,"email":this.email,"password":this.password};
                axios.post("/user/m_register",register_data).then(res=>{
                    console.log(res.data)
                    if(res.data=="ok"){
                        this.$router.push("/login")
                    }
                })
            }

        }
    }
</script>

<style scoped>





</style>