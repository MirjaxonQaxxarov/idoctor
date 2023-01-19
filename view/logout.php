<?php
session_destroy();
header("Location: /locadmin/login/");
echo('<script> localStorage.clear();</script>');
exit;
?>