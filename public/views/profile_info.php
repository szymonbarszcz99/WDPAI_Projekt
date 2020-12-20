<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile_info_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>PROFILE INFO</title>
</head>

<body>

    <div class="logo_buttons">
        <div class=title>
            Book<br>Dynasty
        </div>
        <a href="/" class="search_button"><button >Search City <i class="material-icons" style="font-size: 1em;">place</i></button></a>
    </div>
    <div class="container">
        <p class="type1">Name and surname</p>
        <p class="type2">Email</p>

        <p class="user_data1" id="user"><?= $user->getName().' '.$user->getSurname(); ?></p>
        <p class="user_data2"><?= $user->getEmail(); ?></p>

    </div>
    <div class="reviews">
        <h1>Written reviews</h1>
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
        <div class="buttons">
            <button class=edit_button>Edit <i class="material-icons" style="font-size: 1em;">create</i></button>
            <button class=delete_button>Delete <i class="material-icons" style="font-size: 1em;">delete</i></button>
        </div>
        <hr>
        
    </div>
</body>