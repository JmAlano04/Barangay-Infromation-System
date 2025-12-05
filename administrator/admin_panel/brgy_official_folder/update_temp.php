
  
<!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Document</title>

      <style>
    
        
      .form{
        color:#005720;
        padding:10px;
        font-family:"sub_text";
      }
        .h1_div{
          color:#005720;
          padding-bottom:0px;
          font-size:1.5rem;
          font-family:"sub_text";
        }
        label{
            font-size:1.2rem;
        }
         #fullname{
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
        #position, #term_start, #term_end, #status,#chairmanship{
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
        #update-btn{
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
      </style>

    </head>
        
    <body>  
        
        <!-- display pop up add official -->
        

        <h1 class = "h1_div">Edit Official</h1>
        
     
         <form id="edit-form" class = "form" enctype = "multipart/form-data" method = "POST" action = "/BIS/administrator/admin_panel/brgy_official_folder/update.php">
        


         <label for="">Insert Photo</label><br>
         <input type="file" name = "image" value = "" accept = ".jpg, .jpeg, .png" id = "images"><br>
         
        <label>Fullname</label><br>
        <input type = 'text' name = 'fullname' id = "fullname" placeholder = "Ex. Juan Dela Cruz" required><br>

         <label>Chairmanship</label><br>
        <select id='chairmanship' name=chairman >
          <option value= 'Chairman'>Chairman</option>
          <option value= 'Kagawad'>Kagawad</option>
          <option value= 'SK chairman'>SK Chairman</option>
          <option value= 'SK kagawad'>SK Kagawad</option>
        </select><br>


        <label>Position</label><br>
        <select id='position' name='position'>
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
        <input type = 'date' name = 'date_start' min = '2020-12-31' max = '2040-12-31' id = "term_start"><br>

         <label>Term End</label><br>
        <input type = 'date' name = 'date_end' min = '2020-12-31' max = '2040-12-31'id = "term_end"><br>


         <label>Status</label><br>
        <select id='status' name=active required>
          <option value= "Active">Active</option>
          <option value= "Inactive">Inactive</option>
        </select><br>


        <input type="hidden" id = "id" name = "id">

       <div class = "btn_form_reset_sub">
    
        <input type = "reset" value = "Reset" id = "reset">
        <input type="Submit" id="update-btn" value = "Update" name = "update_official_list">
       </div>
       
        </form>

      
        
    </body>
    </html>