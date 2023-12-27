<?php session_start();
if (!isset($_SESSION["is_admin"])) {
    header("Location: index.php");
}
require_once("Controller/category.php");
require_once("Controller/language.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Interface Administrateur</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="js/ajax.js"></script>
    <script src="js/script.js"></script>
    <script src="js/print.js"></script>
    <script src="js/printLanguagesFromProject.js"></script>
    <script>
        function updateProjectSelection() {
            var value = document.getElementById("category-selection").value;
            if (value != 0) {
                document.getElementById("project-selection-container").classList.remove("d-none");
            } else {
                document.getElementById("project-selection-container").classList.add("d-none");
                document.getElementById("language-selection-container").classList.add("d-none");
                document.getElementById("supress-button").classList.add("d-none");
            }
            update();
        }

        function updateLanguageSelection() {
            var value = document.getElementById("project-selection").value;
            if (value != 0) {
                document.getElementById("language-selection-container").classList.remove("d-none");
                document.getElementById("supress-button").classList.remove("d-none");
            } else {
                document.getElementById("language-selection-container").classList.add("d-none");
                document.getElementById("supress-button").classList.add("d-none");
            }
            printLanguagesFromProject();
            printProject();
        }
    </script>
</head>

<body>
    <?php include_once("navbar.php") ?>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="input-group">
                    <label for="category-selection" class="input-group-text">Sélection de la catégorie</label>
                    <select class="form-select" id="category-selection" onchange="updateProjectSelection();">
                        <?php echo printCategories(true); ?>
                    </select>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="input-group col-auto d-none" id="project-selection-container">
                    <label for="project-selection" class="input-group-text">Sélection du projet</label>
                    <select class="form-select" id="project-selection" onchange="updateLanguageSelection();">
                    </select>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="input-group col-auto d-none" id="language-selection-container">
                    <label for="language-selection" class="input-group-text">Sélection de langue</label>
                    <select class="form-select" id="language-selection">
                    </select>
                </div>
            </div>
            <div class="col-md-auto">
                <button id="supress-button" class="btn btn-danger d-none" data-bs-toggle="modal"
                    data-bs-target="#supressModal">Supprimer le projet</button>

                <div class="modal fade" id="supressModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de projet</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Supprimer le projet?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Abandonner</button>
                                <form method="post" action="Controller/delete.php">
                                    <input type="submit" class="btn btn-danger" value="Définitivement supprimmer"></input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
    <div id="show-img" class="text-center"></div>
</body>

</html>