<template>
        <v-container>
            <section data-aos="fade-up">
                <h1 class="text-center">
                    Chronology
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

</template>

<script>
    import axios from 'axios';
    export default {
        name: "Landing",
        props: {
            username: String,
        },
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
p , h1{
    text-align: center;
}
footer p{
    font-size: 12px;
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
