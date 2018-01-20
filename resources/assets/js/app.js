
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./notification');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));


const app = new Vue({
    el: '#app',
    data:{
        messages:[]
    },
    methods:{
        sendMessage(message){
            this.messages.push(message);
            console.log(message.messageText);
            console.log(message.userId);
            console.log(message.roomId);
            console.log(this.messages);

            axios.post('/api/message',message).then((res)=>{
                console.log(res.data);
            });
        }
    }
});