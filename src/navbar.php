<nav class="navbar bg-dark-subtle mb-5">
    <div class="container-fluid">
        <span class="navbar-brand">Bienvenue</span>
        <?php
        if (isset($_SESSION["username"])) {
            echo $_SESSION["username"];
            ?>
            <a class="icon-link" href="Controller/Deconnect.php">
                <i class="bi-power" style="font-size: 3ex; color: black;"></i>
            </a>
            <?php
        } else {
            ?>
            <a href="login.php">
                Se connecter
            </a>

            <a href="register.php">
                S'inscrire
            </a>
            <?php
        }
        ?>
    </div>
</nav>