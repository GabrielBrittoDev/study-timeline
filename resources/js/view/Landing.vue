<template>
    <v-app>
        <nav class="d-flex pa-10">
            <div>
                <h1>Afrek</h1>
            </div>
            <v-flex class="navbar" style="right: 5px; position: absolute">
                <v-btn
                    class="font-weight-bold"
                    outlined
                    bold
                    color="#1976d2"
                >
                    Home
                </v-btn>
                <v-btn
                    class="font-weight-bold"
                    outlined
                    color="#1976d2"
                >
                    Perfil
                </v-btn>
                <v-btn
                    class="font-weight-bold"
                    outlined
                    color="#1976d2"
                >
                    Sair
                </v-btn>
            </v-flex>
        </nav>


        <v-container>
            <section data-aos="fade-up">
                <h1 class="text-center">
                    Afrek
                </h1>
                <div class="mx-10">
                    <p class="mx-10">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                </div>
            </section>

            <section data-aos="fade-up">
                <h1 class="text-center">Como funciona</h1>
                <div class="mx-10">
                    <p class="mx-10">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                </div>
            </section>

            <section data-aos="fade-up">
                <h1 class="text-center">
                    Objetivo
                </h1>
                <div class="mx-10">
                    <p class="mx-10">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                </div>
            </section>
        </v-container>



        <footer class="text-center d-block mt-10">
            <p> Esse website tem fins apenas educativos para a comuninade</p>
            <p>Feito com <v-icon color="red">mdi-heart</v-icon> por "Magin02"</p>
        </footer>
    </v-app>
</template>

<script>
    export default {
        name: "Landing",
    }
</script>

<style scoped>
 #app {
     font-family: Source Sans Pro, Arial, sans-serif;
 }
    p , h1{
        text-align: center;
    }
    h1 {
        font-size: 35px;
    }
    p{
        font-size: 25px;
    }
    section{
        margin: 150px 200px 0 200px;
    }
</style>
