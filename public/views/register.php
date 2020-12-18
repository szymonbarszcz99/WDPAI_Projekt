<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/sign_up_style.css">
    <script type="text/javascript" src="./public/js/ValidateRegistration.js" defer></script>
    <title>SIGN UP</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Book<br>Dynasty</h1>
        </div>
        <div class="login_container">
            <div class="messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>
            <form action="register" method="POST">
                <input name="name" type="text" placeholder="Name" required>
                <input name="surname" type="text" placeholder="Surname" required>
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Password" required>
                <input name="confirmedPassword" type="password" placeholder="Repeat Password" required>

                <button type="submit" >Sign up</button>
            </form>
        </div>
    </div>
</body>