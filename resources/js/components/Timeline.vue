<template>
    <v-timeline-item
        small
    >
        <template v-slot:opposite>
            <span
                v-text='formatDate(achievement.date)'
            ></span>
        </template>
        <div class="py-4">
            <h2 :class="`headline font-weight-light mb-4`">{{achievement.title}}</h2>
            <h4 v-if="achievement.subtitle !== null">{{achievement.subtitle}}</h4>

            <div>
                {{ achievement.description}}
            </div>
            <v-btn @click="confirmDelete">
                excluir
            </v-btn>
            <v-btn @click="deleteAchievement(achievement)">
                editar
            </v-btn>
        </div>
    </v-timeline-item>
</template>

<script>
    export default {
        props: {
            achievement: Object,
            formatDate: Function,
            deleteAchievement: Function,
        },
        methods: {
            confirmDelete(){
                this.$confirm('Tem certeza que deseja deletar a realização')
                    .then(res => {
                        if (res) this.deleteAchievement(this.achievement);
                    });
            },
        }
    }
</script>
