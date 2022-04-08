<?php include('view/header.php') ?>

<h1>Thank you for signing out, <?php echo $_SESSION['userid'] ?>.</h1>
<a href=".">Click here</a> to view our vehicle list.

<?php
$_SESSION = array();
session_destroy();

$name = session_name();
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name,'',$expire,$path,$domain,$secure,$httponly);
?>

<?php include('view/footer.php') ?>