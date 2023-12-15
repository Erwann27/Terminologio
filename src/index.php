<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Terminologio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        function updateProjectSelection() {
            var value = document.getElementById("category-selection").value;
            if (value != 0) {
                document.getElementById("project-selection-container").classList.remove("d-none");
                document.getElementById("create-project-container").classList.remove("d-none");
            } else {
                document.getElementById("project-selection-container").classList.add("d-none");
                document.getElementById("create-project-container").classList.add("d-none");
            }
        }
    </script>
</head>

<body>
    <nav class="navbar bg-dark-subtle mb-5">
        <div class="container-fluid">
            <span class="navbar-brand">Bienvenue</span>
            <?php
            if (isset($_SESSION)) {
                ?>
                <a class="icon-link" href="#">
                    <i class="bi-power" style="font-size: 3ex; color: black;"></i>
                </a>
                <?php
            } else {
                ?>
                <a href="#">
                    Se connecter
                </a>
                <?php
            }
            ?>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="input-group">
                    <label for="category-selection" class="input-group-text">Sélection de la catégorie</label>
                    <select class="form-select" id="category-selection" onchange="updateProjectSelection();">
                        <option value="0" selected>Choisir une catégorie</option>
                        <option value="1">Catégorie 1</option>
                        <option value="2">Catégorie 2</option>
                    </select>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="input-group col-auto d-none" id="project-selection-container">
                    <label for="project-selection" class="input-group-text">Sélection du projet</label>
                    <select class="form-select" id="project-selection">
                        <option selected>Projet 1</option>
                        <option value="1">Projet 2</option>
                        <option value="2">Projet 3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="d-none" id="create-project-container">
                    <input type="button" value="Créer un nouveau projet" class="form-control">
                </div>
            </div>

        </div>
    </div>
</body>

</html>