<!DOCTYPE html> 
<html lang="fr">
<head>
    <title>S'inscrire</title>
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
    <form method="POST" action="Controller/register.php">
        <div class="form-group mb-3">
            <label for="username">Nom d'utilisateur : </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur..." required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Mot de passe : </label>
            <input type="password" class="form-control" name="pwd" id="password" placeholder="Mot de passe" required> 
        </div>
        <div class="form-group mb-3">
            <label for="confirm-password">Confirmation du mot de passe : </label>
            <input type="password" class="form-control" name="conf-pwd" id="confirm-password" placeholder="Confirmation du mot de passe" required>
        </div>

        <button class="btn btn-primary" type="submit">S'inscrire</button>
    </form>
</body>
</html>