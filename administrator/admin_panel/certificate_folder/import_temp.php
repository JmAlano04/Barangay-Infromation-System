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
            margin-left: 0px;
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
    <form class="form" action="certificate_folder/import_temp.php" method="post" enctype="multipart/form-data">
        <!-- Accept only CSV files -->
        <input class="input" type="file" name="excel" accept=".csv" required>
        <span style="color:#4A9D4f;">Only .csv files are allowed</span><br>
        <button class="button" type="submit" name="import_import">Import</button>
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
    if (isset($_POST["import_import"])) {
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
            // Skip the first row if it contains headers
            fgetcsv($handle);

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Process the CSV data (assuming the CSV columns match your database)

                $firstname = trim($data[0]);
				$middlename = trim($data[1]);
				$lastname = trim($data[2]);

				$age = trim($data[3]);
				$house_no = trim($data[4]);
				$sitio_pook = trim($data[5]);

				$birthday = date("Y-m-d", strtotime($data[6]));
				$place_of_birth = trim($data[7]);
				$contact_no = trim($data[8]);

				$contact_person = trim($data[9]);
				$contact_no_contact = trim($data[10]);
				$live_since_year = date("Y-m", strtotime($data[11]));

				$purpose = trim($data[12]);
				$gender = trim($data[13]);
				$business_name = trim($data[14]);

                $photo = trim($data[15]);
                $user_id = trim($data[16]);
                $request_document = trim($data[17]);
                
                $date_request = date("Y-m-d", strtotime($data[18]));
                $status = trim($data[19]);
           
                if ($status == "No data") {
                    $status = "No data";
                } elseif ($status == "Pending") {
                    $status = "Pending";
                } elseif ($status == "Processing") {
                    $status = "Processing";
                }
                elseif ($status == "Ready to Pick-up") {
                    $status = "Ready to Pick-up";
                }
                elseif ($status == "Released") {
                    $status = "Released";
                }elseif ($status == "Invalid Purpose") {
                    $status = "Invalid Purpose";
                }
                $control_no = trim($data[20]);
               
				mysqli_query($conn, "INSERT INTO barangay_request VALUES('$firstname', '$middlename', '$lastname' , '$age' , '$request_document' , '$house_no' , '$sitio_pook' , '$birthday' , '$place_of_birth' , '$contact_no' , '$contact_person' , '$contact_no_contact' , '$live_since_year' , '$purpose' , '$status' , '$gender', '$date_request' , '$business_name' , '$photo' , '$user_id' , '' , '$control_no')");
                
            
            }
            fclose($handle);
        }

        echo "
        <script>
            alert('Successfully Imported');
            document.location.href = '/BIS/administrator/admin_panel/certificate.php';
        </script>
        ";
    }
    ?>
</body>
</html>
