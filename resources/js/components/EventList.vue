<template>
    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="(event) in events" :key="event.id">
                <a :href="`/events/${event.id}`">
                    {{event.title}}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import {loadEvents} from '../services/event';

export default {
    data() {
        return {
            events: [],
            timer: null,
        }
    },
    methods: {
        async loadEvents () {
            try {
                this.events = await loadEvents();
            } catch (error) {
                console.log(error);
            }
        },
        async aggregateEvents () {
            this.timer = setInterval(this.loadEvents, 1000 * 30);
        }
    },
    async mounted() {
        await this.loadEvents();
        await this.aggregateEvents();
    },

}
</script>


<style scoped>

</style>
