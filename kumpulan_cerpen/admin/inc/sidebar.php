<section class="sidebar text-center">
	<div>
		<a href="login_admin.php">
			<img src="img/logoadmin.png" alt="Profil">
		</a>
	</div>
	<h1>Hai, <?php echo $_SESSION['nama'];?></h1>
	<hr>
	<p><?php echo date('l, d F Y'); ?></p>
	<hr>

	<ul class="menu">
		<li><a href="cerpen.php">Cerpen</a></li>
		<li><a href="kategori.php">Kategori</a></li>
		<li><a href="user.php">User</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<span class="text-light">Author: @magang_codelaris</span>	
</section>