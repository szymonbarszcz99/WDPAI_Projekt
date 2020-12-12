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
        if($result!=null) {
            foreach ($result as $one_result) {
                echo "<div class=\"res_1\">";
                $picture_name=explode(",", $one_result['photos'])[0];
                echo "<img src=\"/public/img/uploads/$picture_name \">";
                echo "<a href=\"BookstoreInfo?id=$one_result[id]\"><h1>$one_result[name]</h1></a>";
                echo "<div class=\"rate\">";
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $one_result['rate']) {
                        echo "<i class=\"material-icons\" style=\"display:inline\">star_rate</i>";
                    } else {
                        echo "<i class=\"material-icons\" style=\"display:inline\">star_border</i>";
                    }
                };
                echo "</div>";
                echo "<p>$one_result[address]<p>";
                echo "<article>";
                echo "$one_result[description]";
                echo "</article>";
                echo "<hr>";
                echo "</div>";
            };
            echo "</div>";
        }
        else {
            echo "<h1>No bookstores found</h1>";
        }
        ?>

    </div>
</body>