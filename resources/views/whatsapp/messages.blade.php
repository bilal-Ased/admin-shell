<style>
    .chat-inner {
        display: flex;
        flex-direction: column;

    }

    .message-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 15px;
        position: relative;
    }

    .timestamp-wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-bottom: 5px;
        position: relative;
    }

    .timestamp-wrapper::before,
    .timestamp-wrapper::after {
        content: '';
        flex-grow: 1;
        background: #999;
        height: 1px;
        align-self: center;
    }

    .timestamp-wrapper::before {
        margin-right: 10px;
    }

    .timestamp-wrapper::after {
        margin-left: 10px;
    }

    .timestamp {
        font-size: 0.8em;
        color: #999;
        white-space: nowrap;
    }

    .bubble {
        background-color: #e6e6e6;
        padding: 10px;
        border-radius: 5px;
        max-width: 60%;
        position: relative;
    }

    .bubble.you {
        background-color: #ccf9b9;
    }
</style>
<div class="top">
    <span>To: <span class="name">{{ $contact->from_username }}</span></span>
</div>
<div class="chat-inner">
    @foreach ($whatsAppMessages as $whatsAppMessage)
    <div class="message-wrapper" data-chat="{{ $whatsAppMessage->id }}">
        <div class="timestamp-wrapper">
            <span class="timestamp">{{ $whatsAppMessage->created_at }}</span>
        </div>
        <div class="bubble you">
            {{ $whatsAppMessage->text_body }}
        </div>
    </div>
    @endforeach
</div>