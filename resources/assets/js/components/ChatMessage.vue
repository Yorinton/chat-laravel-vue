<template>
    <div class="container">
        <p v-bind:class="{ mymessage:isMyMessage(message)}">{{ message.text }}</p>
    </div>
</template>

<script>
    export default {
        props:["message"],

        methods:{
            isMyMessage(message){
                return message.user_id == 1111;
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
