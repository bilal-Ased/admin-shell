<!DOCTYPE html>
<html>

<head>
    <title>Chatbot</title>
</head>

<body>
    <div id="chatbot-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("/chatbot/session", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        name: "John Doe",
                        email: "john@gmail.com"
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.url) {
                        const iframe = document.createElement('iframe');
                        iframe.src = data.url;
                        iframe.style.height = '640px';
                        iframe.style.width = '400px';
                        document.getElementById('chatbot-container').appendChild(iframe);
                    } else {
                        console.error('Failed to retrieve the session URL.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>
