<template>
<div class="login-body d-flex justify-content-center align-items-center">

    <div class="custom-bg-dark"></div>
    <form @submit.prevent="submitForm" class="form bg-glass p-4">
        <h4 class="text-dark fw-normal text-center">Signup</h4>

        <div>
            <label class="d-block">Email:</label>
            <input type="email" class="email no-outline text-muted" placeholder="mario4545@gmail.com" v-model="email" required>
        </div>
       
        <div>
            <label class="d-block">Username:</label>
            <input type="text" class="username no-outline text-muted" placeholder="Mario" v-model="username" required>
        </div>

        <div class="input-group mb-2 mt-2">
            <label class="d-block" >Password: </label>
            <input type="password" class="password no-outline text-muted" placeholder="supermario123" v-model="password" required id="password">
            <i class="bi bi-eye me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc"></i>
            <i class="bi bi-eye-slash me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc"></i>
        </div>

        <p class="text-danger mt-0 mb-1" v-if="passwordNotLessThan8Char">Password not less than 8 character</p>

        <div class="input-group mb-3 mt-2">
            <label class="d-block" >Confirm password: </label>
            <input type="password" class="password no-outline text-muted" placeholder="supermario123" aria-label="confirm password" aria-describedby="basic-addon1" id="confirmPassword" v-model="confirmPassword" required>
            <i class="bi bi-eye eye2 me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc2"></i>
            <i class="bi bi-eye-slash eye-close2 me-2 pt-1 pointer hover mt-2" @click="toggleEyeFunc2"></i>
        </div>

        <p class="text-danger mt-0 mb-1" v-if="ConfirmPasswordNotLessThan8Char">Password not less than 8 character</p>

        <button class="btn btn-light" @click="submitForm">Signup</button>

        <div class="container text-center mt-2">
            <p class="text-dark">Already have an account? | <router-link to="/login" class="text-">login</router-link>
            </p>
        </div>

    </form>


    <!-- This is execute when preparing the signup  -->
    <Loading v-if="loading" />
</div>
</template>

        
<script>
import Loading from '../Loading.vue';
export default {
    name: 'signup',
    data() {
        return {
            toggleEye: false,
            email: '',
            username: '',
            password: '',
            confirmPassword: '',
            passwordNotLessThan8Char: false,
            ConfirmPasswordNotLessThan8Char: false,
            loading: false
        }
    },
    components: {
        Loading
    },
    methods: {
        toggleEyeFunc() {
            let passwordInput = document.getElementById('password')
            let eye = document.querySelector('.bi-eye')
            let eyeSlash = document.querySelector('.bi-eye-slash')

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'
                eye.style.display = 'block'
                eyeSlash.style.display = 'none'
            } else {
                passwordInput.type = 'password'
                eye.style.display = 'none'
                eyeSlash.style.display = 'block'
            }
        },

        toggleEyeFunc2() {
            let passwordInput = document.getElementById('confirmPassword')
            let eye = document.querySelector('.eye2')
            let eyeSlash = document.querySelector('.eye-close2')

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'
                eye.style.display = 'block'
                eyeSlash.style.display = 'none'
            } else {
                passwordInput.type = 'password'
                eye.style.display = 'none'
                eyeSlash.style.display = 'block'
            }
        },
        async submitForm() {
            const data = {
                email: this.email,
                name: this.username,
                password: this.password
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            if (!csrfToken) {
                console.error('CSRF token not found');
                return;
            } else {
                console.log('CSRF FOUND');
            }

           if(this.password.length < 8){
            this.passwordNotLessThan8Char = true;
            return 0;
           }else if(this.password.length > 8){
            this.passwordNotLessThan8Char = false;
            return 0;
           }else if(this.confirmPassword.length < 8){
            this.ConfirmPasswordNotLessThan8Char = true;
            return 0;
           }else if(this.confirmPassword.length > 8){
            this.ConfirmPasswordNotLessThan8Char = false;
            alert('ueu')
            return 0;
           }else if(this.password !== this.confirmPassword){
            alert('password did not match')
            return 0;
           }


            this.loading = true;

            try {
                const res = await fetch('http://127.0.0.1:8000/signup', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(data)
                });
                if (!res.ok) {
                    if (res.headers.get('content-type').includes('text/html')) {
                        const text = await res.text();
                        console.error('Received HTML response instead of JSON:', text);
                    }
                    throw new Error('Network response was not ok');
                }

                const fetchData = await res.json();
                console.log('Signup successfully', fetchData);
                this.loading = false;
                this.$router.push('/login');
            
            } catch (err) {
                console.log('An Error Occurred ' + err);
                this.loading = false;
            } finally {
                this.loading = false;
            }
                    }
                    }
                }

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
    margin-top: .5rem;
}

form .email, form .username, form .password{
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
