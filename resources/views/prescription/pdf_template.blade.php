<!-- resources/views/prescription/pdf_template.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 2px solid #ddd;
        }

        .logo {
            width: 100px;
        }

        .details {
            margin-left: 20px;
        }

        .content {
            padding: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/auth/blue_sky_logo.JPG') }}" alt="BlueSky Dental Logo" class="logo">
        <div class="details">
            <h1>BlueSky Dental</h1>
            <p>Sarit Centre, 4th Floor, P.O. Box 14368 - 00800</p>
            <p>Phone: 0733770019, 0722780979</p>
            <p>Email: blueskydental.nairobi@gmail.com</p>
            <p>Website: www.blueskydental.co.ke</p>
        </div>
    </div>
    <div class="content">
        {!! $content !!}
    </div>
    <div class="footer">
        Dr. {{ $userName }}
    </div>
</body>

</html>