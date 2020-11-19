<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login_style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Book<br>Dynasty</h1>
        </div>
        <div class="login_container">
            <form method="POST">
                <input name="email" type="email" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <div class="messages" action="login">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>