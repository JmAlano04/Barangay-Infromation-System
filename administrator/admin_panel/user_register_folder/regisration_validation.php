<?php
    require('../../../database/conn_db.php');

    if (isset($_POST['registraion_user'])) {
        $firstname = trim($_POST['fname']);
        $middlename = trim($_POST['mname']);
        $lastname = trim($_POST['lname']);

        $gender = trim($_POST['gender']); 
        $age = trim($_POST['age']);

        $email = trim($_POST['ename']);
        $password = trim($_POST['pword']);
        $confirm_pword = trim($_POST['confirm_pword']);

        $profile_default = trim($_POST['profile_default']);

        date_default_timezone_set("Asia/Manila");
        $date_issue = date("Y-m-d");
        

            if($password != $confirm_pword){
          
            
                echo"
                   <script> 
                       window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
                    </script> ";

                    
                   
         }else {

                    
          
            $checkQuery = "SELECT COUNT(*) AS count FROM  barangay_resident WHERE firstname = '$firstname'  AND lastname = '$lastname' ";
            $result = mysqli_query($conn, $checkQuery);
            $row = mysqli_fetch_assoc($result);

                        
       

            if ($row['count'] > 0) {

                  
            $checkQuerys = "SELECT COUNT(*) AS c FROM  user_account WHERE  (firstname = '$firstname' AND lastname = '$lastname') OR email = '$email'";
            $results = mysqli_query($conn, $checkQuerys);
            $row = mysqli_fetch_assoc($results);

            if ($row['c'] == 0) {
                    // Insert new record if date is unique
                $query = "INSERT INTO user_account (firstname, middlename, lastname, email, password, gender, age, date_registered, profile)
                VALUES ('$firstname', '$middlename', '$lastname', '$email', '$password' , '$gender', '$age', '$date_issue', '$profile_default')";


                    if (mysqli_query($conn, $query)) {
                        echo "<script>
                        alert('Successfully.');
                        window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
                        </script>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
            }else{

                echo "<script>alert('Name OR Email already Exists.');
                window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
                 </script>";
                 
            }

           

                
            }else{
               

                echo "<script>alert('No resident records were found.');
                window.location.href = '/BIS/administrator/admin_panel/user_registered.php';
                 </script>";
            }

            // Close connection
            mysqli_close($conn);
        
         }
        }

?>