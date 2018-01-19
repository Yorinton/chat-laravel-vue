

const MailNotify = (roomId) => {
    axios.post('/notify/' + roomId).then((res)=>{
        //通知完了
        console.log(res.data);
    });
}

const WebPushNotify = () => {

}