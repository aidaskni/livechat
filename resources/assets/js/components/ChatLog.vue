<template lang="html">
  <div id="chatlog" class="chat-log">
      <chat-message v-for="message in messages"  v-bind:message="message"></chat-message>
      <div class="empty" v-show="messages.length === 0">
          No messages
      </div>
  </div>
</template>

<script>
export default {
    props: ['messages'],
}
</script>

<style lang="css">
.empty {
    padding: 1rem;
    text-align: center;
}
</style>
