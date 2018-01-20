<template>
    <div class="container">
        <p v-bind:class="{ mymessage:isMyMessage(message)}">{{ message.messageText }}</p>
    </div>
</template>

<script>
    export default {
        props:["message"],

        mounted() {
            console.log('Component mounted.');
        },

        methods:{
            isMyMessage(message){
                return message.userId == 1111;
            }
        }

    }
</script>


<style lang="css">
    p {
        width:100%;
    }
    .container {
        display:flex;
    }
    .mymessage {
        text-align:right;
    }
</style>
