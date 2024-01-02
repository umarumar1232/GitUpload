<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chat</title>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax/googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <div class="chat">
    </div>

    <div class="top">
        <div>
            <p>User</p>
            <small>Online</small>
        </div>
    </div>

    <div class="messages">
        @include('/chat/receive', ['message => "Hey! Whats up!"']);
    </div>

    <div class="bottom">
        <form>
            <input type="text" name="message" id="message" placeholder="Enter message..." autocomplete="off">
            <button type="submit"></button>
        </form>
    </div>
</body>

<script>
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu'
    });
    const channel = pusher.subscribe('public');

    //Menerima Pesan
    channel.bind('chat', function(data) {
        $.post("chat/receive", {
                _token: '{{ csrf_token() }}',
                data.message,
            })
            .done(function(res) {
                $(".messages > .messages").last().after(res);
                $(document).scrollTop($(document).height());
            });
    });

    //Broadcast Messages
    $("form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "/chat/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token }}',
                message: $("form #message").val(),
            }
        }).done(function(res) {
            $(".message > .message").last().after(res);
            $("form #message").val('');
            $(document).scrollTop($(document).height());
        });
    });
</script>

</html>
