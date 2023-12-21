<nav class="navbar bg-dark-subtle mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Bienvenue
            <span class="<?php
            if (isset($_SESSION["is_admin"])) {
                echo "text-danger";
            } ?>">
                <?php
                if (isset($_SESSION["username"])) {
                    echo $_SESSION["username"];
                    ?>
                </span>
            </a>
            <div class="d-flex">
                <?php

                if (isset($_SESSION["username"])) {
                    if (!isset($_SESSION["is_admin"])) {
                        ?>
                        <div id="create-project-container" class="me-5">
                            <input type="button" value="Créer un nouveau projet" class="form-control btn btn-success" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">

                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1"
                                id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Importation d'une image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>


                                <div class="offcanvas-body">
                                    <form method="POST" action="Controller/upload.php" enctype="multipart/form-data">
                                        <div class="form-group mb-3">
                                            <label for="title">Titre de l'image : </label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Titre"
                                                required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="select-language">Langue par défaut : </label>
                                            <select name="select-language" id="select-language" class="form-select">
                                                <?php echo printLanguages(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="category-selection">Catégorie : </label>
                                            <select name="category-selection" id="select-category" class="form-select">
                                                <?php echo printCategories(false); ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pic" class="form-label">Choisissez une image:</label>
                                            <input class="form-control" type="file" id="pic" name="pic"
                                                accept="image/png, image/jpeg">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Importer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="me-5">
                            <a class="btn btn-danger" href="admin.php">Interface administrateur</a>
                        </div>
                        <?php
                    }
                }
                ?>
                <a class="icon-link" href="Controller/disconnect.php">
                    <i class="bi-power" style="font-size: 3ex; color: black;"></i>
                </a>
                <?php
                } else {
                    ?>
                </span>
                </a>
                <a href="login.php">
                    Se connecter
                </a>
                <?php
                }
                ?>
            </div>
    </div>
</nav>