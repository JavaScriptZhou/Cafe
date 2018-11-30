<template>
    <div class="header">
        <a @click="goBack" class="left_icon"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <span>返回</span>
    </div>
</template>

<script>
    export default {
        name: "TopTap",

        methods:{
            goBack(){
                // console.log(this.$route);
                if(this.$route.path == '/recommend'){
                    this.$router.push('/theme');
                }else {
                    window.history.go(-1);
                }

            }
        }
    }
</script>

<style scoped>
    .header{
        height: 1rem;
        width: 100%;
        background-color:#000;
        color: white;
        position:fixed;
        top: 0;
        left: 0;
        z-index: 20;
        display: flex;
    }
    .header a{
        color:white;
    }

    .left_icon{
        line-height: 1rem;
        padding-left:0.2rem;
        margin-right:0.2rem;
    }
    .header span{
        width: 80%;
        flex: 1;
        line-height: 1rem;
        text-align: left;
    }
    .search_icon{
        line-height: 1rem;
        margin-right:0.4rem;
    }
</style>