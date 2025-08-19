<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page with Timer</title>
    <style>
        /* Full-screen loading screen styling */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("../../../asset/image/background/admin_bg/circle-scatter-haikei (1).png");
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Spinner styling */
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        h2{
            color:#005720;
            margin-bottom:  100px;
        }
        h1{
            color:#005720;
          
        }
    </style>
</head>
<body>
    <!-- Loading screen -->
    <div id="loading-screen">
        <h1>Delete Record Successfully!</h1>
        <div class="spinner"></div>
    </div>

    <script>
       

        // Simulate a PHP process
        setTimeout(() => {
            // Hide the loading screen after 5 seconds
            
            window.location.href = "/BIS/administrator/admin_panel/incident.php";
            clearInterval(timerInterval);
        }, 1000); // Simulate PHP execution time

    
    </script>



    

</body>
</html>