<template>
  <div>
      <h1>メッセージ一覧</h1>
      <chat-message v-for="message in messages" :key="message.sent_at" v-bind:message="message"></chat-message>
  </div>
</template>

<script>
export default {
    props:["messages"],
}
</script>
