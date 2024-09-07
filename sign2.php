<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/cyber.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
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
            margin-top: 80px;
        }

        .login-container h2 {
            text-align: center;
        }
        .login-container input[type="email"],
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #0c0c0f;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #1750a5;
            width: 100%;
            color: #ffffff;
            border: none;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container input[type="submit"]:hover,
        button:hover {
            opacity: 0.8;
        }

        button {
            background-color: #1750a5;
            width: 100%;
            color: #ffffff;
            border: none;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #captcha-container {
            margin-top: 0px;
        }

        #captcha {
            display: inline-block;
            padding: 10px;
            background-color: #f8fafb;
            border: 1px solid #020202;
            border-radius: 50px;
            color: #000000;
        }

        #captchaInput {
            margin-top: 0px;
            flex: 0;
            margin-right: 0px;
            width: 75%;
            padding: 10px;
            border: 5px solid #767272;
            border-radius: 50px;
        }

        .change-captcha-button {
            background-color: transparent;
            font-size: 30px;
            cursor: pointer;
        }

        .message {
            padding: 20px 40px;
            margin-bottom: 0px;
            margin-top: 25px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
            margin-left: 50px;
        }

        #signout-button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .success {
            color: green;
            font-size: 25px;
            margin-top: 0px;
        }

        .error {
            color: red;
            font-size: 25px;
            margin-top: 0px;
        }

        .social-login {
            text-align: center;
            margin-top: 20px;
        }

        .social-login img {
            width: 50px;
            margin: 10px 20px;
            cursor: pointer;
        }

        #google-signin-container {
            display: none;
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
            width: auto;
            margin-left: auto;
            margin-right: auto;
        }

        #signout-button {
            display: none;
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
            width: auto;
            margin-left: 0px;
            margin-right: auto;
        }

        .g_id_signin {
            display: inline-block;
            margin-top: 10px;
        }

        #google-signin-container {
            text-align: center;
            margin-top: 20px;
        }

        .g_id_signin {
            display: inline-block;
            margin-top: 10px;
        }
        #logout-button {
    background-color: #ff0000; /* لون الخلفية */
    color: #ffffff; /* لون النص */
    border: none; /* إزالة حدود الزر */
    padding: 10px 20px; /* تحديد الهامش الداخلي */
    font-size: 16px; /* حجم الخط */
    cursor: pointer; /* تغيير المؤشر عند التحويل إلى الزر */
    border-radius: 5px; /* شكل الزوايا */
}

#logout-button:hover {
    opacity: 0.8; /* تقليل الشفافية عند تحويل المؤشر إلى الزر */
}

    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="index.html">CyberNest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.html"> الرئيسية </a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html"> من نحن </a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">تواصل معنا</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown
                        " aria-expanded="false">قسم التوعية </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                            <li><a class="dropdown-item" href="blog-home.html">مدونة الطلاب </a></li>
                            <li><a class="dropdown-item" href="blog-post.html">مدونة الموظفين </a></li>
                            <li><a class="dropdown-item" href="blog-post.html">مدونة العامة  </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">قسم التطوير</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href="portfolio-overview.html">مسارات الامن السيبراني </a></li>
                            <li><a class="dropdown-item" href="portfolio-item.html">مصادر</a></li>
                            <li><a class="dropdown-item" href="portfolio-item.html">تحديات CTF </a></li>
                        </ul>
                    </li>
                   <!-- <li class="nav-item"><a class="nav-link" href="sign1.php">تسجيل</a></li>-->
                    <li class="nav-item"><a class="nav-link" href="sign2.php">دخول</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-shrink-0" style="margin-bottom: 80.9px;">
        <div class="login-container">
            <h2>تسجيل الدخول</h2>
            <form action="login_post.php" method="POST" id="loginForm">

                <?php if(isset($email_error)){ echo '<span class="error-message">' . $email_error . '</span>'; } ?>
                <input type="email" id="email" name="email" placeholder="email " required>

                <?php if(isset($pass_error)){ echo '<span class="error-message">' . $pass_error . '</span>'; } ?>    
                <input type="password" id="password" name="password" placeholder="password" required>
                <input type="checkbox" id="show-password">
                <label for="show-password">show password</label>
                <div id="captcha-container">
                    <div id="captcha"></div>
                    <input type="text" id="captchaInput" placeholder="Enter CAPTCHA">
                    <span class="change-captcha-button" onclick="generateCaptcha()">&#8635;</span>
               
 <label for="otp">OTP:</label>
            <input type="text" id="otp" name="otp" required>
               
                </div>
                <div id="message" class="message"></div>

                <form action="path/to/your/backend" method="POST">
                
    <!-- الحقول الأخرى في النموذج -->
    <div class="g-recaptcha" data-sitekey="6LcOC-opAAAAADymKbQQUUvsUDcnDEVq9Kn9KQSF"></div>
    <br>


                
                
                
                <input type="submit" value="تسجيل الدخول">
            </form>

            <br>
        <p> <h5>ليس لديك حساب ؟</h5> <a href="sign1.php"><h5>انشئ حسابك الان</h5></a></p>
            <h2>تسجيل الدخول باستخدام حساب</h2>
            <h2>*Google*</h2>

            
            <div id="g_id_onload"
     data-client_id="854270459820-rkj4tqm796n7tcnjrhscoq685jenqh6c.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
     data-callback="logincallback"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="pill"
     data-theme="outline"
     data-text="signin_with"
     data-size="large"
     data-logo_alignment="left">

