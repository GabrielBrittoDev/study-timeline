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
                {{ achievement.description }}
            </div>
            <div  v-if="user_id && user_id === achievement.user_id">
                <v-btn text color="#d1342d" @click="confirmDelete">
                    <v-icon>{{ mdiTrashCan }}</v-icon>
                </v-btn>
                <v-btn text color="#FFCC00" @click="edit">
                    <v-icon>{{ mdiPencil }}</v-icon>
                </v-btn>
            </div>
        </div>
    </v-timeline-item>
</template>

<script>
    import { mdiTrashCan , mdiPencil } from '@mdi/js';

    export default {
        props: {
            achievement: Object,
            formatDate: Function,
            deleteAchievement: Function,
        },
        data(){
            return {
                user_id: this.$userId,
                mdiPencil,
                mdiTrashCan
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
