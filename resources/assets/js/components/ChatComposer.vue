<template>
  <div>
      <textarea placeholder="メッセージ入力" v-model="messageText"></textarea>
      <p>{{ messageText }}</p>
      <button @click="addMessage">送信</button>
  </div>
</template>

<script>
export default {
    data(){
        return {
            //変数の初期化
            messageText:''
        }
    },
    methods:{
        addMessage(){
            //messagesentイベントをトリガーする
            this.$emit('messagesent',{
                messageText:this.messageText,
                userId:1111,
                roomId:1111,
                msgId:1111,
                isRead:false
            });
            // console.log(this.messageText);
            this.messageText = '';
        }
    }
}
</script>
