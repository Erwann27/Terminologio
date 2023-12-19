<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Se connecter</title>
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
</head>

<body>
    <?php include_once("navbar.php") ?>

    <div class="container w-50">
        <form class="border p-2" method="POST" action="Controller/connection_type.php">
            <div class="form-group mb-3">
                <label for="connection-selection" class="col-form-label">Choisissez votre profil de connexion :</label>
                <select name="connection_selection" class="form-select" id="connection-selection">
                    <option selected value="0">Terminologieur</option>
                    <option value="1">Administrateur</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
        </form>
    </div>
</body>

</html>