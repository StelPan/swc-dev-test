<template>
  <div>
    <ul>
      <li v-for="(member) in members" :key="member.id">
        <a :href="`/users/${member.id}`">
          {{ member.name }} {{ member.surname }}
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import {loadMembers} from "../services/members";

export default {
  data() {
    return {
      members: [],
      timer: null,
    }
  },
  methods: {
    async fetchMembers() {
      try {
        this.members = await loadMembers(this.$props.eventId);
      } catch (e) {
        console.error(e);
      }
    },
    aggregate() {
      this.timer = setInterval(this.fetchMembers, 1000 * 30);
    }
  },
  props: {
    eventId: {
      type: Number,
      required: true,
    }
  },
  async mounted() {
    await this.fetchMembers();
    this.aggregate();
  }
}
</script>