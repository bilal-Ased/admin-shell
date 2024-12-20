<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .message {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .message h2 {
            margin: 0;
        }

        .message p {
            margin: 5px 0;
        }

        .message .body {
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .container {
            max-width: 80%;
            margin-inline: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Unread Messages</h1>

        @if(!empty($messages))
        <div class="row">
            @foreach($messages['data'] as $message)
            {{-- @dd($message) --}}
            <div class="message">
                <div class="row">
                    <h2>{{ $message['subject'] ?? 'No Subject' }}</h2>
                    <a href="{{ url('emails/respond/'.$message['id']) }}" target="_blank">reply</a>
                </div>
                <p><strong>From:</strong>
                    @if(isset($message['from'][0]['email']))
                    {{ $message['from'][0]['name'] ?? 'No Name' }} &lt;{{ $message['from'][0]['email'] }}&gt;
                    @else
                    Unknown Sender
                    @endif
                </p>
                <p><strong>To:</strong>
                    @if(isset($message['to'][0]['email']))
                    {{ $message['to'][0]['name'] ?? 'No Name' }} &lt;{{ $message['to'][0]['email'] }}&gt;
                    @else
                    Unknown Recipient
                    @endif
                </p>
                <p><strong>Date:</strong>
                    @if(isset($message['date']))
                    {{ \Carbon\Carbon::createFromTimestamp($message['date'])->toDayDateTimeString() }}
                    @else
                    Date not available
                    @endif
                </p>
                <p><strong>Snippet:</strong></p>
                <p>{{ $message['snippet'] ?? 'No Snippet Available' }}</p>
                <div class="body">
                    <strong>Body:</strong><br>
                    {!! $message['body'] ?? 'No Body Available' !!}
                </div>
                </li>
                @endforeach
                </ul>
                @else
                <p>No unread messages found.</p>
                @endif
            </div>
</body>

</html>