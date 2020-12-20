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
        <?php if(!isset($_COOKIE['name']) or !isset($_COOKIE['id'])):?>
            <a href="login" class="login_button"><button >Log in <i class="material-icons" style="font-size: 1em;">person</i></button></a>
            <a href="register" class="sign_up_button"><button>Sign up <i class="material-icons" style="font-size: 1em;">person_add</i></button></a>
        <?php else: ?>
            <a href="profileInfo" class="login_button"><button><?= $_COOKIE['name']; ?> <i class="material-icons" style="font-size: 1em;">person</i></button></a>
            <a href="logout" class="sign_up_button"><button>Log out <i class="material-icons" style="font-size: 1em;">exit_to_app</i></button></a>
        <?php endif; ?>
    </div>
    <div class="searchbar">
        <form method="POST" action="pass_argument">
            <input placeholder="Search city" name="search">
        </form>
    </div>
    <div class="result">
        <?php if($bookstores!=null): ?>
            <?php foreach ($bookstores as $one_result): ?>
                <div class="res_1">

                    <img src="/public/uploads/<?= explode(",", $one_result->getPhotos())[0];?>">
                    <form action="BookstoreInfo?id=<? $one_result->getId(); ?>" method="GET">
                        <button value="<?= $one_result->getId(); ?>" name="id"><h1><?= $one_result->getName(); ?></h1></button>
                    </form>
                    <div class="rate">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <?php if ($i < $one_result->getRate()): ?>
                            <i class="material-icons" style="display:inline">star_rate</i>
                        <?php else: ?>
                            <i class="material-icons" style="display:inline">star_border</i>
                        <?php endif; ?>
                    <?php endfor ?>
                    </div>
                    <p><?= $one_result->getAddress(); ?><p>
                    <article>
                            <?= $one_result->getDescription(); ?>
                    </article>
                <hr>
                </div>


            <?php endforeach; ?>

        <?php else: ?>
            <h1>No bookstores found</h1>

        <?php endif; ?>

    </div>
</body>