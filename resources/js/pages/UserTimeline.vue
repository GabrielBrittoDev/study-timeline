<template>
    <v-app>
        <dialog-form
            :format-date="formatDate"
            :create="create"
            :update="update"
            :achievement.sync="achievement"
        ></dialog-form>
        <v-timeline class="px-10">
            <timeline
                v-for="achievement in achievements"
                @edit="edit"
                :achievement="achievement"
                :key="achievement.id"
                :format-date="formatDate"
                :delete-achievement="deleteAchievement"
            ></timeline>
        </v-timeline>

    </v-app>
</template>

<script>
    import Timeline from "../components/Timeline";
    import axios from 'axios';
    const _ = require('lodash');
    export default {
        name: "UserTimeline",
        props: {
            achievementsData: Array,
        },
        data(){
            return {
                achievements: [],
                achievement: {},
            }
        },
        components: {
            Timeline
        },
        methods: {
            create(achievement){
                axios.post('http://localhost:8000/achievement/', achievement)
                .then((response) => {
                    this.achievements.push(response.data.achievement);
                    this.achievements = _.orderBy(this.achievements, [(obj => {
                        return new Date(obj.date);
                    })], ['asc']);
                    this.$toastr.s(response.data.message, 'Sucesso! ');
                })
                    .catch( err => {
                        if (err.response.status === 422){
                            console.log(err.response);
                            for (let error in err.response.data.errors){
                                this.$toastr.e(error);
                            }
                        } else {
                            this.$toastr.e(err.response.data.message, 'Erro!')
                        }
                    });
            },
            update(achievement){
                axios.put('http://localhost:8000/achievement/' + achievement.id, achievement)
                .then(response => {
                    achievement = response.data.achievement;
                    this.achievements = this.achievements.map((value) => {
                        return value.id === achievement.id ? achievement : value;
                    });
                    this.$toastr.s(response.data.message, 'Sucesso! ');
                })
                    .catch( err => {
                        if (err.response.status === 422){
                            console.log(err.response);
                            for (let error in err.response.data.errors){
                                this.$toastr.e(error);
                            }
                        } else {
                            this.$toastr.e(err.response.data.message, 'Erro!')
                        }
                    });
            },

            deleteAchievement(achievement){
                axios.delete('http://localhost:8000/achievement/' + achievement.id)
                    .then(response => {
                        this.achievements = this.achievements.filter(value => value.id !== achievement.id);
                        this.$toastr.s(response.data.message, 'Sucesso! ');
                    })
                    .catch( err => this.$toastr.e(err.response.data.message, 'Erro!'))
            },
            formatDate(date){
                if (!date) return null;

                const [year, month, day] = date.split('-');
                return `${day}/${month}/${year}`;
            },
            edit(achievement){
               this.achievement = achievement;
            },

        },
        mounted(){
            this.achievements = this.achievementsData;
        }
    }
</script>

<style scoped>

</style>
