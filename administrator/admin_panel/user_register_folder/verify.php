

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @font-face {
    font-family: "main_text";
    src: url(../../../asset/font/Syncopate/Syncopate-Regular.ttf);
}
@font-face {
    font-family: "sub_text";
    src: url(../../../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt,wght.ttf);
}
        .svg {
            display:flex;
            justify-content:center;
            align-items:center;
            fill:#D4B62F;
            margin-bottom:40px;
        }

        .h3 {
            text-align:center;
            font-family:"sub_text";
            color:#005720;
            margin-bottom:40px;
            font-size:1.4rem;
        }
        .div_submit{
            display:flex;
            justify-content:space-evenly;
        }
        .div_submit button{
            padding:15px;
              font-size:1rem;
            width: 100px;
            cursor:pointer;
             background-color:#4A9D4f;
            border:none;
            border-radius:4px;
            background-color:#5DB8FE;
            color:white;

        }
        .div_submit .submit{
              padding:15px;
              font-size:1rem;
            width: 100px;
            cursor:pointer;
            background-color:#4A9D4f;
            border:none;
            border-radius:4px;
             color:white;
        }
    </style>
</head>
<body>

   <span class="svg">
    <svg style="width: 100px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24v112c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
    </svg>
</span>

<h3 class="h3">Are you sure you want to mark this user as verified?</h3>

<form action="/BIS/administrator/admin_panel/user_register_folder/verify_validation.php" method="POST">
    <div class="div_submit">
        <input type="submit" name="submit_verify" value="Yes" class="submit">
        <button type="button" onclick="document.getElementById('verify_blotter').style.display='none';">No</button>
        <input type="hidden" name="id_verify" id="id_verify">
        <input type="hidden" name="new_verify" id="new_verify" value="Account Verified">
    </div>
</form>

</body>
</html>