<template>
    <div class="user_address_edit">
        <top></top>
    <form action="" class="myform">
        <ul class="list-group user-list">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        联系人
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <input type="text" class="myinput" />
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        性别
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <div class="radio myradio">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 先生
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 女士
                            </label>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        手机号码
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <input type="text" class="myinput" />
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        地址
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <input type="text" class="myinput" />
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        门牌号
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <input type="text" class="myinput" />
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 col-xs-4">
                        标签
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <span class="label label-default myspan">公司</span><span class="label label-default myspan">学校</span><span class="label label-default myspan">家</span>
                    </div>
                </div>
            </li>
        </ul>
    </form>

    <button class="btn mybtn">保存</button>
    </div>
</template>

<script>
    export default {
        name: "Useraddressedit"
    }
</script>

<style scoped>
    body {
        width: 100%;
        height: 100%;
        background-color: #EEEEEE;
    }
    .user_address_edit{
        padding: 1rem 0 1.15rem;
    }
    .myradio {
        margin: 0;
    }

    .myinput {
        width: 70%;
        border-style: none;
        outline-style: none;
        border: none;
    }

    .mybtn{
        display: block;
        margin: 0 auto;
        width: 80%;
        font-size: 14px;
        background-color: /*#4190a7;*/#705252;
        color: white;
        border-radius: 3px;
        margin-top:1rem;

    }

    .myspan {
        margin-right: 5px;
        padding: .2em .6em 0.1rem;
    }
</style>