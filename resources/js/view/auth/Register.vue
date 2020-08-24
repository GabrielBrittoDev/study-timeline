<template>
    <v-container>
            <v-col
                class="mt-10 login-col"
                lg="6"
            >
                <h2 class="text-center">Cadastro</h2>
                <v-form
                    @submit.prevent="register"
                >
                    <v-text-field
                        v-model="form.name"
                        label="Nome"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.email"
                        label="E-mail"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.username"
                        label="Usuário"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        label="Senha"
                        :append-icon="show ? mdiEye : mdiEyeOff"
                        :type="show ? 'text' : 'password'"
                        @click:append="show = !show"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password_confirm"
                        label="Confirmar senha"
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

export default {
    name: "Register",
    data(){
      return {
          show: false,
          form: {
              name: 'Gabriel Leal',
              email: 'a@a.com',
              username: 'Magin03',
              password: '123456789',
              password_confirm: '123456789',
          },
          mdiEye,
          mdiEyeOff
      }
    },
    methods: {
        register(){
            axios.post(`${this.$url}/register`, this.form)
            .then(r => {
                this.$toastr.s(r.data.message, 'Sucesso!');
                window.location.href = this.$url + '/home';
            })
            .catch(err => {
                let errors = Object.values(err.response.data.errors);
                errors.forEach(e => this.$toastr.e(e));
            })
        }
    }
}
</script>

<style scoped>

</style>
