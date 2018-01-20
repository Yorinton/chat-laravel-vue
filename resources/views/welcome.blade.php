<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello Vue</title>
    <link rel="stylesheet" href="css/app.css"/>
    <script type="text/javascript">
        window.Laravel = window.Laravel || {};
        window.Laravel.csrfToken = "{{csrf_token()}}";
    </script>
</head>
<body>
<div id="app">
    <chat-log v-bind:messages="messages"></chat-log>
    <chat-composer @messagesent="sendMessage"></chat-composer>
</div>
<script src="js/app.js"></script>
</body>
</html>