<template>
    <v-app class="container">
        <v-container>
                <v-timeline>
                    <v-timeline-item
                        v-for="(achievement, i) in achievements"
                        :key="i"
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
                        </div>
                    </v-timeline-item>
                </v-timeline>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        props: {
            achievements: Array,
            formatDate: Function,
        },
        mounted() {
           console.log(this.achievements)
        }
    }
</script>
