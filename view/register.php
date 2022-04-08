<?php include('view/header.php') ?>

<?php
if ($firstname) { ?>
    <h1>Thank you for registering, <?php echo $_SESSION['userid'] ?>!</h1>
    <a href=".">Click here</a> to view our vehicle list.
<?php } else {?>
    <form class="mb-3" action="." method="get">
        <label>Please enter your firstname:</label>
        <input type="hidden" name="action" value="register" />
        <input type="text" name="firstname" />
        <input type="submit" value="Register" class="btn btn-danger" />
    </form>
<?php } ?>

<?php include('view/footer.php') ?>