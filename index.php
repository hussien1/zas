<?php include "includes/header.php" ?>

<body style="background-image: url('img/log-back.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;position: relative">
    <section class="login">
        <div class="overlay">

        </div>
        
        <div class="login-inner">
            <div class="login-info-inner">
                <div class="login-img">
                    <img src="img/meeting.jpg" class="meeting">
                </div>
                <div class="login-form">
                    <form class="login-info" method="POST" action="user/login.php">
                        <input type="text" name="userName" placeholder="username">
                        <input type="password" name="password" placeholder="password">
                        <button type="submit"> login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/footer.php" ?>
