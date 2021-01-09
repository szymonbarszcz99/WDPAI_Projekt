<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/index_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>HOME</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Book<br>Dynasty</h1>
        </div>
        <div class="search_container">
            <form method="post" action="pass_argument">
                <input name="search" type="text" placeholder="City">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="additional_buttons">
        <?php if(!isset($_COOKIE['name']) or !isset($_COOKIE['id'])):?>
            <a href="login"><button class="login_button">Log in <i class="material-icons my" >person</i></button></a>
            <a href="register"><button class="sign_up_button">Sign up <i class="material-icons my" >person_add</i></button></a>
        <?php else: ?>
            <a href="profileInfo"><button class="login_button"><?= $_COOKIE['name']; ?> <i class="material-icons my" >person</i></button></a>
            <a href="logout"><button class="sign_up_button">Log out <i class="material-icons my" >exit_to_app</i></button></a>
        <?php endif; ?>
    </div>
</body>