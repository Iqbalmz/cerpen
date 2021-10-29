<?php $page = "USER"; 
	include('inc/header.php');	
	include('inc/sidebar.php');
?>
<section class="main">
	<h1>Manajemen User</h1>
	<hr>
	<?php 
		if(isset($_GET['act'])AND $_GET['act']=='tambah'){
			echo "
				<h3>Tambah Data</h3>
<form name='tambah' action='?act=proses_tambah' method='post' enctype='multipart/form-data'>
	<p><input type='number' name='NIS' placeholder='NIS' required></p>
	<p><input type='text' name='nama' placeholder='Nama' required></p>
	<p><input type='text' name='username' placeholder='username' required></p>
	<p><input type='password' name='password' placeholder='Password' required></p>
	<p><input type='text' name='no_telepon' placeholder='Telepon' id='telepon' onkeyup='format_number(this)' required></p>
	<p>role: <select name='role'>
	<option value='1'>admin</option>
	<option value='2'>user</option>
	</select>
	</p>
	<p><input type='submit' name='proses' value='Simpan' class='btn btn-danger'></p>
</form>
<hr>
			";
		}elseif(isset($_GET['act'])AND $_GET['act']=='proses_tambah'){
			
				$tambah = mysqli_query($connect, "INSERT into user(username, password, role)VALUES('$_POST[nama]','$_POST[password]', '$_POST[role]')");
			if($tambah){
				echo "Data berhasil ditambahkan";
			}else{
				echo "Data gagal ditambahkan";
			}
			echo "<hr>";
		}elseif(isset($_GET['act'])AND $_GET['act']=='edit'){
			$isi = mysqli_fetch_array(mysqli_query($connect, "SELECT * from user where id_user = '$_GET[id]'"));
			echo "
				<h3>Edit Data</h3>
<form name='edit' action='?act=proses_edit' method='post' enctype='multipart/form-data'>
	<input type='hidden' name='id' value='$isi[id_user]' required>
	<p><input type='number' name='NIS' value='$isi[NIS]' placeholder='NIS' required></p>
	<p><input type='text' name='nama' value='$isi[nama_user]' placeholder='Nama' required></p>
	<p><input type='text' name='username' value='$isi[username]' placeholder='username' required></p>
	<p><input type='password' name='password' value='$isi[password]' placeholder='Password' required></p>
	<p><input type='text' name='no_telepon' placeholder='Telepon' id='telepon' value='$isi[telepon]' required></p>
	<p>role: <select name='role'>
	<option value='1'>admin</option>
	<option value='2'>user</option>
	</select>
	</p>
	<p><input type='submit' name='proses' value='Simpan' class='btn btn-danger' ></p>
</form>
<hr>
			";
		}elseif(isset($_GET['act'])AND $_GET['act']=='proses_edit'){
			$edit = mysqli_query($connect, "UPDATE user set username='$_POST[nama]', password='$_POST[password]', role='$_POST[role]' where id_user='$_POST[id]'");
			if($edit){
				echo "Data berhasil di update";
			}else{
				echo "Data gagal di update";
			}
			echo "<hr>";
		}elseif(isset($_GET['act'])AND $_GET['act']=='hapus'){
			$hapus = mysqli_query($connect, "DELETE from user where id_user ='$_GET[id]'");

			if($hapus){
				echo "Data berhasil dihapus";
			}else{
				echo "Data gagal dihapus";
			}
			echo "<hr>";
		}
	?>
		<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modalTambah">Tambah</button>
	<table class="tabel" style="background-color: #FFFFFF;">
		<thead>
			<th>ID</th>
			<th>Nama</th>
			<th>Password</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php 
				$query = mysqli_query($connect, "SELECT * from user");
				if(mysqli_num_rows($query)>0){
					while($data = mysqli_fetch_array($query)){
						echo "
						<tr>
	<td>$data[id_user]</td>
	<td>$data[username]</td>
	<td>$data[password]</td>
	<td>
		<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalEdit".$data['id_user']."'>Edit</button>
		<a href='?act=hapus&id=$data[id_user]'>
			<button type='button' class='btn merah' OnClick=\"return confirm('Anda yakin menghapus data ?');\")>Hapus</button>
		</a>
	</td>
</tr>
						
						";

					}
				}else{
					echo "
					<tr>
	<td colspan='4'>Tidak Ada Data.</td>
</tr>
					";
				}
			?>
		</tbody>
	</table>
		<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data user</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form name='tambah' action='?act=proses_tambah' method='post'>
                <div class="form-group">
                    <label for="nama">username</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama user" required>
                </div>
                <div class="form-group">
                  <label for="nama">password</label>
                    <input type="password" name="password" id="nama" class="form-control" placeholder="Masukan Password" required>
                </div>
                 <div class="form-group">
                  <label for="nama">role</label>
                    <select name='role' class="form-control">
	<option value='1'>admin</option>
	<option value='2'>user</option>
	</select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      	
      </form>
        </div>
    </div>
</div>
<?php
				$query = mysqli_query($connect, "SELECT * FROM user");

				if(mysqli_num_rows($query)>0){
					while($data = mysqli_fetch_array($query)){
						?>
<div class="modal fade" id="modalEdit<?php echo $data['id_user']?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form name='tambah' action='?act=proses_edit' method='post'>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="hidden" name="id" value="<?php echo $data['id_user']?>">
                    <input type="text" name="nama" value="<?php echo $data['username']?>" id="nama" class="form-control" placeholder="Masukan Nama User" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $data['password']?>" id="nama" class="form-control" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                  <label for="nama">role</label>
                    <select name='role' class="form-control">
	<option value='1'>admin</option>
	<option value='2'>user</option>
	</select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
      	
      </form>
        </div>
    </div>
</div>
 <?php }}
				?>

</section>
<?php include('inc/footer.php');?>