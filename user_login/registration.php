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
 
  
  <form action="regisration_validation.php" class="form_registration" method="POST">
    <h2>Personal Information</h2>
    <div class="item1">
      <div>
        <label>Firstname</label><br />
        <input type="text" name="fname" placeholder="Enter Firstname" required /><br />
        <p class="required-message" style="display:none;"></p>
      </div>
      <div>
        <label>Middlename</label><br />
        <input type="text" name="mname" placeholder="Enter Middlename" /><br />
        <p class="required-message" style="display:none;"></p>
      </div>
      <div>
        <label>Lastname</label><br />
        <input type="text" name="lname" placeholder="Enter Lastname" required /><br />
        <p class="required-message" style="display:none;"></p>
      </div>
    </div>

    <div class="item2">
      <div>
        <label>Gender</label><br />
        <select name="gender" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Prefer not to say">Prefer not to say</option>
        </select>
        <p class="required-message" style="display:none;"></p>
      </div>

      <div>
        <label style="margin-left:20px;">Age</label><br />
        <input type="number" name="age" style="margin-left:20px;" min="18" max="120" placeholder="Enter Age" required />
        <p class="required-message" style="display:none; margin-left:20px;"></p>
      </div>
    </div>

    <h2>Account Information</h2>
    <div class="item3">
      <div>
        <label>Email</label><br />
        <input type="email" name="ename" placeholder="Enter Email" required /><br />
        <p class="required-message" style="display:none;"></p>
      </div>

      <div>
        <label id="plabel">Create your password</label><br />
        <input type="password" id="pname" name="pword" placeholder="Enter your password"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required /><br />
        <i class="fa-solid fa-eye-slash" id="eye" onclick="myFunction()"></i><br />
        <!-- <p class="required-message" style="display:none;"></p> -->
      </div>

      <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A lowercase letter</p>
        <p id="capital" class="invalid">A capital (uppercase) letter</p>
        <p id="number" class="invalid">A number</p>
        <p id="length" class="invalid">Minimum 8 characters</p>
      </div>

      <div>
        <label id="confirm_plabel">Confirm your password</label><br />
        <input type="password" id="confirm_pname" name="confirm_pword" placeholder="Enter New password again" required /><br />
        <i class="fa-solid fa-eye-slash" id="eye_confirm" onclick="myFunction_confirm()"></i>
        <!-- <p class="required-message" style="display:none;"></p> -->
      </div>

      <input type="hidden" name="profile_default" value="images.png" />
      <input type="hidden" name="verify" value="Not Verified" />

      <div class="item4" style=" display: flex; justify-content: left; align-items: center;">
        <input type="reset" name="reset" value="Reset" id="reset" />
        <input type="submit" name="registration" value="Submit" id="submit_btn" /><br />
      </div>
    </div>
  </form>

  <div id="validation">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <p><?php include('regisration_validation.php'); ?></p>
  </div>

  <script>
    // Get all required inputs (text, email, number, password, select)
    const requiredFields = document.querySelectorAll("input[required], select[required]");

    requiredFields.forEach((input) => {
      const message = input.parentElement.querySelector(".required-message");

      // Show message when input is clicked if empty
      input.addEventListener("focus", () => {
        if (input.value.trim() === "") {
          message.textContent = "Required fill-up";
          message.style.display = "block";
        }
      });

      // Hide message when typing
      input.addEventListener("input", () => {
        if (input.value.trim() !== "") {
          message.textContent = "";
          message.style.display = "none";
        }
      });

      // Hide message when clicking outside
      document.addEventListener("click", (e) => {
        if (!input.contains(e.target)) {
          if (input.value.trim() !== "") {
            message.textContent = "";
            message.style.display = "none";
          }
        }
      });
    });
  </script>

  <script src="validation.js.js"></script>
</body>
</html>
