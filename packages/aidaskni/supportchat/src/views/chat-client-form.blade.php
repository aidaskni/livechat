<script>
    var ids = 98;
</script>

<div id="supportchat-app">
    <chat-log v-bind:messages="messages"></chat-log>
    <chat-client-composer id="client-chat" v-on:clientsendmessage="addMessage" v-bind:username="username"></chat-client-composer>
</div>