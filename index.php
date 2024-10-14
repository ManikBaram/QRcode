<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Arial', sans-serif;
        }

        .full-hd-div {
            height: 100vh; /* Full viewport height */
            width: 100vw; /* Full viewport width */
            background: linear-gradient(135deg, #ff7e5f, #feb47b); /* HD Gradient */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
            padding: 20px;
        }

        .full-hd-div h1 {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .full-hd-div p {
            font-size: 1.5rem;
            margin-bottom: 40px;
            max-width: 800px;
            line-height: 1.6;
        }

        .full-hd-div input[type="text"] {
            padding: 15px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .full-hd-div button {
            padding: 15px 30px;
            font-size: 1.2rem;
            background-color: #ff6f61;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .full-hd-div button:hover {
            background-color: #ff3f3f;
            transform: scale(1.05);
        }

        /* Responsive font scaling */
        @media (max-width: 1200px) {
            .full-hd-div h1 {
                font-size: 3rem;
            }

            .full-hd-div p {
                font-size: 1.2rem;
            }

            .full-hd-div input[type="text"] {
                width: 250px; /* Adjust input width for smaller screens */
            }
        }

        @media (max-width: 768px) {
            .full-hd-div h1 {
                font-size: 2.5rem;
            }

            .full-hd-div p {
                font-size: 1rem;
            }

            .full-hd-div input[type="text"] {
                width: 200px; /* Further adjust input width */
            }
        }
    </style>
</head>
<body>
    <form action="process.php" method="POST">
        <div class="full-hd-div">
            <label>Add Text</label>
            <input type="text" name="gen" placeholder="Enter any value to generate QR code">
            <button type="submit">Generate QR code</button>
        </div>

        <?php if (isset($_SESSION['success'])) { ?>
           <?= $_SESSION['success']; ?>
        <?php } unset($_SESSION['success']); ?>

    </form>
</body>
</html>
