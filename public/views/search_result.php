<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/result_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>RESULTS</title>
</head>
<body>
    <div class="logo_buttons">
        <?php include ('header.php');?>
    </div>
    <div class="searchbar">
            <input placeholder="Search" name="search">
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
                            <i class="material-icons rate" >grade</i>
                        <?php else: ?>
                            <i class="material-icons rate" >star_border</i>
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

<template id="template">
    <div class="res_1">

        <img src="">
        <form action="" method="GET">
            <button name="id"><h1>name</h1></button>
        </form>
        <div class="rate">

        </div>
        <p>address<p>
            <article>
                description
            </article>
        <hr>
    </div>
</template>