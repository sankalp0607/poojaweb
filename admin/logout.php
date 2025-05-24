<?php
session_start();
session_destroy();
?>
<script>
    alert("Do you want logout dashboard successfully!");
    window.location.href = './login.php'; // Redirect to login page after alert
</script>
<?php
exit();
?>
