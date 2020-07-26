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
            <div  v-if="user_id && user_id === achievement.user_id">
                <v-btn @click="confirmDelete">
                    excluir
                </v-btn>
                <v-btn @click="edit">
                    editar
                </v-btn>
            </div>
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
        data(){
            return {
                user_id: this.$userId
            }
        },
        methods: {
            confirmDelete(){
                this.$confirm('Tem certeza que deseja deletar a realização')
                    .then(res => {
                        if (res) this.deleteAchievement(this.achievement);
                    });
            },
            edit(){
                this.$emit('edit',{...this.achievement});
            },
        }
    }
</script>
