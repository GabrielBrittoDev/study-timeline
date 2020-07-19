<template>
    <v-app>
        <dialog-form
            :format-date="formatDate"
            :create="create"
            :update="update"
        ></dialog-form>
        <v-timeline class="px-10">
            <timeline
                v-for="achievement in achievements"
                @edit=""
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
                achievements: []
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

                })
                .catch((err) => console.log(err.response))
            },
            update(achievement){
                axios.put('http://localhost:8000/achievement/' + achievement.id)
                .then(response => {
                    console.log(response);
                })
                .catch( error => console.log(error.response));
            },

            deleteAchievement(achievement){
                axios.delete('http://localhost:8000/achievement/' + achievement.id)
                    .then(response => {
                        this.achievements = this.achievements.filter(value => value.id !== achievement.id);
                    })
                    .catch( error => console.log(error.response))
            },
            formatDate(date){
                if (!date) return null;

                const [year, month, day] = date.split('-');
                return `${day}/${month}/${year}`;
            },
        },
        mounted(){
            this.achievements = this.achievementsData;
        }
    }
</script>

<style scoped>

</style>
