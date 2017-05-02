/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

$(document).ready(function () {

    $("#hide").click(function () {
        $("#chat-start-form-container").hide();
        $("#show").show();
    });

    $("#show").click(function (event) {
        event.preventDefault();
        $(this).hide();
        $("#chat-start-form-container").show();
    });

    $('#chat-start-form').submit(function (event) {

        var formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'user-message': $('textarea[name=user-message]').val(),
        };

        $.ajax({
            type: 'POST',
            url: '/supportchat/conversations/create',
            data: formData,
            dataType: 'json',
            encode: true,
            success: function (data) {

                ids = data.ids;

                vm.joinChannel(ids);

                $("#chat-start-form-window").hide();
                $('#chat-window').show();
            },
            complete: function () {
                // not used now
            },
            error: function (xhr, status, error) {
                if (xhr.responseJSON.name) {
                    console.error(xhr.responseJSON.name[0]);
                    $('#name').parent().addClass('has-error');
                    $('#name').parent().append("<p style='color: red'>" + xhr.responseJSON.name[0] + "</p>");
                }
                if (xhr.responseJSON.email) {
                    $('#email').parent().addClass('has-error');
                    $('#email').parent().append("<p style='color: red'>" + xhr.responseJSON.email[0] + "</p>");
                }
            }
        });

        event.preventDefault();
    });

});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('chat-client-composer', require('./components/ChatClientComposer.vue'));


const vm = new Vue({
    el: '#supportchat-app',
    data: {
        messages: [],
        username: "You"
    },
    methods: {
        addMessage(message){
            this.messages.push({
                message_body: message.message_body,
                user: {
                    name: message.user.name
                }
            });
            axios.post('/supportchat/messages/' + ids, message);
            this.scrollToEnd();
        },
        scrollToEnd() {
            this.$nextTick(function () {
                var $cont = $('.chat-log');
                $cont[0].scrollTop = $cont[0].scrollHeight;
            });
        },
        joinChannel(id){
            if (id) {
                Echo.join('supportchat-' + id)
                    .listen('ClearMessagesEvent', (e) => {
                        this.messages.splice(0, this.messages.length);
                        this.scrollToEnd();
                    })
                    .listen('SupportMessageEvent', (e) => {
                        this.messages.push({
                            message_body: e.message.message_body,
                            user: {
                                name: e.user.name
                            }
                        });
                        this.scrollToEnd();
                    });
            }
        },
        loadMesssages(id){
            if (id) {
                axios.get('/supportchat/messages/' + id).then(response => {
                    this.messages = response.data;
                });
                this.scrollToEnd();
            }
        }
    },
    created()
    {
        this.loadMesssages(ids);
        console.log(ids);
        this.joinChannel(ids);
    }
});

