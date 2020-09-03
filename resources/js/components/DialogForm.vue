<template>
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
                            <v-text-field
                                v-model="achievement.title"
                                :rules="[rules.title]"
                                label="Título*"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                            <v-text-field
                                v-model="achievement.subtitle"
                                label="Subtitulo"
                                :rules="[rules.subtitle]"
                            ></v-text-field>
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
                                        hint="DD/MM/AAAA"
                                        persistent-hint
                                        append-icon="event"
                                        v-bind="attrs"
                                        @blur="achievement.date = parseDate(dateFormatted)"
                                        v-on="on"
                                        :rules="[rules.date]"
                                    ></v-text-field>
                                </template>
                                <v-date-picker
                                    v-model="achievement.date"
                                    no-title
                                    @input="changeDate()"
                                ></v-date-picker>
                            </v-menu>
                        </v-col>
                        <v-col cols="12">
                            <v-textarea
                                v-model="achievement.description"
                                label="Descrição*"
                                :rules="[rules.description]"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </v-container>
                <small>*Indicação um campo requerido</small>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="dialog = false">Fechar</v-btn>
                <v-btn color="blue darken-1" text @click="save">Salvar</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import {validate, required, minLength, maxLength} from "../validation/Validator";

const valid5DaysRule = (date) => {
    let today = new Date();
    let parts = date.split('/');
    date = new Date(parts[2], parts[1] - 1, parts[0]);
    let afterDate =  new Date(Date.now() + 5 * 24*60*60*1000);
    let beforeDate =  new Date(Date.now() - 5 * 24*60*60*1000);

    return (date > beforeDate && date < afterDate) || 'Data invalida';
}


export default {

        name: "Dialog",
        props: {
            create: Function,
            update: Function,
            formatDate: Function,
            achievement: {
                id: 0,
                title: '',
                subtitle: '',
                description: '',
                date: '',
                user_id: 0,
            },
        },
        data() {
            return {
                menu: false,
                dateFormatted: '',
                dialog: false,
                rules : {
                    title : v => validate([required(v), maxLength(v, 40) ,minLength(v, 2)]),
                    subtitle : v => validate([maxLength(v, 25)]),
                    date : v => validate([required(v), valid5DaysRule(v)]),
                    description : v => validate([required(v), minLength(v, 10), maxLength(v, 300)]),
                },
            }
        },
        methods: {
            parseDate (date) {
                if (!date) return null;
                const [month, day, year] = date.split('/');
                return `${year}-${day.padStart(2, '0')}-${month.padStart(2, '0')}`
            },
            save(){
                const exeFunc = this.achievement.id === 0 || this.achievement.id === undefined ? this.create : this.update;
                exeFunc(this.achievement);

                this.dialog = false;
            },
            resetForm(){
                this.achievement.id = 0;
                this.achievement.description = '';
                this.achievement.subtitle = '';
                this.achievement.date = '';
                this.achievement.title = '';
                this.dateFormatted = '';
            },
            changeDate(){
                this.dateFormatted = this.formatDate(this.achievement.date);
                this.menu = false;
            }
        },
        computed: {
            achievementId() {
                return this.achievement.id;
            },
        },
        watch: {
            achievementId(newVal, oldVal) {
                if (newVal !== 0 && newVal !== undefined) this.dialog = true;
            },
            dialog(newVal, oldVal){
                if (!newVal && oldVal) this.resetForm();
            }
        },
        mounted(){
            this.achievement.user_id = this.$userId;
        }
    }
</script>

<style scoped>

</style>
