<div class="top"><span>To: <span class="name">{{ $contact->from_username }}</span></span></div>
<div class="chat-inner">
    @foreach ($whatsAppMessages as $whatsAppMessage)
        <div data-chat="{{ $whatsAppMessage->id }}">

            <div class="conversation-start">
                <span>{{ $whatsAppMessage->created_at }}</span>
            </div>
            <div class="bubble you">
                {{ $whatsAppMessage->text_body }}
            </div>
        </div>
    @endforeach
</div>
