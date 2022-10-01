<?php session_start();?>
<header>
	<div class="header">
		<div class="optionsBar">
			<i class="fa-solid fa-user"></i><span class="user"><?php echo $_SESSION['nombre'].' -'.$_SESSION['email']; ?></span>
			<a href="../todos/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
		</div>
	</div>
	<?php include "nav.php"; ?>
</header>
<div class="modal">
	<div class="bodyModal">
	</div>
</div>