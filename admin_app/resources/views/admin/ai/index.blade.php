@extends('layouts.admin')

@section('content')
    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">AI Assistant</h5>
        </div>

        <div class="card-body p-0">

            <div id="chat-box" style="height:450px;overflow-y:auto;padding:15px;background:#f8f9fa;">
            </div>

            <div class="p-3 border-top">

                <div class="input-group">
                    <textarea id="message" class="form-control" rows="2" placeholder="Type your message..."></textarea>

                    <button id="sendBtn" class="btn btn-primary">
                        Send
                    </button>
                </div>

            </div>

        </div>
    </div>

    <style>
        .message {
            max-width: 70%;
            padding: 10px 12px;
            border-radius: 12px;
            margin-bottom: 10px;
            clear: both;
            word-wrap: break-word;
        }

        .user-msg {
            background: #0d6efd;
            color: #fff;
            float: right;
            text-align: right;
        }

        .ai-msg {
            background: #e9ecef;
            color: #000;
            float: left;
        }
    </style>
@endsection


@push('scripts')
    <script>
        function appendMessage(text, type) {

            let cls = type === 'user' ? 'user-msg' : 'ai-msg';

            $('#chat-box').append(`
        <div class="message ${cls}">
            ${text}
        </div>
    `);

            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
        }

        function sendMessage() {

            let message = $('#message').val().trim();

            if (message === '') return;


            appendMessage(message, 'user');

            $('#message').val('');

            let loadingId = Date.now();

            $('#chat-box').append(`
        <div id="load-${loadingId}" class="message ai-msg">
            typing...
        </div>
    `);

            $.ajax({
                url: "{{ route('ai.ask') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    message: message
                },
                success: function(response) {

                    $(`#load-${loadingId}`).remove();

                    appendMessage(response.reply, 'ai');
                },
                error: function() {

                    $(`#load-${loadingId}`).remove();

                    appendMessage("Something went wrong!", 'ai');
                }
            });
        }

        $('#sendBtn').click(function() {
            sendMessage();
        });


        $('#message').on('keypress', function(e) {

            if (e.which === 13 && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    </script>
@endpush
