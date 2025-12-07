<?php
function verify(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT verify FROM user_account WHERE verify = 'Pending Verification'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("notif").style.display = "none";
              </script>';
    }
}

function verified(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT verify FROM user_account WHERE verify = 'Pending Verification'");
    $count = $result->num_rows;

    if ($count >= 1) {
      
        echo $count;
    } else {
        // SVG will be shown when there are NO unverified users
        echo '<svg class="svg_arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
              </svg>
              <script>
                document.getElementsByClassName("notif")[0].style.display = "none";
              </script>';
    }
}



function certificate(){
    require("../../database/conn_db.php");
    $result = $conn->query("SELECT verify FROM user_account WHERE verify = 'Pending Verification'");
    $count = $result->num_rows;

    if ($count >= 1) {
        echo $count;
    } else {
        echo '<script>
                document.getElementById("notif").style.display = "none";
              </script>';
    }
}
?>
