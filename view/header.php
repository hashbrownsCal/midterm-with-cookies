<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" href="view\css\bootstrap.css" />
</head>

<body class="container-sm">

<?php if ($action != "register" && !isset($_SESSION['userid'])) { ?>
    <p><a href="?action=register">Register</a></p>
<?php } else if ($action != "register" && $action != "logout" && isset($_SESSION['userid'])) {?>
    <p>Welcome <?php echo $_SESSION['userid'] ?>! (<a href="?action=logout">Sign Out</a>)</p>
<?php } else if ($action == "register" || $action == "logout") {} ?>

<header>
        <h1>Zippy Used Autos</h1>
    </header>

    <hr>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>