<?php
	session_start();
	session_destroy();
	header('Location: /ProyectoFinal/index.html');
	exit(0);
?>