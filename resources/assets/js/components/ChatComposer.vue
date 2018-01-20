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
                id:1111,
                text:this.messageText,
                user_id:(new Date()).getTime(),
                room_id:1111,
                is_read:false,
                sent_at:Math.round((new Date()).getTime()/1000)
            });
            this.messageText = '';
        }
    }
}
</script>
