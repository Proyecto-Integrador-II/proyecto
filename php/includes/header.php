<?php 
    session_start();
    if(empty($_SESSION['active']))
	{
		header('location: ../todos/login.php');
	}
 ?>
	<header>
		<div class="header">
			<div class="optionsBar">
                <i class="fa-solid fa-user"></i><span class="user"><?php echo $_SESSION['nombre'].' -'.$_SESSION['email']; ?></span>
				<a href="../todos/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>