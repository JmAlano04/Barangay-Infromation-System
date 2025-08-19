
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Barangayy Information System</title>
    <link rel = "stylesheet" href = "style.css/mian.stylecss.css"/>
    <link rel = "stylesheet" href = "style.css/dash_style.css"/>
    <link rel = "stylesheet" href = "style.css/reposive_main.css"/>
    <link rel="icon" href="/BIS/favicon/favicon.ico" type="image/x-icon">

    <!-- ... your existing head content ... -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <style>
        @font-face {
    font-family: "main_text";
        src: url(../asset/font/Syncopate/Syncopate-Bold.ttf);
    }
    @font-face {
        font-family: "sub_text";
        src: url(../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt\,wght.ttf);
    }
    /* Container styling */
    .chart-container {
      width: 45%;
      max-width:65vw;
      margin: 40px auto;
      padding: 20px;
      background:#EBEBEB;
      border-radius: 4px;
      box-shadow: 1px 1px 20px rgba(165, 165, 165, 0.46);
      color:#4B9D4E;
      margin-left:20px;
    }

    /* Canvas styling (optional) */
    #myChart {
        background:#EBEBEB;
      border-radius: 8px;
    }
    .h2{
        font-family:"sub_text";
        color:#4B9D4E;
        text-align:center;
    }
    .calendar-container {
    max-width: 1000px;
    margin: 2rem auto;
    background: #f6f6f6;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    font-family: "sub_text", sans-serif;
}

.calendar-title {
    text-align: center;
    color: #4B9D4E;
    margin-bottom: 20px;
}

#calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
    text-align: center;
}

.day {
    padding: 10px;
    background-color: white;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.day.header {
    font-weight: bold;
    background-color: #4B9D4E;
    color: white;
}
#calendar-container {
        max-width: 400px;
   
        margin: auto;
        font-family: sans-serif;
        text-align: center;
        background-color :#EBEBEB;
        padding:20px 30px 20px 30px;
        border-radius:4px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    #calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #calendar-header h2 {
        margin: 10px 0;
        color:#4B9D4E;
        font-size:20px;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 2px;
    }

    .day {
        padding: 5px;
        border: 1px solid #ddd;

    }

    .header {
        font-weight: bold;
        background-color: #f0f0f0;
    }

    .today {
        background-color: #ffeb3b;
        border-radius: 50%;
        font-weight: bold;
    }

    button {
        padding: 5px 10px;
        font-size: 16px;
    }
    .first_div_header{
      display:flex;
      justify-content:space-between;
      background-color: #f3f3f3ff;
      margin-top:20px;
      margin-left:40px;
      border-radius:8px;
      width: 95%;
      transition: all 0.5s ease ;
    }

    .sidebar.active ~ .dashboard_content .first_div_header{
      width: 90%;
      margin-left: -50px;
    }
        
        
  </style>
