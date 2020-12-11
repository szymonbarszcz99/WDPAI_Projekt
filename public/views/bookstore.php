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
        <form>
            <input placeholder="Search city">
        </form>
    </div>
    <div class="container">
        <div class="info">
            <? echo "<h1>$info[name]</h1>"?>
            <div class="rate">
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
                <i class="material-icons" style="display:inline">star_border</i>
            </div>
            <p><i class="material-icons" style="display:inline">location_city</i> 46 Rynek Główny, Krakow 31-017</p>
            <p><i class="material-icons" style="display:inline">call</i> +48 123 456 789</p>
            <p><i class="material-icons" style="display:inline">computer</i> www.site.com</p>
            <i class="material-icons" style="display:inline">schedule</i>
            <table>
                <tr>
                    <td>Monday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Wednsday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>0-0</td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td>0-0</td>
                </tr>
                </tr>
            </table>
        </div>
        <div class="picture_text">
            <img></img>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
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