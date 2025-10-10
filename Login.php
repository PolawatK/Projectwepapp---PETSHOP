<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/logins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-bd">
        <div class="head-container">
            <div class="logo">
                <img src="img/Logo-coin.png">
            </div>
            <div class="Container-login">
                <div class="leftside">
                    <div class="toggle-left-box">
                        <h1>ยินดีต้อนรับเข้าสู่ GOODDAYSHOP</h1>
                        <p>หากคุณเป็นเเอดมิน? คลิ๊กเลย!</p>
                        <button class="admin-btn">Admin</button>
                    </div>
                    <div class="toggle-right-box">
                        <h1>หลังบ้านพร้อมจัดการเเล้ว!</h1>
                        <p>หากคุณเป็นบุคคลทั่วไป? คลิ๊กเลย!</p>
                        <button class="user-btn">User</button>
                    </div>
                </div>
                <div class="rightside">
                    <div class="login-user">
                        <form action="user">
                            <h1>เข้าสู่ระบบ</h1>
                            <div class="input-box">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" required placeholder="Username">
                            </div>
                            <div class="input-box">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" required placeholder="Password">
                            </div>
                            <div class="check-box">
                                <input type="checkbox">
                                <p>จดจำรหัสผ่าน</p>
                            </div>
                            <button type="submit" class="sub-btn">เข้าสู่ระบบ</button>
                        </form>
                        <div class="regis-box">
                            <p>ไม่มีบัญชีผู้ใช้?</p>
                            <a href="">สมัครสมาชิก</a>
                        </div>
                    </div>
                    <div class="login-admin">
                        <form action="admin">
                            <h1>เข้าสู่ระบบเเอดมิน</h1>
                            <div class="input-box">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" required placeholder="Username">
                            </div>
                            <div class="input-box">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" required placeholder="Password">
                            </div>
                            <div class="check-box">
                                <input type="checkbox">
                                <p>จดจำรหัสผ่าน</p>
                            </div>
                            <button type="submit" class="sub-btn">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    <script src="js/login-script.js"></script>
</body>
</html>