<template>
    <div>
        <v-flex>
            <v-dialog v-model="dialog" max-width="600px">
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="primary"
                        dark
                        v-bind="attrs"
                        v-on="on"
                    >
                        Adicionar realização
                    </v-btn>
                </template>
                <v-card>
                    <v-card-title>
                        <span class="headline">Realização</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="6">
                                    <v-text-field v-model="achievement.title" label="Título*" required></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="6">
                                    <v-text-field v-model="achievement.subtitle" label="Subtitulo"></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-menu
                                        ref="menu"
                                        v-model="menu"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="290px"
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                v-model="dateFormatted"
                                                label="Data"
                                                hint="DD/MM/AAAA formato"
                                                persistent-hint
                                                append-icon="event"
                                                v-bind="attrs"
                                                @blur="achievement.date = parseDate(dateFormatted)"
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker v-model="achievement.date" no-title @input="menu = false"></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col cols="12">
                                    <v-textarea v-model="achievement.description" label="Descrição*"></v-textarea>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*Indicação um campo requerido</small>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="dialog = false">Fechar</v-btn>
                        <v-btn color="blue darken-1" text @click="create">Salvar</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-flex>

        <timeline
            :achievements="achievements"
            :format-date="formatDate"
        ></timeline>
    </div>
</template>

<script>
    import Timeline from "../components/Timeline";
    import axios from 'axios';
    export default {
        name: "UserTimeline",
        props: {
            achievements: Array,
        },
        components: {
            Timeline
        },
        data: () => ({
            dialog: false,
            achievement: {
                id: 0,
                title: '',
                subtitle: '',
                description: '',
                date: '',
            },
            menu: false,
            dateFormatted: ''
        }),
        methods: {
            save(){
                if (this.achievement.id !== 0){
                    this.create();
                }
            },
            create(){
                axios.post('http://localhost:8000/achievement/', this.achievement)
                .then((response) => {
                    this.achievements.push(response.data.achievement);
                })
                .catch((err) => console.log(err.response))
            },
            update(){

            },
            formatDate(date){
                if (!date) return null;

                const [year, month, day] = date.split('-');
                return `${day}/${month}/${year}`;
            },
            parseDate (date) {
                if (!date) return null;
                const [month, day, year] = date.split('/');
                return `${year}-${day.padStart(2, '0')}-${month.padStart(2, '0')}`
            },
        },
        watch: {
            'achievement.date': function (oldVal, newVal) {
                this.dateFormatted = this.formatDate(this.achievement.date);
            }
        },
        mounted(){
            console.log(this.achievements);
        }
    }
</script>

<style scoped>

</style>
