<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/bookstore_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="./public/js/rate.js" defer></script>
    <title>BOOKSTORE</title>
</head>

<body>
    <div class="logo_buttons">
        <?php include ('header.php'); ?>
    </div>
    <div class="searchbar">
        <form method="POST" action="pass_argument">
            <input placeholder="Search city" name="search">
        </form>
    </div>
    <div class="container">

        <div class="info">
            <h1><?= $bookstore->getName(); ?></h1>
            <div class="rate_info">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <?php if ($i < $bookstore->getRate()): ?>
                        <i class="material-icons info" >grade</i>
                    <?php else: ?>
                        <i class="material-icons info" >star_border</i>
                    <?php endif ?>
                <?php endfor ?>
            </div>
            <div class="display-grid">
                <i class="material-icons info" >location_city</i><p><?= $bookstore->getAddress() ?></p>
                <i class="material-icons info" >call</i><p><?= $bookstore->getTelephone() ?></p>
                <i class="material-icons info" >computer</i><p><?= $bookstore->getWebpage() ?></p>
                <i class="material-icons info" >schedule</i>
            </div>
            <table>
                <tr>
                    <td>Monday</td>
                    <td><?= $opening_hours->getMon(); ?></td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td><?= $opening_hours->getTue(); ?></td>
                </tr>
                <tr>
                    <td>Wednsday</td>
                    <td><?= $opening_hours->getWed(); ?></td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td><?= $opening_hours->getThur(); ?></td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td><?= $opening_hours->getFri(); ?></td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td><?= $opening_hours->getSat(); ?></td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td><?= $opening_hours->getSun(); ?></td>
                </tr>
            </table>
        </div>
        <div class="picture_text">
            <img src="/public/uploads/<?= explode(",", $bookstore->getPhotos())[0]; ?>" alt="Image">
            <p><?= $bookstore->getDescription(); ?></p>
        </div>
        <?php if($canEdit): ?>
        <a href="EditBookstore?id=<?= $bookstore->getId(); ?>"><button>Edit</button></a>
        <?endif;?>
    </div>

    <div class="reviews">
        <h1>Reviews</h1>
        <div class="review">
            <?php if(isset($_COOKIE['name']) or isset($_COOKIE['id'])):?>
            <div class="<?= $bookstore->getId();?>">
                <div class="rate_user">
                    <i id="1" class="material-icons info" >star_border</i><i id="2" class="material-icons" style="display:inline">star_border</i><i id="3" class="material-icons" style="display:inline">star_border</i><i id="4" class="material-icons" style="display:inline">star_border</i><i id="5" class="material-icons" style="display:inline">star_border</i>
                </div>
            </div>
            <?php endif;?>
            <hr>
            <p class="name">Name and Surname</p>
            <p class="date">DD.MM.YYYY</p>
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