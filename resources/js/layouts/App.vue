<template>
    <div>
        <header>
            <nav class="d-flex pa-10">
                <div>
                    <h1>Chronology</h1>
                </div>
                <v-flex class="navbar" style="right: 5px; position: absolute">
                    <div v-if="!username">
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            :href="this.$url + '/login'"
                        >
                            Login
                        </v-btn>
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            href="/register"
                        >
                            Register
                        </v-btn>
                    </div>
                    <div v-else>
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            href="/home"
                        >
                            Home
                        </v-btn>
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            :href="username"
                        >
                            Perfil
                        </v-btn>
                        <v-btn
                            class="font-weight-bold"
                            outlined
                            color="#1976d2"
                            @click="logout"
                        >
                            Sair
                        </v-btn>
                    </div>
                </v-flex>
            </nav>
        </header>

        <main id="page-container">
            <slot></slot>
        </main>

        <footer id="footer">
            <div class="text-center d-block mt-10">
                <p> Esse website tem fins apenas educativos e para a comuninade</p>
                <p>Feito com <v-icon color="red">{{ mdiHeart }}</v-icon> por "Magin02"</p>
            </div>
        </footer>
    </div>
</template>



<script>
import axios from 'axios';
import { mdiHeart } from '@mdi/js';

export default {
    name: "App",
    props: {
        username: String,
    },
    data: () => ({
        mdiHeart
    }),
    methods: {
        logout(){
            axios.post(this.$url + '/logout', {}).
            then(response => {
                window.location.href += 'login';
            })
        }
    }
}
</script>

<style>
#app {
    font-family: Source Sans Pro, Arial, sans-serif;
}
#page-container {
    position: relative;
    min-height: 100vh;
    padding-bottom: 2.5rem;    /* Footer height */

}
#footer {
    padding-top: 40px;
    padding-bottom: 10px;
}

#footer p{
    font-size: 12px;
}
</style>
