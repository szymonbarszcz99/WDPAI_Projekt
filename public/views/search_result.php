<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/result_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>RESULTS</title>
</head>
<body>
    <div class="logo_buttons">
        <div class=title>
            Book<br>Dynasty
        </div>
        <button class=login_button>Log in <i class="material-icons" style="font-size: 1em;">person</i></button>
        <button class=sign_up_button>Sign up <i class="material-icons" style="font-size: 1em;">person_add</i></button>
    </div>
    <div class="searchbar">
        <form method="POST" action="pass_argument">
            <input placeholder="Search city" name="search">
        </form>
    </div>
    <div class="result">
        <?php
        if(isset($result)){
            foreach($result as $one_result) {
                echo $one_result ;

            }
        };
        echo "<br>";
        echo $result['name'];
        echo $result['address'];
        ?>
        <div class="res_1">
            <img>
            <h1>$result[0]</h1>
            <div class="rate">
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
            </div>
           <p>Szeroka 24, Kraków, Małopolskie, Polska</p>
           <article>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
           </article>
        </div>

    <hr>
    </div>
</body>