
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull Requested | Barangay Information System</title>
    <link rel = "stylesheet" href = "/BIS/user_login/user_panel/style_user/style_succ.css.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body > 
    <div class = "container">

    <div class = "popup" id = "popup">
    
  <svg style="fill:#ada205; margin-top:auto;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
        </i>
        <h2>This user is already exist.</h2>
        <br>
   
        <button type = "button" class = "btn" onclick = "closepopup()">Back</button>
    </div>
    </div>
    
</body>

<script>
    let popup = document.getElementById("popup");
    
    function closepopup(){
        popup.classList.remove("open-popup");
        window.location.href = "/BIS/user_login/user_login_page.php";
    }
    </script>
</html>