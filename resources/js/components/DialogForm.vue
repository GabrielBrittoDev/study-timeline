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
                                :rules="[rules.required, rules.titleMax, rules.titleMin]"
                                label="Título*"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="6">
                            <v-text-field
                                v-model="achievement.subtitle"
                                :rules='[rules.subtitleMax]'
                                label="Subtitulo"
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
                            <v-textarea
                                v-model="achievement.description"
                                label="Descrição*"
                                :rules="[rules.descriptionMax, rules.descriptionMin]"
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
                    required: value => !!value || 'Campo obrigat�rio.',
                    titleMin: v => v.length >= 2 || `Minimo de 2 caracteres.`,
                    titleMax: v => v.length <= 40 || `Maximo de 40 caracteres.`,
                    subtitleMax: v => v.length <= 25 || `Minimo de 25 caracteres.`,
                    descriptionMin: v => v.length >= 10 || `Minimo de 10 caracteres.`,
                    descriptionMax: v => v.length <= 300 || `Maximo de 300 caracteres.`,
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
        },
        watch: {
            'achievement.date': function (newVal, oldVal) {
                this.dateFormatted = this.formatDate(this.achievement.date);
            },
            'achievement.id': function (newVal, oldVal){
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
