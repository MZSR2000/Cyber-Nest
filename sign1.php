<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/cyber.ico" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            background-size: cover;
        }
        .login-container {
            background-color: rgba(209, 200, 200, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(20, 18, 22, 0.1);
            width: 600px;
            margin: auto;
            margin-top: 50px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 30px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"],
        .login-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #0c0c0f;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #1750a5;
            color: #ffffff;
            border: none;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .error-message {
            color: red;
        }
        .password-strength {
            margin-top: 10px;
            font-size: 14px;
        }
        .password-strength.weak {
            color: red;
        }
        .password-strength.medium {
            color: orange;
        }
        .password-strength.strong {
            color: green;
        }
    .cancelbtn {
        background-color: red; /* تغيير لون الزر cancel إلى اللون الأحمر */
        margin-right: 20px;
    }

    .signupbtn {
        background-color: green; /* تغيير لون الزر signup إلى اللون الأخضر */
    }
</style>

    </style>
</head>
<body>
    
    
<div class="login-container">
        <h1>Sign Up</h1>
        <form id="signupForm" action="sign_post.php" method="POST">
            <label for="firstname"><b>First Name</b></label>
            <?php if(isset($FirstName_error)){ echo '<span class="error-message">' . $FirstName_error . '</span>'; } ?>
            <input type="text" placeholder="Enter First Name" name="firstname" required>

            <label for="lastname"><b>Last Name</b></label>
            <?php if(isset($LastName_error)){ echo '<span class="error-message">' . $LastName_error . '</span>'; } ?>
            <input type="text" placeholder="Enter Last Name" name="lastname" required>

            <label for="email"><b>Email</b></label>
            <?php if(isset($Email_error)){ echo '<span class="error-message">' . $Email_error . '</span>'; } ?>
            <input type="text" id="email" placeholder="Enter Email" name="email" required>

            <label for="phone"><b>Phone Number</b></label>
            <?php if(isset($Phone_error)){ echo '<span class="error-message">' . $Phone_error . '</span>'; } ?>
            <input type="text" placeholder="Enter Phone" name="phone" required>

            <label for="age"><b>Age</b></label>
            <?php if(isset($Age_error)){ echo '<span class="error-message">' . $Age_error . '</span>'; } ?>
            <input type="text" placeholder="Enter Age" name="age" required min="0">


            <h5>Password</h5>
            <?php if(isset($Pass_error)){ echo '<span class="error-message">' . $Pass_error . '</span>'; } ?>
            <input type="password" id="passwordInput" placeholder="Enter Password" name="password" required>
            <div id="passwordStrength"></div>

            
             <!-- Password Generator Section -->
        <div class="container">
            <button onclick="generatePassword(event)"style="background-color:dodgerblue;">Generate Password</button>
        
            <input type="checkbox" id="show-password-id01">
            <label for="show-password-id01">Show Password</label> <br>
            <br>

            <div class="clearfix">
                <button type="button" onclick="window.location.href='sign2.php';" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn" name="submit">Sign Up</button>
            </div>
        </form>

        

    <script>
        document.getElementById("show-password-id01").addEventListener("change", function() {
            var passwordField = document.getElementById("passwordInput");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });

        document.getElementById('passwordInput').addEventListener('input', function() {
            var password = this.value;
            var strengthText = document.getElementById('passwordStrength');
            var strength = getPasswordStrength(password);

            if (strength.score >= 4) {
                strengthText.textContent = 'Strong password';
                strengthText.className = 'password-strength strong';
            } else {
                strengthText.textContent = 'Weak password';
                strengthText.className = 'password-strength weak';
            }
        });

        function getPasswordStrength(password) {
            var score = 0;
            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;

            return { score: score };
        }

        document.getElementById('signupForm').addEventListener('submit', function(event) {
            var password = document.getElementById('passwordInput').value;
            var strength = getPasswordStrength(password);

            if (strength.score < 4) {
                event.preventDefault(); // منع إرسال النموذج
                alert('يرجى اختيار كلمة مرور أقوى');
            }
        });

        function generatePassword(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة
    const length = 12;
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~";
    let password = "";
    for (let i = 0, n = charset.length; i < length; ++i) {
        password += charset.charAt(Math.floor(Math.random() * n));
    }
    document.getElementById("passwordInput").value = password;
    
    // تحديث تقييم القوة بعد توليد كلمة المرور
    var strengthText = document.getElementById('passwordStrength');
    var strength = getPasswordStrength(password);

    if (strength.score >= 4) {
        strengthText.textContent = 'Password strength: Strong';
        strengthText.className = 'password-strength strong';
    } else if (strength.score >= 3) {
        strengthText.textContent = 'Password strength: Medium';
        strengthText.className = 'password-strength medium';
    } else {
        strengthText.textContent = 'Password strength: Weak';
        strengthText.className = 'password-strength weak';
    }
}

    </script>
</body>
</html>
