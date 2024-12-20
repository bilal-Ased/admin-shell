<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input Form</title>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <style>
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Generate PDF with Formatting</h1>
    <form action="{{ route('generate-pdf') }}" method="POST" target="_blank">
        @csrf
        <textarea name="content" id="editor" placeholder="Enter your text here..."></textarea>
        <button type="submit">Generate PDF</button>
    </form>

    <script>
        // Initialize CKEditor
        CKEDITOR.replace('editor');
    </script>
</body>

</html>