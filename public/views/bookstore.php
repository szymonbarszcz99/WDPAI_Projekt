<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/bookstore_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>BOOKSTORE</title>
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
    <div class="container">
        <?
        echo "<div class=\"info\">";
            echo "<h1>$info[name]</h1>";
            echo "<div class=\"rate\">";
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $info['rate']) {
                        echo "<i class=\"material-icons\" style=\"display:inline\">star_rate</i>";
                    } else {
                        echo "<i class=\"material-icons\" style=\"display:inline\">star_border</i>";
                    }
                };
            echo "</div>";
            echo "<div class=\"display-grid\">";
                echo "<i class=\"material-icons\" style=\"display:inline\">location_city</i><p>$info[address]</p>";
                echo "<i class=\"material-icons\" style=\"display:inline\">call</i><p>$info[telephone]</p>";
                echo "<i class=\"material-icons\" style=\"display:inline\">computer</i><p>$info[webpage]</p>";
                echo "<i class=\"material-icons\" style=\"display:inline\">schedule</i>";
            echo "</div>";
            echo "<table>";
                echo "<tr>";
                    echo "<td>Monday</td>";
                    echo "<td>$info[mon]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Tuesday</td>";
                    echo "<td>$info[tue]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Wednsday</td>";
                    echo "<td>$info[wed]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Thursday</td>";
                    echo "<td>$info[thur]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Friday</td>";
                    echo "<td>$info[fri]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Saturday</td>";
                    echo "<td>$info[sat]</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>Sunday</td>";
                    echo "<td>$info[sun]</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";
        echo "<div class=\"picture_text\">";
            $picture_name=explode(",", $info['photos'])[0];
            echo "<img src=\"/public/img/uploads/$picture_name \" alt=\"Image\">";
            echo "<p>$info[description]</p>";
        echo "</div>";
    echo "</div>";
    ?>
    <div class="reviews">
        <h1>Reviews</h1>
        <div class="review">
            <hr>
            <p class="name">Name and Surname</p>
            <p class="date">DD.MM.YYYY</p>
            <div class="rate">
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
            </div>
            <article>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.
            </article>
        </div>
    </div>
</body>