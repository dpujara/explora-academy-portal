<?php
session_start();
unset($_SESSION['start']);
unset($_SESSION['categoryv']);
unset($_SESSION['searchv']);
unset($_SESSION['category']);
unset($_SESSION['search']);
session_destroy();
echo "<script type='text/javascript'> window.location='index.php'</script>"; 
?>