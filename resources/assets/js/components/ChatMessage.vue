<template lang="html">
    <div class="chat-message">
        <!--<div v-show="message.user.name == 'user'">-->
            <p class="triangle-isosceles-right">{{ message.message_body}}</p>
            <small class="user-right">{{ message.user.name}}</small>
        <!--</div>-->
        <!--<div v-show="message.user.name == 'aidas'">-->
            <!--<p class="triangle-isosceles-left">{{ message.message_body}}</p>-->
            <!--<small class="user-left">{{ message.user.name}}</small>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style lang="css">

    .chat-message {
        padding: 0.5rem 0 1rem 0;
        word-break: break-all;
    }

    .chat-message > p {
        margin-bottom: .8rem;
    }

    .triangle-isosceles-left {
        position: relative;
        padding: 8px;
        margin: 1em 0 3em;
        color: #ffffff;
        background: #357fbe;
    }

    .triangle-isosceles-right {
        position: relative;
        padding: 8px;
        margin: 1em 0 3em;
        color: #ffffff;
        background: #357fbe;
    }

    .user-right {
        float: right;
        margin-right: 2rem;

    }
    .user-left {
        float: left;
        margin-left: 2rem;
    }

    .triangle-isosceles-left::after {
        content: "";
        position: absolute;
        left: 30px;
        border-width: 15px 15px 0;
        border-style: solid;
        border-color: #357fbe transparent;
        display: block;
        width: 0;
    }

    .triangle-isosceles-right::after {
        content: "";
        position: absolute;
        right: 30px;
        border-width: 15px 15px 0;
        border-style: solid;
        border-color: #357fbe transparent;
        display: block;
        width: 0;
    }
</style>
