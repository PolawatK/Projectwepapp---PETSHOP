<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/registers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-bd">
        <div class="regis-box">
            <form action="register-success.php" method="post">
                <h1>สร้างบัญชีผู้ใช้</h1>
                    <div class="input-box-name">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="cus_fname" class="fname" required placeholder="ชื่อจริง">
                        <input type="text" name="cus_lname" class="lname" required placeholder="นามสกุล">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="cus_email" required placeholder="อีเมล">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="cus_password" id="cus_password" required placeholder="รหัสผ่าน">
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="confirm_password" id="confirm_password" required placeholder="ยืนยันรหัสผ่าน">
                    </div>
                    <span id="password_match_message"></span>
                    <div class="check-box">
                        <input type="checkbox" required>
                        <p>ยินยอมข้อตกลงการสมัคร</p>
                    </div>
                    <button type="submit" class="sub-btn" name="register" id="sub-btn" disabled>สร้างบัญชีผู้ใช้</button>
                    <div class="text-box">
                        <p>มีบัญชีผู้ใช้อยู่เเล้ว?</p>
                        <a href="login.php">เข้าสู่ระบบ</a>
                    </div>
            </form>
     </div>
        
    </div>
    <script src="js/regis-script.js"></script>
</body>
</html>