<template>
<div class="login-body d-flex justify-content-center align-items-center">

    <!-- This allert will show up when the user input the wrong username or password  -->
    <div class="alert bg-glass wrong-username-or-password">
        <i class="bi bi-info-circle me-2"></i> Wrong username or password
    </div>


    <div class="custom-bg-dark"></div>
    <!-- This is the actual form for loggin in  -->
    <form class="form bg-glass p-4" @submit.prevent="submitForm">
        <h4 class="text-light fw-normal text-center">Login</h4>
        <div>
            <label class="d-block text-light">
                Username: 
            </label>
            <input class="px-1 py-2 text-muted no-outline" type="text" placeholder="Mario" v-model="formData.name" required id="username">
        </div>

        <div class="input-group mb-2 mt-2">
            <label class="d-block text-light" >Password: </label>
            <input type="password" class="password no-outline text-muted" placeholder="supermario123" v-model="formData.password" required id="password">
            <i class="bi bi-eye me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc"></i>
            <i class="bi bi-eye-slash me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc"></i>
        </div>

        <p class="text-danger pt-0 pb-0" v-if="lessThan8Char">Password not less than 8 character long</p>
        <button class="btn btn-light mt-2" type="submit" @click="loginFunc">
            Login
        </button>
        <div class="container text-center mt-2">
            <p class="text-light">
                Didn't have an account? |
                <router-link to="/signup" class="">signup</router-link>
            </p>
        </div>
    </form>

    <Loading v-if="loading"/>
</div>
</template>

<script>
import Loading from '../Loading.vue';
import axios from "axios";
export default {
    name: "login",
    data() {
        return {
            toggleEye: false,
            formData: {
                name: "",
                password: "",
            },
            fetching: false,
            loading: false,
            lessThan8Char: false
        };
    },
    components: {
        Loading
    },
    methods: {
        toggleEyeFunc() {
            let passwordInput = document.getElementById("password");
            let eye = document.querySelector(".bi-eye");
            let eyeSlash = document.querySelector(".bi-eye-slash");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eye.style.display = "block";
                eyeSlash.style.display = "none";
            } else {
                passwordInput.type = "password";
                eye.style.display = "none";
                eyeSlash.style.display = "block";
            }
        },
        async loginFunc() {
            if(this.formData.name !== '' && this.formData.password !== ''){
            if(this.formData.password.length < 8){
            this.lessThan8Char = true
                return 0;
            }
                this.loading = true;
            

        //    this.getToken();
        //     const crfToken = document
        //         .querySelector('meta[name="csrf-token"]')
        //         .getAttribute("content");


            try {
                const res = await axios.post("http://127.0.0.1:8000/login", {
                    name: this.formData.name,
                    password: this.formData.password
                }, {
                    headers: {
                        // 'X-CSRF-TOKEN': crfToken
                    },
                    withCredentials: true
                });
                const userId = await res.data.user.id;
                // axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
                this.$router.push({
                    name: 'dashboard',
                    params: {
                        id: userId
                    }
                });
            this.loading = false;
            } catch (err) {
                console.log("Error while posting data" + err);
                this.animateWrongUsernameOrPasswordAlert();
            this.loading = false;
            }
            }else{
                // Do nothing hehe 
            }
        },
        // async getToken() {
        //     await fetch("/sanctum/csrf-cookie", {
        //         method: "GET",
        //         credentials: "include",
        //     });
        // },
        animateWrongUsernameOrPasswordAlert() {
            let currentAlert = document.querySelector('.wrong-username-or-password')
            currentAlert.style.right = '3%'

            setTimeout(() => {
                currentAlert.style.right = '-100%'
            }, 3000)
        }
    },
};
</script>

<style scoped>
.login-body {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: url('../../../images/bg1.jpg');
    background-size: cover;
    background-position: center;
    z-index: 1;
}
.form{
    z-index: 3;
}
.form .input-group input {
    z-index: 1;
}

.form .input-group .bi-eye,
.form .input-group .bi-eye-slash {
    position: absolute;
    right: 0;
    z-index: 3;
}

.input-group .bi-eye {
    display: none;
}

.form .btn {
    position: relative;
    width: 100%;
    margin-top: 0.5rem;
}

.wrong-username-or-password {
    position: absolute;
    top: 5%;
    right: -100%;
    transition: 1s;
}
form #username{
    position: relative;
    width: 100%;
    margin-bottom: .5rem;
    background: transparent;
    border-top: 0;
    border-bottom: 1px solid #fff;
    border-left: 0;
    border-right: 0;
}

form #password{
    position: relative;
    width: 100%;
    margin-bottom: .5rem;
    background: transparent;
    border-top: 0;
    border-bottom: 1px solid #fff;
    border-left: 0;
    border-right: 0;
}
</style>
