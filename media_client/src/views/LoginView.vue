<template>
    <div class="login" style="min-height: 70vh;">
        <div class="container col-lg-3 col-sm-12 shadow rounded p-5 my-5">
            <div class="alert alert-danger" role="alert" v-if="userDataStatus">
                The credentials do not match!
            </div>

            <div class="my-3">
                <h3 class="text-center">Login Form</h3>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" v-model="userData.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" v-model="userData.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            
            <button type="button" @click="accountLogin()" class="btn btn-primary p-3">Login</button>
        </div>
    </div>
    <!-- <button class="btn btn-dark" @click="check()">Check</button> -->
</template>

<script>
import axios from "axios";
import { mapGetters } from 'vuex'

    export default {
        name: "LoginView",
        data() {
            return {
               userData: {
                email: '',
                password: ''
                },
               userDataStatus: false 
            }
        },

        computed: {
            ...mapGetters(['getToken','getUserAcc']),
        },

        methods: {
            accountLogin() {
                
                axios.post("http://127.0.0.1:8000/api/user/login", this.userData)
                .then((response) => {
                    
                    if (response.data.token != null) {
                        
                        this.$store.dispatch('setToken', response.data.token);
                        this.$store.dispatch('setUserAcc', response.data.user);
                        localStorage.setItem('token', response.data.token);
                        localStorage.setItem('userAcc', JSON.stringify(response.data.user));                       

                        this.$router.push({
                            name: 'home'
                        });

                    } else {                        
                        this.userDataStatus = true;
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
            },

            check() {
                console.log(this.getToken);
                console.log(this.getUserAcc);
            }
        },
    }
</script>
