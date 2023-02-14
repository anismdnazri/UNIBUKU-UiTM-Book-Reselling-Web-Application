<?php
session_start();
session_destroy();
?>
<script languange = 'Javascript'>
alert('You have successfully logout.');
	location.href = 'adminLogin.php';
</script>