<template lang="html">
    <div class="chat-composer">
        <input type="text" placeholder="..." v-model="clientMessageText" v-on:keyup.enter="clientSendMessage">
    </div>
</template>

<script>
    export default {
        props:['username'],
        data(){
            return {
                clientMessageText: ''
            }
        },
        methods: {
            clientSendMessage(){
                this.$emit('clientsendmessage',
                    {
                        message_body: this.clientMessageText,
                        user: {
                            name: this.username
                        }
                    });
                this.clientMessageText = '';
            }
        }
    }
</script>

<style lang="css">
    .chat-composer input {
        flex: 1 auto;
        padding: 0.8em;
    }
</style>
