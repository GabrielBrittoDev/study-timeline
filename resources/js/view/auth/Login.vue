<template>
    <v-container>
        <v-col
            class="mt-10 login-col"
            lg="6"
        >
            <h2 class="text-center">Login</h2>
            <v-form
                @submit.prevent="login"
            >
                <v-text-field
                    label="E-mail/Usuario"
                    v-model="form.email"
                ></v-text-field>
                <v-text-field
                    v-model="form.password"
                    label="Senha"
                    :append-icon="show ? mdiEye : mdiEyeOff"
                    :type="show ? 'text' : 'password'"
                    @click:append="show = !show"
                ></v-text-field>
                <div class="d-flex">
                <v-btn
                    class="font-weight-bold"
                    outlined
                    color="#1976d2"
                    type="submit"
                >
                    Login
                </v-btn>
                <v-checkbox
                    v-model="form.remember"
                    class="remember-me"
                    label="Lembrar-me"
                ></v-checkbox>
                </div>
            </v-form>
        </v-col>
    </v-container>
</template>

<script>
import axios from 'axios';
import { mdiEye, mdiEyeOff } from '@mdi/js';


    export default {
        name: 'Login',
        data(){
            return {
                show: false,
                mdiEye,
                mdiEyeOff,
                form: {
                    email: '',
                    password: '',
                    remember: false,
                }
            }
        },
        methods : {
            login(){
                axios.post(`${this.$url}/login`, this.form)
                    .then(r => {
                        this.$toastr.s(r.data.message, 'Sucesso!');
                        window.location.href = this.$url + '/home';
                    })
                    .catch(err => this.$toastr.e(err.response.data.message, 'Erro!'))
            }
        }
    }
</script>

<style>
    .login-col{
        margin: 0 auto;
    }
    .remember-me{
        position: absolute;
        right: 0;
        bottom: 1px;
    }
</style>
