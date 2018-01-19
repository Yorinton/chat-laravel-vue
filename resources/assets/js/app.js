
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages:[],
        usersInRoom:[]
    },
    methods:{
        sendMessage(message){
            this.messages.push(message);

            axios.post('/message',message).then((res)=>{
                //既読判定
                if(this.usersInRoom.length === 1){
                    //メール通知
                    MailNotify(roomId);                    
                }
            }).catch((err)=>{
                console.log(err);
            });
        }
    },
    created(){
        axios.get('/messages/' + roomId).then((res) => {
            //コンポーネント作成時にmessagesに取得したメッセージを入れる
            this.messages = res.data;
        });
        //チャット画面以外を開いている時にWebPushする
        //メッセージのリスナ
        Echo.join('chatroom.' + roomId)// 入室しているroomIdをここに入れる
        //チャンネルを購入している全ユーザー情報を含む配列を返す
        .here((users) => {
            this.usersInRoom = users;
        // console.log('購読中ユーザー数',this.usersInRoom.length);
        // console.log('購読中ユーザー情報',this.usersInRoom);
        })
        //新たに参加したユーザー情報
        .joining((user) => {
            this.usersInRoom.push(user);
        })
        //離脱したユーザー情報
        .leaving((user) => {
            //u：usersInRoomの各要素
            this.usersInRoom = this.usersInRoom.filter(u => u != user);
            //配列の各要素に対して条件式に当てはまるかチェックし当てはまるものだけで新しい配列を作る
        })
        .listen('MessagePosted', (e) => {
                //Handle event
                this.messages.push({
                //MessagePostedイベントクラスのプロパティ
                message: e.message.message,
                user: e.user
            });
            console.log('メッセージ受信');
            console.log('購読中ユーザー数',this.usersInRoom.length);
        });
    }
});
