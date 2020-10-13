<template>
    <div class="main">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email" v-model="email">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" v-model="password" placeholder="password">
                        </div>
                        <div v-if="false" class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input @click.prevent="login" type="submit" value="Login" class="btn float-right login_btn">
                            <input @click.prevent="test" type="submit" value="Test" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Auth from "../models/Auth";

    export default {
        data () {
            return {
                email: '',
                password: ''
            }
        },

        methods: {
            login() {
                Auth.login(this.email, this.password);
            },

            test() {
                axios.get('/api/user').then(response => {
                    console.log(response);
                });
            }
        }
    }
</script>


<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    .main{
        background-image: url('http://getwallpapers.com/wallpaper/full/0/c/5/1306053-night-sky-wallpaper-1920x1200-picture.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        font-family: 'Numans', sans-serif;
        align-content: center;
        margin: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100%;
    }

    .card{
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0,0,0,0.5) !important;
    }

    .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover{
        color: white;
        cursor: pointer;
    }

    .card-header h3{
        color: white;
    }

    .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
    }

    .input-group-prepend span{
        width: 50px;
        background-color: #FFC312;
        color: black;
        border:0 !important;
    }

    input:focus{
        box-shadow: 0 0 0 0 !important;

    }

    .remember{
        color: white;
    }

    .remember input
    {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn{
        color: black;
        background-color: #FFC312 !important;
        width: 100px;
    }

    .login_btn:hover{
        color: black;
        background-color: white  !important;
    }

    .links{
        color: white;
    }

    .links a{
        margin-left: 4px;
    }
</style>
