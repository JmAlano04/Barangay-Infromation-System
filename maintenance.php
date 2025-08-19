<?php
      require('select_data_db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance | Barangay Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
         
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        
            background-image: url("asset/image/background/admin_bg/circle-scatter-haikei\ \(1\).png");
            background-repeat: no-repeat;
    background-size: cover;
    overflow-x: hidden;
        }
        
        .maintenance-container {
            height:max-content;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
        }
        
        h1 {
            color: #e74c3c;
            margin-bottom: 20px;
        }
        
        p {
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        
        .progress-container {
            width: 100%;
            background-color: #f1f1f1;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .progress-bar {
            width: 75%;
            height: 20px;
            background-color: #4CAF50;
            border-radius: 5px;
            text-align: center;
            line-height: 20px;
            color: white;
        }
        
        .contact-info {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        
        .social-links {
            margin-top: 20px;
        }
        
        .social-links a {
            margin: 0 10px;
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <img src="asset/image/6798e1930e952.png" alt="Barangay Logo" class="logo" id ="logo">
        <h1>UNDER MAINTENANCE</h1>
        <p>We're currently performing scheduled maintenance on our system to improve your experience. We apologize for any inconvenience this may cause and appreciate your patience.</p>
        
       
        
        <!-- <p>Expected completion time: <strong>Today, 5:00 PM</strong></p> -->
        
        <div class="contact-info">
            <p>For urgent concerns, please contact us at:</p>
            <p>Phone: 0951 385 6318</p>
            <p>Email: Barangay.paliparanII@gmail.com</p>
        </div>
        
        <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=61553666895025" target="_blank">Facebook</a>
        </div>
    </div>


    <script>
         let logo = document.getElementById("logo_get").textContent;

         document.getElementById("logo").src =  logo;
    </script>
</body>
</html>