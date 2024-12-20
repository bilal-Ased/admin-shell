<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT API Example</title>
    <style>
        /* Style for iframe */
        #apiFrame {
            width: 100%;
            height: 600px;
            /* Adjust height as needed */
            border: none;
            /* Remove border */
        }

        /* Hide all elements by default */
        #apiFrame .section-header,
        #apiFrame .parameter {
            display: none;
        }

        /* Show only elements in the Asking AI section */
        #apiFrame .section-header:contains("Asking AI"),
        #apiFrame .section-header:contains("Asking AI")~.parameter {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Selected ChatGPT API Content</h1>
    <iframe id="apiFrame" src="https://beta.openai.com/docs/"> </iframe>
</body>

</html>
