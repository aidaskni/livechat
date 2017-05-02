<template lang="html">
    <div class="chat-composer">
        <input type="text" placeholder="..." v-model="messageText"
               v-on:keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        props:['username'],
        data(){
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage(){
                this.$emit('sendmessage',
                    {
                        message_body: this.messageText,
                        user: {
                            name: this.username
                        }
                    });
                this.messageText = '';
            }
        }
    }
</script>

<style lang="css">
    .chat-composer {
        display: flex;
    }

    .chat-composer input {
        flex: 1 auto;
        padding: 0.8em;
    }

    .chat-composer button {
        border-radius: 0;
    }
</style>