</head>
<body>
    <?php
        require('../session.php');
        require('select_data_db.php');
    
    ?>
    <div class = "sidebar scrollbar-hide">
        <div class = "logo_content">
            <div class = "logo">
            <img src="../../asset/image/logo/6736e31f2c7d1.png" alt="" id = "logo">
                <div class = "logo_name">BARANGAY <p style = "color:#F5E402;" id = "baranagay_name_user">
                
             
                </p>
                
        </div>
        </div>
            <span id = "btn_menu">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" ;transform: ;msFilter:;><path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path></svg>
            </span>
           <hr><br>
        </div>


            <ul class = "nav_list">
            
                    <li>
                        <a href="dashboard.php" id = "selected">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" transform: ;msFilter:;"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"></path></svg><span class = "link_name">Dashboard</span></a>
                        <span class = "tooltip">Dashboard</span>
                    </li>

                    <li>
                        <a href="brgy_info.php">
                        <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg><span class = "link_name">Barangay Information</span></a>
                        <span class = "tooltip">Brgy. Info</span>
                    </li>
                    <li>
                        <a href="brgy_official.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg><span class = "link_name">Barangay Official</span></a>
                        <span class = "tooltip">Brgy. Official</span>
                    </li>
                   
                    <li>
                        <a href="resident.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg><span class = "link_name">Resident</span></a>
                        <span class = "tooltip">Resident</span>
                    </li>
                    
                    <li>
                        <a href="blotter.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg><span class = "link_name">Blotter</span></a>
                        <span class = "tooltip">Blotter</span>
                    </li>
                    <li>
                        <a href="incident.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M176 8c-6.6 0-12.4 4-14.9 10.1l-29.4 74L55.6 68.9c-6.3-1.9-13.1 .2-17.2 5.3s-4.6 12.2-1.4 17.9l39.5 69.1L10.9 206.4c-5.4 3.7-8 10.3-6.5 16.7s6.7 11.2 13.1 12.2l78.7 12.2L90.6 327c-.5 6.5 3.1 12.7 9 15.5s12.9 1.8 17.8-2.6l35.3-32.5 9.5-35.4 10.4-38.6c8-29.9 30.5-52.1 57.9-60.9l41-59.2c11.3-16.3 26.4-28.9 43.5-37.2c-.4-.6-.8-1.2-1.3-1.8c-4.1-5.1-10.9-7.2-17.2-5.3L220.3 92.1l-29.4-74C188.4 12 182.6 8 176 8zM367.7 161.5l135.6 36.3c6.5 1.8 11.3 7.4 11.8 14.2l4.6 56.5-201.5-54 32.2-46.6c3.8-5.6 10.8-8.1 17.3-6.4zm-69.9-30l-47.9 69.3c-21.6 3-40.3 18.6-46.3 41l-10.4 38.6-16.6 61.8-8.3 30.9c-4.6 17.1 5.6 34.6 22.6 39.2l15.5 4.1c17.1 4.6 34.6-5.6 39.2-22.6l8.3-30.9 247.3 66.3-8.3 30.9c-4.6 17.1 5.6 34.6 22.6 39.2l15.5 4.1c17.1 4.6 34.6-5.6 39.2-22.6l8.3-30.9L595 388l10.4-38.6c6-22.4-2.5-45.2-19.6-58.7l-6.8-84c-2.7-33.7-26.4-62-59-70.8L384.2 99.7c-32.7-8.8-67.3 4-86.5 31.8zm-17 131a24 24 0 1 1 -12.4 46.4 24 24 0 1 1 12.4-46.4zm217.9 83.2A24 24 0 1 1 545 358.1a24 24 0 1 1 -46.4-12.4z"/></svg><span class = "link_name">Incident</span></a>
                        <span class = "tooltip">Incident</span>
                    </li>
             
                   
                    <li>
                        <a href="revenue.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64l0 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-64 80 0c68.4 0 127.7-39 156.8-96l19.2 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-.7 0c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16l.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-19.2 0C303.7 71 244.4 32 176 32L64 32zm190.4 96L96 128l0-32 80 0c30.5 0 58.2 12.2 78.4 32zM96 192l190.9 0c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16L96 224l0-32zm158.4 96c-20.2 19.8-47.9 32-78.4 32l-80 0 0-32 158.4 0z"/></svg><span class = "link_name">Income</span></a>
                        <span class = "tooltip">Income</span>
                    </li>
                    <?php require('notif.php');?>
                    <li>
                        <a href="manage_account.php">
                        <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.9 8.4 167.2 8 160.4 8l-.7 0c-6.8 0-13.5 .4-20.1 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM112 176a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 304a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg><span class = "link_name">Manage Account <span class = "notif"><?php verified() ?></span></span> </a>
                        <span class = "tooltip">Manage Account</span>
                    </li>
                    <li>
                        <a href="certificate.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg><span class = "link_name">Document<svg class = "svg_arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg></span></a>
                        <span class = "tooltip">Document</span>
                    </li>
                  
                   

            </ul>
         

        </div>
        

        <div class = "dashboard_content">
                <div class = "text">
                    <h1>DASHBOARD</h1>
                    <div class = "setting">
                        <div>
                            <img src="../../asset/image/admin/" alt="" id = "admin_profile">
                            
                        </div>
                       
                        <div>
                            <p id = "username_admin">Admin</p>
                            <p id = "user_type" style = "font-size:0.6rem;">ADMINISTRATOR</p> 
                            </div>
                        <div class = "svg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                             <div class="dropdown-content">

                                    <a  href="admin_layout.php"><svg xmlns="http://www.w3.org/2000/svg" style = "fill:#134629;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg> <span>My Profile</span></a>

                               
                                <a href="../logout.php" style = "color:red; fill:red;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg> <span>Logout</span>  </a>
                            </div>
                    
                        </div>
                           
                            
                    </div>
                            


                </div>
         

          
              
                    
                    <!-- Add this new section for the chart -->

                    <div class = "first_div_header">
                    <div class="chart-container">
                     <h2 class = "h2">Date Request Statistics</h1>
                    <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                    <div id="calendar-container">
                      <div id="calendar-header">
                          <button id="prev">&lt;</button>
                          <h2 id="month-year"></h2>
                          <button id="next">&gt;</button>
                      </div>
                      <div id="calendar" class="calendar-grid"></div>
                  </div>
                  </div>
                <div id = "div_content">
                            <?php include("dashboard/count.php"); ?>
                            <div class="item1">
                            <div><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                                    <h3>Total <br> Requested </h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2>Total</h2>
                                        <p class = "number_div"><?php population_total() ?></p>
                                    </div>
                            
                                </div>
                            <div class="item2">
                            <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l44.9 74.7c-16.1 17.6-28.6 38.5-36.6 61.5c-1.9-1.8-3.5-3.9-4.9-6.3L232 256.9 232 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zm136 16a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L416 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z"/></svg>
                                    <h3>Total Released <br> Document</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2>Completed</h2>
                                        <p class = "number_div"><?php completed_total() ?></p>
                                    </div>
                           
                            
                                </div>
                            
                            <div class="item3">
                            <div><svg xmlns="http://www.w3.org/2000/svg" style = "width:38px;" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                                    <h3>Total Pending <br> Document</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2 style = "color:orange;">Pending</h2>
                                        <p class = "number_div"><?php pending_total() ?></p>
                                    </div>
                           
                            
                            </div>
                            <div class="item4">
                            <div><svg xmlns="http://www.w3.org/2000/svg" style = "width:38px;" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9 232 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0z"/></svg>
                                    <h3>Total <br> Requested</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2>Male</h2>
                                        <p class = "number_div"><?php document_male_total() ?></p>
                                    </div>
                               
                            </div>
                            <div class="item5">
                            <div><svg xmlns="http://www.w3.org/2000/svg" style = "width:38px;" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M160 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM88 384l-17.8 0c-10.9 0-18.6-10.7-15.2-21.1L93.3 248.1 59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l53.6-89.2c20.3-33.7 56.7-54.3 96-54.3l11.6 0c39.3 0 75.7 20.6 96 54.3l53.6 89.2c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9l-33.9-56.3L265 362.9c3.5 10.4-4.3 21.1-15.2 21.1L232 384l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96-16 0 0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96z"/></svg>
                                    <h3>Total <br> Requested</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2>Female</h2>
                                        <p class = "number_div"><?php document_female_total() ?></p>
                                    </div>
                            </div>
                            <div class="item6">
                            <div><svg xmlns="http://www.w3.org/2000/svg" style = "width:38px;" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 0a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm8 352l0-224 6.9 0c33.7 0 64.9 17.7 82.3 46.6l58.3 97c9.1 15.1 4.2 34.8-10.9 43.9s-34.8 4.2-43.9-10.9L232 256.9 232 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128s0 0 0 0zM58.2 182.3c19.9-33.1 55.3-53.5 93.8-54.3l0 256s0 0 0 0l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96-17.8 0c-10.9 0-18.6-10.7-15.2-21.1L93.3 248.1 59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l53.6-89.2z"/></svg>
                                    <h3>Total <br> Requested</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2 style = "padding-right:10px; line-height:25px;">Prefer not to say</h2>
                                        <p class = "number_div"><?php document_prefer_total() ?></p>
                                    </div>
                            </div>
                          
                            <div class="item8">
                            <div><svg xmlns="http://www.w3.org/2000/svg" style = "width:38px;"  viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64l0 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64 0 96c0 17.7 14.3 32 32 32s32-14.3 32-32l0-64 80 0c68.4 0 127.7-39 156.8-96l19.2 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-.7 0c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16l.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-19.2 0C303.7 71 244.4 32 176 32L64 32zm190.4 96L96 128l0-32 80 0c30.5 0 58.2 12.2 78.4 32zM96 192l190.9 0c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16L96 224l0-32zm158.4 96c-20.2 19.8-47.9 32-78.4 32l-80 0 0-32 158.4 0z"/></svg>
                                    <h3>Total Revenue</h3>
                                    </div>
                                    <div class = "count_div">
                                        <h2>Income</h2>
                                        <p class = "number_div"><?php revenue_total() ?></p>
                                    </div>
                            
                            </div>
                          
                          
                </div>

            </div>
          
            <footer style = "height:30vh;">

            </footer>
            
           
        </div>
  


        <?php include("dashboard/month.php"); ?>


  <script>
    

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan.', 'Feb.', 'Mar.' , 'Apr.', 'May.', 'Jun.' , 'Jul.', 'Aug.' , 'Sept.', 'Oct.' , 'Nov.' , 'Dec.'],
        datasets: [{
          label: '',
          data: [<?php jan_total()?>, <?php feb_total()?>, <?php mar_total()?> ,<?php apr_total()?>, <?php may_total()?>, <?php jun_total()?>,<?php jul_total()?>,<?php aug_total()?>,<?php sept_total()?> ,<?php oct_total()?>,<?php nov_total()?>,<?php  dec_total()?>],
          backgroundColor: ['#4CC250', '#58A7C7', '#EEA41D'],
          borderColor: ['#4CC250', '#58A7C7', '#EEA41D'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            labels: {
              font: {
                size: -1
              },
              color: '#333'
            }
          },
          title: {
            display: true
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              color: '#666',
              font: {
                size: 12
              }
            }
          },
          x: {
            ticks: {
              color: '#666',
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
  </script>




     
<!-- -------------------------------------JAVASCRIPT--------------------------------------------- -->
        <!-- LOGOUT AND SIDEBAR FUNCTION SCRIPT -->
        <script src = "javascript_folder/logout_&_sidebar.js"></script>
        
        <script type = "text/javascript">
            function loadContent(url) {
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", url);
                xhttp.send();
                xhttp.onreadystatechange = (e) => {
                    document.getElementById("div_content").innerHTML = xhttp.responseText;
                }
                }
            
        </script>
   
        

        <!-- ADD ACCOUNT ADMIN  -->
        <script src = "admin_folder/btn_function.js"></script>

       
        <script>
                
                let logo = document.getElementById("logo_get").textContent;
                document.getElementById("logo").src =  logo;
                let baranagy_name_get_user = document.getElementById("baranagay_name_get_user").textContent;
                document.getElementById("baranagay_name_user").innerHTML =  baranagy_name_get_user;

            

                

                let user_admin = document.getElementById("user_admin").textContent;
                document.getElementById("username_admin").innerHTML =  user_admin;

                let user_type = document.getElementById("user_type_get").textContent;
                document.getElementById("user_type").innerHTML =  user_type;

                let admin_profile = document.getElementById("admin_picture").textContent;
                document.getElementById("admin_profile").src =  admin_profile;

        </script>


<script>
    const calendar = document.getElementById("calendar");
    const monthYear = document.getElementById("month-year");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const today = new Date();
    let currentYear = today.getFullYear();
    let currentMonth = today.getMonth();

    const getDaysInMonth = (year, month) => new Date(year, month + 1, 0).getDate();

    function renderCalendar(year, month) {
        calendar.innerHTML = ''; // Clear existing calendar
        monthYear.textContent = `${months[month]} ${year}`;

        const firstDayIndex = new Date(year, month, 1).getDay();
        const totalDays = getDaysInMonth(year, month);

        // Add headers
        days.forEach(day => {
            const div = document.createElement("div");
            div.className = "day header";
            div.textContent = day;
            calendar.appendChild(div);
        });

        // Add empty blocks before the first day
        for (let i = 0; i < firstDayIndex; i++) {
            const empty = document.createElement("div");
            empty.className = "day";
            calendar.appendChild(empty);
        }

        // Fill the calendar with days
        for (let d = 1; d <= totalDays; d++) {
            const div = document.createElement("div");
            div.className = "day";
            div.textContent = d;

            // Highlight today's date
            if (
                d === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear()
            ) {
                div.classList.add("today");
            }

            calendar.appendChild(div);
        }
    }

    // Navigation
    prevBtn.addEventListener("click", () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentYear, currentMonth);
    });

    nextBtn.addEventListener("click", () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentYear, currentMonth);
    });

    // Initial render
    renderCalendar(currentYear, currentMonth);
</script>

</body>
</html>