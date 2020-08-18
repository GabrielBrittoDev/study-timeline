<template>
    <div>
        <header>
            <nav class="d-flex pa-10">
                <div>
                    <h1>Chronology</h1>
                </div>
                <v-flex class="navbar" style="right: 5px; position: absolute">
                    <div class="hidden-sm-and-down">
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
                                color="#D1342D"
                                @click="logout"
                            >
                                Sair
                            </v-btn>

                        </div>
                    </div>
                    <v-btn
                        class="font-weight-bold hidden-md-and-up"
                        outlined
                        color="#1976d2"
                        @click.stop="drawer = !drawer"
                    >
                        <v-icon>{{mdiApps}}</v-icon>
                    </v-btn>
                </v-flex>
            </nav>


        </header>
        <v-navigation-drawer
            v-model="drawer"
            absolute
            right
            temporary
        >
            <v-list-item>

                <v-list-item-content>
                    <v-list-item-title><h1>Chronology</h1></v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>
            <v-list dense>

                <div v-if="!username">
                    <v-list-item>
                        <v-list-item-content>
                            <v-btn
                                class="font-weight-bold"
                                outlined
                                color="#1976d2"
                                :href="this.$url + '/login'"
                            >
                                Login
                            </v-btn>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>
                            <v-btn
                                class="font-weight-bold"
                                outlined
                                color="#1976d2"
                                :href="this.$url + '/login'"
                            >
                                Register
                            </v-btn>
                        </v-list-item-content>
                    </v-list-item>
                </div>
                <div v-else>
                    <v-list-item>
                        <v-list-item-content>
                            <v-btn
                                class="font-weight-bold"
                                outlined
                                color="#1976d2"
                                href="/home"
                            >
                                Home
                            </v-btn>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>
                            <v-btn
                                class="font-weight-bold"
                                outlined
                                color="#1976d2"
                                :href="username"
                            >
                                Perfil
                            </v-btn>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item>
                        <v-list-item-content>
                            <v-btn
                                class="font-weight-bold"
                                outlined
                                color="#D1342D"
                                @click="logout"
                            >
                                Sair
                            </v-btn>
                        </v-list-item-content>
                    </v-list-item>
                </div>
            </v-list>
        </v-navigation-drawer>
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
import { mdiHeart, mdiApps } from '@mdi/js';

export default {
    name: "App",
    props: {
        username: String,
    },
    data: () => ({
        mdiHeart,
        mdiApps,
        drawer: false,
        items: [
            { title: 'Home', icon: 'dashboard' },
            { title: 'About', icon: 'question_answer' },
        ],
    }),
    methods: {
        logout(){
            axios.post(this.$url + '/logout', {}).
            then(response => {
                window.location.href = this.$url + '/login';
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
