<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <style>
    .required-message {
      font-size: 14px;
      margin-top: 4px;
      color: red;
    }
  </style>
</head>
<body>


  <form action="user_login_page.php" class="form_registration" method="POST">
    <h2>Personal Information</h2>
    <div class="item1">
      <div>
        <label>First Name</label><br />
        <input type="text" name="fname" placeholder="Enter your first name" required /><br />
      </div>
      <div>
        <label>Middle Name <span class="span_message">( Please leave it blank if not applicable. )</span></label><br />
        <input 
          type="text" 
          name="mname" 
          placeholder="Enter your middle name"
        /><br />
      </div>

      <div>
        <label>Last Name</label><br />
        <input type="text" name="lname" placeholder="Enter your last name" required /><br />
      </div>

      <!-- SUFFIX (optional with red message ON CLICK only) -->
    <div>
      <label>Suffix <span class="span_message">( Please leave it blank if not applicable. )</span></label><br />
      <input 
        type="text" 
        name="suffix" 
        placeholder="Enter your suffix. Ex, Jr, IV"
      /><br />
    </div>

      

    </div>

    <div class="item2">
      <div>
        <label>Sex</label><br />
        <select name="gender" required>
          <option value="">--Select Sex--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Prefer not to say">Prefer not to say</option>
        </select>
        
      </div>

      <div>
        <label >Birthday <span class="span_message"> ( Eligibility: 18 years of age and above. ) </span>
</label><br />
        <input 
            type="date" 
            name="birthday" 
            id="birthday"
            required 
        />
     </div>

    </div>


   

    <h2>Account Information</h2>
    <div class="item3">
      <div>
        <label>Email</label><br />
        <input type="email" name="ename" placeholder="Enter a valid email address" required /><br />
      </div>

      <div>
        <label id="plabel">Create your password</label><br />
        <input type="password" id="pname" name="pword"
            placeholder="New password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />

        <button type="button" id="btn_eye" onclick="togglePassword()">
            <i class="fa-solid fa-eye-slash"></i>
        </button>
    </div>


      <div id="message">
        <h3>Password requirements:</h3>
        <p id="letter" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A capital (uppercase) letter</p>
        <p id="number" class="invalid">A number</p>
        <p id="length" class="invalid">Minimum 8 characters</p>
      </div>

      <div>
    <label id="confirm_plabel">Confirm your password</label><br />
    <input type="password" id="confirm_pname" name="confirm_pword"
        placeholder="Enter New password again" required />

    <button type="button" id="btn_eye_confirm" onclick="toggleConfirmPassword()">
        <i class="fa-solid fa-eye-slash"></i>
    </button>
</div>


      <input type="hidden" name="profile_default" value="images.png" />
      <input type="hidden" name="verify" value="Pending Verification" />
    <br>
      <div class="item4" style=" display: flex; justify-content: left; align-items: center;">
        <input type="submit" name="registration" value="Submit" id="submit_btn" /><br />
      </div>
    </div>
  </form>

  <div id="validation">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <p><?php include('regisration_validation.php'); ?></p>
  </div>

  <script>
    // Compute today's date minus 18 years
    const today = new Date();
    const year = today.getFullYear() - 18;
    const month = ("0" + (today.getMonth() + 1)).slice(-2);
    const day = ("0" + today.getDate()).slice(-2);

    const maxDate = `${year}-${month}-${day}`;

    // Apply max date
    document.getElementById("birthday").setAttribute("max", maxDate);
</script>


  <script src="validation.js.js"></script>
</body>
</html>
