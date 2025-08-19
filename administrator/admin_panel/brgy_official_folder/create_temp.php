
  
<!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Document</title>

      <style>
            @font-face {
    font-family: "main_text";
    src: url("../../../asset/font/Syncopate/Syncopate-Regular.ttf");
    }
        @font-face {
    font-family: "sub_text";
    src: url("../../../asset/font/Afacad_Flux/AfacadFlux-VariableFont_slnt,wght.ttf");
        }
        body{}
      .form{
        color:#005720;
        padding:10px;
        font-family:"sub_text";
      }
        .h1_text{
          color:#005720;
          padding-bottom:0px;
          font-size:1.5rem;
          font-family:"sub_text";
        }
        label{
            font-size:1.2rem;
        }
         #input{
            width: 100%;
            height:30px;
            padding-left:10px;
            margin-top:10px;
            color:#005720;
            margin-bottom:5px;
            border-radius:4px;
            border:none; 
        }
        input:focus{
          outline: 3px solid var(--2nd-bg-color);
        }
        #chairman{
            width: 100%;
            height:30px;
            padding-left:10px;
            margin-top:10px;
            color:#005720;
            margin-bottom:5px;
            border-radius:4px;
            border:none;
            outline:none;
            cursor: pointer;
        }
        #chairman:focus{
          outline: 3px solid var(--2nd-bg-color);
         
        }
        .btn_form_reset_sub{
          display:flex;
          justify-content:space-evenly;
          align-items:center;
        }
        #create{
            background:#4A9D4f;
            width: 10vw;    
            margin-top:20px;
            text-align:center;
            cursor: pointer;
            color:#FCFAEE;
            font-size:1rem;
            border-radius: 4px;
            padding:10px;
            border:none;
      
        }
        #reset{
            background:red;
            width: 10vw;  
            border-radius: 4px;
            margin-top:20px;
            text-align:center;
            font-size:1rem;
            color:#FCFAEE;
            padding:10px;
            border:none;
            cursor: pointer;
        }
        #reset:focus{
          outline: 3px solid red;
        }
        #images{
          padding: 2px;
          border: 3px solid #4a9d504b;
          border-radius:4px;
          width: 100%;
        }
      </style>

    </head>
        
    <body>  
        
        <!-- display pop up add official -->
        

        <h1 class = "h1_text">Add Official</h1>
       

         <form action='../admin_panel/brgy_official.php' class = "form" method = "post" enctype = "multipart/form-data">
          <label for="">Insert Photo</label><br>
          <input type="file" name = "image" value = "" accept = ".jpg, .jpeg, .png" id = "images"><br>

        <label>Fullname</label><br>
        <input type = 'text' name = 'fullname' id = "input" placeholder = "Ex. Juan Dela Cruz" required><br>

         <label>Chairmanship</label><br>
        <select id='chairman' name=chairman >
          <option value= 'Chairman'>Chairman</option>
          <option value= 'Kagawad'>Kagawad</option>
          <option value= 'SK Chairman'>SK Chairman</option>
          <option value= 'SK kagawad'>SK Kagawad</option>
        </select><br>


        <label>Position</label><br>
        <select id='chairman' name='position'>
          <option value= 'Chairman'>Chairman</option>
          <option value= 'Commnittee on Peace & Order'>Commnittee on Peace & Order</option>
          <option value= 'Commnittee on Education'>Commnittee on Education</option>
          <option value= 'Commnittee on Rules'>Commnittee on Rules</option>
          <option value= 'Commnittee on Health'>Commnittee on Health</option>
          <option value= 'Commnittee on Sports'>Commnittee on Sports</option>
          <option value= 'Commnittee on Solid Waste'>Commnittee on Solid Waste</option>
          <option value= 'Commnittee on Appropriation'>Commnittee on Appropriation</option>
          <option value= 'Presiding Officer'>Presiding Officer</option>
          <option value= 'SK Chairman'>SK Chairman</option>
          <option value= 'SK Kagawad'>SK Kagawad</option>
          <option value= 'No Chairmanship'>No Chairmanship</option>
          <option value= 'Other'>Other</option>
        </select><br>


         <label>Term Start</label><br>
        <input type = 'date' name = 'date_start' min = '2020-12-31' max = '2040-12-31' id = "input"><br>

         <label>Term End</label><br>
        <input type = 'date' name = 'date_end' min = '2020-12-31' max = '2040-12-31'id = "input"><br>


         <label>Status</label><br>
        <select id='chairman' name=active>
          <option value= "Active">Active</option>
          <option value= "Inactive">Inactive</option>
        </select><br>

       <div class = "btn_form_reset_sub">
        
        <input type = "reset" value = "Reset" id = "reset">
        <input type="submit" value = "Create" name = "create_submit" id = "create" >
       </div>
       
        </form>

      
        
    </body>
    </html>