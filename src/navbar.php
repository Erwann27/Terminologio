<nav class="navbar bg-dark-subtle mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Bienvenue
            <span class="<?php
            if(isset($_SESSION["is_admin"])){
                echo "text-danger";
            } ?>">
                <?php
                if (isset($_SESSION["username"])) {
                    echo $_SESSION["username"];
                    ?>
                </span>
            </a>
            <a class="icon-link" href="Controller/disconnect.php">
                <i class="bi-power" style="font-size: 3ex; color: black;"></i>
            </a>
            <?php
                } else {
                    ?>
            </a>
            <a href="login.php">
                Se connecter
            </a>
            <?php
                }
                ?>
    </div>
</nav>