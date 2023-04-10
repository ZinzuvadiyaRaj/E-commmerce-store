<?php
ob_start();
session_start();

unset($_SESSION['email']);
unset($_SESSION['password']);


?>

<script type="text/javascript">
    window.location="login.php";
</script>