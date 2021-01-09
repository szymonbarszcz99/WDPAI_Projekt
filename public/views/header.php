<!DOCTYPE html>
    <div class="title">
            Book<br>Dynasty
    </div>
        <?php if(!isset($_COOKIE['name']) or !isset($_COOKIE['id'])):?>
            <a href="login" class="login_button"><button >Log in <i class="material-icons my">person</i></button></a>
            <a href="register" class="sign_up_button"><button>Sign up <i class="material-icons my" >person_add</i></button></a>
        <?php else: ?>
            <a href="profileInfo" class="login_button"><button><?= $_COOKIE['name']; ?> <i class="material-icons my" >person</i></button></a>
            <a href="logout" class="sign_up_button"><button>Log out <i class="material-icons my" >exit_to_app</i></button></a>
        <?php endif; ?>