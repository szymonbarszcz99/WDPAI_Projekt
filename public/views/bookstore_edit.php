<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/bookstore_edit_style.css">
    <title>Bookstore Edit</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Book<br>Dynasty</h1>
        </div>
        <div class="bookstore_info_container">
            <div class="messages" action="bookstore_edit">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <?php if(isset($link)): ?>
                    <p><a href="BookstoreInfo?id=<?= $_GET['id']; ?>">Go to your page</a></p>
                <?php endif; ?>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <input name="id" type="text" value="<?= $_GET['id']; ?>" readonly>
                <input name="name" type="text" placeholder="Bookstore Name" required>
                <input name="address" type="text" placeholder="Address" required>
                <input name="telephone" type="tel" placeholder="Contact number">
                <input name="site" type="text" placeholder="Webpage">
                <label for="hours">Opening hours</label>
                <table name="hours">
                    <tr>
                        <td>Monday</td>
                        <td>
                            <input name="mon_open_time" type="text" placeholder="00:00" required> -
                            <input name="mon_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <td>
                            <input name="tue_open_time" type="text" placeholder="00:00" required> -
                            <input name="tue_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>
                            <input name="wed_open_time" type="text" placeholder="00:00" required> -
                            <input name="wed_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Thursday</td>
                        <td>
                            <input name="thur_open_time" type="text" placeholder="00:00" required> -
                            <input name="thur_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>
                            <input name="fri_open_time" type="text" placeholder="00:00" required> -
                            <input name="fri_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Saturday</td>
                        <td>
                            <input name="sat_open_time" type="text" placeholder="00:00" required> -
                            <input name="sat_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunday</td>
                        <td>
                            <input name="sun_open_time" type="text" placeholder="00:00" required> -
                            <input name="sun_close_time" type="text" placeholder="00:00" required>
                        </td>
                    </tr>
                </table>
                <textarea name="description" placeholder="Description" maxlength="400" rows="10"></textarea>
                <label for="picture">Choose photos</label>
                <input type="file" name="pictures[]" multiple>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</body>
