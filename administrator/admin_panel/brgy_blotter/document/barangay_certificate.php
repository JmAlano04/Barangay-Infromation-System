<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blotter Report</title>

<style>
    body {
        width: 8.5in;
        margin: 0 auto;
        padding: 30px;
        font-family: "Times New Roman", serif;
        font-size: 16px;
    }

    .header {
        text-align: center;
        line-height: 1.1;
        margin-bottom: 20px;
        
    }

    .header img {
        width: 90px;
        margin-bottom: 10px;
    }
   
    .line {
        border-bottom: 1px solid #000;
        display: inline-block;
        width: 300px;
    }

    .content {
        margin-top: 25px;
        text-align: justify;
        line-height: 1.6;
    }

    .underline {
        border-bottom: 1px solid #000;
        padding: 0 5px;
    }

    .footer {
        margin-top: 60px;
        font-size: 16px;
    }

    @media print {
        body { margin: 0; padding: 30px; }
        center{
            margin-top: 100px;
        }
        
    .header {
        text-align: center;
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .header img {
        width: 90px;
        margin-bottom: 10px;
    }

    .line {
        border-bottom: 1px solid #000;
        display: inline-block;
        width: 300px;
    }

    .content {
        margin-top: 25px;
        text-align: justify;
        line-height: 1.6;
    }

    .underline {
        border-bottom: 1px solid #000;
        padding: 0 5px;
    }

    .footer {
        margin-top: 60px;
        font-size: 16px;
    }
    }
</style>

</head>
<body>

<!-- HEADER -->
<div class="header">
    <img src="/BIS/administrator/admin_panel/certificate_folder/document/logo.png" alt="Barangay Logo">

    <div>Republic of the Philippines</div>
    <div><b>Barangay Paliparan II</b></div>
    <div>Dasmariñas City, Cavite</div>
    <br>

    <table style="text-align:left; margin-left:0;">
    <tr>
        <td><b>DATE:</b></td>
        <td><span class="underline"><?= $date ?></span></td>
    </tr>
    <tr>
        <td><b>TIME:</b></td>
        <td><span class="underline"><?= $time ?></span></td>
    </tr>
    <tr>
        <td><b>SUBJECT:</b></td>
        <td><span class="underline"><?= $subject ?></span></td>
    </tr>
    <tr>
        <td><b>PLACE:</b></td>
        <td><span class="underline"><?= $place ?></span></td>
    </tr>
</table>

</div>

<!-- TITLE -->
<h2 style="text-align:center; letter-spacing:5px; margin-top:40px;">B L O T T E R</h2>
<br>
<br>
<!-- MAIN BODY -->
<div class="content">

    Ako si <span class="underline"><?= $complainant ?></span>
    Edad <span class="underline"><?= $age ?></span>
    Kasarian <span class="underline"><?= $gender ?></span>
    <br><br>

    Petsa ng Kapanganakan: <span class="underline"><?= $birthday ?></span>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Lugar ng Kapanganakan: <span class="underline"><?= $place ?></span>
    <br><br>

    at nakatira sa <span class="underline"><?= $add_complained_name ?></span>
    <br><br>

    ay dumudulog sa himpilan ng Barangay Paliparan II upang aking irekalmo si
    <span class="underline"><?= $complained_name ?></span>
    na nakatira sa <span class="underline"><?= $add_complained_name ?></span>
    <br><br>

    sa kadahilanang <span class="underline" style=" display:inline-block;">
        <?= $details_reason ?>
    </span>

</div>

<!-- FOOTER -->
<div class="footer">

    <br><br>
    <b>COMPLAINANT NAME AND SIGNATURE:</b>
    <span class="underline" style="width:300px; display:inline-block;"></span>
    <br><br>

    <b>CELLPHONE NUMBER:</b>
    <span class="underline" style="width:250px; display:inline-block;"><?= $cell_no ?></span>
    <br><br>

    <b>TANOD ON DUTY:</b>
    <span class="underline" style="width:300px; display:inline-block;"><?= $tanod ?></span>
    <br><br>

    <center>(Name and Signature over Printed Name)</center>

</div>

<script>
window.onload = function() {

    // FIXED: avoid undefined variables
    let complainantName = <?= json_encode($complainant) ?>;

    document.title = "Blotter - " + complainantName;

    setTimeout(() => { 
        window.print();
    }, 300);
};
</script>

</body>
</html>
