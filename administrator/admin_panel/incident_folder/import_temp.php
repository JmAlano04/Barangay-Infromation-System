<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "barangay_information_system";
   $port = "3306";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Your custom styles */
        @font-face {
            font-family: "main_text";
            src: url(../../../asset/font/Syncopate/Syncopate-Regular.ttf);
        }
        @font-face {
            font-family: "sub_text";
            src: url(../../../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt,wght.ttf);
        }
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: content-box;
            list-style-type: none;
        }
        :root {
            --bg-color: #FCFAEE;
            --2nd-bg-color: #4A9D4f;
            --sub-bg-color: #005720;
            --1st-text-color: #005720;
            --2nd-text-color: rgb(53, 53, 53);
            --3rd-text-color: #FCFAEE;
            --btn-color: #d4b62f;
            --other-color: rgb(0, 183, 255);
        }
        .h2 {
            color: #4A9D4f;
            font-family: "sub_text";
        }
        .input {
            margin-top: 20px;
            border-radius: 4px;
            border: 2px solid #4A9D4f;
            padding: 10px;
            margin-left: -0px;
        }
        .button {
            padding: 10px;
            margin-top: 20px;
            background-color: rgb(0, 183, 255);
            color: var(--bg-color);
            border-radius: 4px;
            width: 100px;
            border: none;
            cursor: pointer;
            margin-left: 0px;
        }
        .button:hover {
            background-color: rgb(70, 198, 248);
        }
    </style>
</head>
<body>
    <h2 class="h2">Import Data</h2>
    <form class="form" action="incident_folder/import_temp.php" method="post" enctype="multipart/form-data">
        <!-- Accept only CSV files -->
        <input class="input" type="file" name="excel" accept=".csv" required>
        <span style="color:#4A9D4f;">Only .csv files are allowed</span><br>
        <button class="button" type="submit" name="import">Import</button>
    </form>

    <!-- JavaScript to validate file type -->
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            let fileInput = document.querySelector('input[name="excel"]');
            let filePath = fileInput.value;
            let allowedExtensions = /(\.csv)$/i;  // Regex to check for .csv file extension

            // Check if the file is not a .csv file
            if (!allowedExtensions.exec(filePath)) {
                alert('Error: Only CSV files are allowed. Please upload a .csv file!');
                fileInput.value = '';  // Clear the input field
                e.preventDefault();  // Prevent form submission
            }
        });
    </script>

    <?php
    if (isset($_POST["import"])) {
        $fileName = $_FILES["excel"]["name"];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
        $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

        $targetDirectory = "uploads/" . $newFileName;
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

        error_reporting(0);
        ini_set('display_errors', 0);

        // CSV processing logic
        if (($handle = fopen($targetDirectory, "r")) !== FALSE) {
            // Skip the header
            fgetcsv($handle);
        
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $name_involve = trim($data[0]);
                $address = trim($data[1]);
                $date = date("Y-m-d", strtotime($data[2]));
                $time = date("h:i:s A", strtotime($data[3]));
                $vehicle = trim($data[4]);
                $license = trim($data[5]);
                $plate_no = trim($data[6]);
        
                $status_text = trim($data[7]);
                $status = 0;
                if ($status_text == "Active") {
                    $status = "Active";
                } elseif ($status_text == "Settled") {
                    $status = "Settled";
                } elseif ($status_text == "Scheduled") {
                    $status = "Scheduled";
                }
        
                $cause_incident = trim($data[8]);
        
                mysqli_query($conn, "INSERT INTO barangay_incident VALUES('', '$date', '$time', '$name_involve', '$address' , '$vehicle' , '$license' , '$plate_no' , '$cause_incident' , '$status')");
            }
        
            fclose($handle);
        }
        
        echo "
        <script>
            alert('Successfully Imported');
            document.location.href = '/BIS/administrator/admin_panel/incident.php';
        </script>
        ";
    }
    ?>
</body>
</html>
