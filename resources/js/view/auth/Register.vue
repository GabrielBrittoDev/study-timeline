<template>
    <v-container>
            <v-col
                class="mt-10 login-col"
                lg="6"
            >
                <h2 class="text-center">Cadastro</h2>
                <v-form
                    ref="form"
                    @submit.prevent="register"
                >
                    <v-text-field
                        v-model="form.name"
                        label="Nome"
                        :rules="[rules.name]"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.email"
                        label="E-mail"
                        type="email"
                        :rules="[rules.email]"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.username"
                        label="Usuário"
                        :rules="[rules.username]"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        label="Senha"
                        :rules="[rules.password]"
                        :append-icon="show ? mdiEye : mdiEyeOff"
                        :type="show ? 'text' : 'password'"
                        @click:append="show = !show"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password_confirm"
                        label="Confirmar senha"
                        :rules="[rules.password_confirm]"
                        :append-icon="show ? mdiEye : mdiEyeOff"
                        :type="show ? 'text' : 'password'"
                        @click:append="show = !show"
                    ></v-text-field>
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            type="submit"
                        >
                            Cadastrar
                        </v-btn>
                </v-form>
            </v-col>
    </v-container>
</template>

<script>
import { mdiEye, mdiEyeOff } from '@mdi/js';
import axios from 'axios';
import {maxLength, minLength, required, equals,email, validate} from "../../validation/Validator";

export default {
    name: "Register",
    data(){
      return {
          form: {
              name: '',
              email: '',
              username: '',
              password: '',
              password_confirm: '',
          },
          rules: {
              name : v => validate([required(v), maxLength(v, 200) ,minLength(v, 3)]),
              username : v => validate([required(v), maxLength(v, 20) ,minLength(v, 3)]),
              email: v => validate([required(v), email(v)]),
              password: v => validate([required(v), minLength(v, 8), maxLength(v, 25)]),
              password_confirm: v => validate([equals(v, this.form.password, 'Senhas não conferem')])
          },
          show: false,
          mdiEye,
          mdiEyeOff
      }
    },
    methods: {
        register(){
            if (this.$refs.form.validate()){
                axios.post(`${this.$url}/register`, this.form)
                    .then(r => {
                        this.$toastr.s('Usuário cadastrado com sucesso', 'Sucesso!');
                        window.location.href = this.$url + '/home';
                    })
                    .catch(err => {
                        let errors = Object.values(err.response.data.errors);
                        errors.forEach(e => this.$toastr.e(e));
                    })
            }
        }
    }
}
</script>

<style scoped>

</style>