</div>
<button id="logout-button" onclick="logout()">Logout from google</button>


        </div>

    </main>

    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">جميع الحقوق محفوظة &copy; فريق التوعية الأمنية 2023</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode@3.1.2/build/jwt-decode.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</script>
<script>
            
        function logincallback(response){
        console.log(jwt_decode(response.credential))
        location.reload();

        }


        function logout() {
            google.accounts.id.revoke('mohmmadradaideh8@gmail.com', () => {
                location.reload();
            });
        }
        
        

        function generateCaptcha() {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            var captchaLength = 6; // غيِّر هذا لتعديل طول CAPTCHA
            var captcha = '';
            for (var i = 0; i < captchaLength; i++) {
                var randomIndex = Math.floor(Math.random() * chars.length);
                captcha += chars[randomIndex];
            }
            document.getElementById('captcha').textContent = captcha;
        }

        function validateCaptcha() {
            var userInput = document.getElementById('captchaInput').value.trim();
            var captchaText = document.getElementById('captcha').textContent.trim();
            var messageElement = document.getElementById('message');

            if (userInput === captchaText) {
                messageElement.textContent = "correct entry";
                messageElement.classList.remove("error");
                messageElement.classList.add("success");
            } else {
                messageElement.textContent = "incorrect entry";
                messageElement.classList.remove("success");
                messageElement.classList.add("error");
            }
        }

        document.getElementById('captchaInput').addEventListener('input', validateCaptcha);

        var recaptchaAlert = document.getElementById('recaptcha-alert');

// في دالة التحقق من CAPTCHA
function validateCaptcha() {
    var userInput = document.getElementById('captchaInput').value.trim();
    var captchaText = document.getElementById('captcha').textContent.trim();
    var messageElement = document.getElementById('message');
    var recaptchaAlert = document.getElementById('recaptcha-alert');

    if (userInput === captchaText) {
        messageElement.textContent = "correct entry";
        messageElement.classList.remove("error");
        messageElement.classList.add("success");
    } else {
        messageElement.textContent = "incorrect entry";
        messageElement.classList.remove("success");
        messageElement.classList.add("error");
    }

    // تحقق من CAPTCHA
    if (userInput === captchaText && grecaptcha.getResponse().length !== 0) {
        recaptchaAlert.textContent = "تم التحقق من reCAPTCHA بنجاح";
        recaptchaAlert.classList.remove("error");
        recaptchaAlert.classList.add("success");
    } else {
        recaptchaAlert.textContent = "الرجاء إكمال التحقق من reCAPTCHA";
        recaptchaAlert.classList.remove("success");
        recaptchaAlert.classList.add("error");
    }
}

// في دالة إرسال النموذج
document.getElementById('loginForm').addEventListener('submit', function(event) {
    var email = document.getElementsByName('email')[0].value;
    var password = document.getElementsByName('password')[0].value;
    var captcha = document.getElementById('captchaInput').value.trim();
    var captchaText = document.getElementById('captcha').textContent.trim(); // قيمة CAPTCHA الصحيحة

    if (email === '' || password === '' || captcha === '') {
        event.preventDefault();
        alert('يجب ملء جميع الحقول لتسجيل الدخول');
        return;
    }

    if (captcha !== captchaText) {
        event.preventDefault();
        alert('الرجاء إدخال CAPTCHA بشكل صحيح');
    }

    if (!isValidemail(email) || !isValidPassword(password)) {
        event.preventDefault();
        alert('اسم المستخدم أو كلمة المرور غير صحيحة');
        return;
    }

    // تحقق من CAPTCHA
    if (captcha === captchaText && grecaptcha.getResponse().length !== 0) {
        // تحقق من reCAPTCHA
        // يمكنك هنا إضافة أي إجراءات إضافية بعد التحقق من الـ reCAPTCHA
    } else {
        event.preventDefault();
        alert('الرجاء إكمال التحقق من reCAPTCHA');
    }
});

        function isValidemail(email) {
            // تحقق من صحة اسم المستخدم (يمكنك تعديل هذا حسب الحاجة)
            return email.length >= 3;
        }

        function isValidPassword(password) {
            // تحقق من صحة كلمة المرور (يمكنك تعديل هذا حسب الحاجة)
            return password.length >= 6;
        }

        generateCaptcha(); // يُولِّد CAPTCHA عند تحميل الصفحة

        // إظهار كلمة المرور
        document.getElementById('show-password').addEventListener('change', function() {
            var passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
        document.addEventListener('DOMContentLoaded', generateCaptcha);

       

    </script>
</body>
</html>


