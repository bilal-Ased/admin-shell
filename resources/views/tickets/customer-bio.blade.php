<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            padding: 20px;
            border: 1px solid #e0e0e0;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .card-header h4 {
            margin: 0;
            font-size: 1.5em;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-body img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .card-body h5 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
            color: #333;
        }

        .card-body p {
            margin: 0 0 15px 0;
            color: #666;
        }

        .info-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            color: #666;
        }

        .info-item i {
            margin-right: 8px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 2px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .stats div {
            text-align: center;
        }

        .stats div h5 {
            margin: 0;
            font-size: 1.0em;
            color: #007bff;
        }

        .stats div p {
            margin: 0;
            font-size: 0.8em;
            color: #666;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .buttons button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .buttons .follow {
            background-color: #007bff;
            color: #fff;
        }

        .buttons .follow:hover {
            background-color: #0056b3;
        }

        .buttons .view-profile {
            background-color: transparent;
            border: 2px solid #007bff;
            color: #007bff;
        }

        .buttons .view-profile:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h4>Customer Details</h4>
        </div>
        <div class="card-body">
            <div class="stats">
                <span>
                    <h5> Bilal mughal</h5>
                </span>
            </div>
            <div class="stats">
                <div class="info-item">

                    <p><i class="fas fa-envelope"></i> bilal.mughal@calltronix.com</p>
                </div>

            </div>
            <div class="stats">

                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <span>Phone: Not provided</span>
                </div>
            </div>
            <div class="stats">
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <span>Alt Phone: Not provided</span>
                </div>
            </div>

            <div class="stats">
                <div class="info-item">
                    <i class="fas fa-building"></i>
                    <span>Company Name: Not provided</span>
                </div>
            </div>
            <div class="stats">
                <div>
                    <h5>15K</h5>
                    <p>Tickets</p>
                </div>
                <div>
                    <h5>82</h5>
                    <p>Last Contacted Date</p>
                </div>
                <div>
                    <h5>1.3M</h5>
                    <p>Sentiment Score</p>
                </div>
            </div>
            <div class="buttons">
                <button class="follow">Follow</button>
                <button class="view-profile">View Profile</button>
            </div>
        </div>
    </div>
</body>

</html>