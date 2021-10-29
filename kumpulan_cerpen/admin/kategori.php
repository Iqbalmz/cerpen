<?php $page = "Kategori Buku";
	include('inc/header.php');
	include('inc/sidebar.php');?>

	<section class="main">
		<h1>Kategori Buku</h1>
		<hr>
		<?php 
		if(isset($_GET['act'])AND $_GET['act']=='tambah'){
			echo"
			<h3>Tambah Data</h3>
			<form name='tambah' action='?act=proses_tambah' method='post'>
				<p><input type='text' name='kategori' placeholder='kategori' required></p>
				<p><input type='submit' name='proses' value='SIMPAN' class='btn btn-danger'></p>
			</form>
			<hr>
			";
		}
		elseif(isset($_GET['act'])AND $_GET['act']=='proses_tambah'){
			$tambah = mysqli_query($connect, "INSERT INTO kategori(nama_kategori) VALUES ('$_POST[kategori]')");
			if($tambah){
				echo "	Data berhasil ditambahkan!";
			}else{
				echo "	Data Gagal Ditambahkan!";
			}
			echo "<hr>";
		}elseif (isset($_GET['act']) AND $_GET['act']=='edit') {
			$isi = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'"));
			echo"
				<h3>Edit Data</h3>
				<form name='edit' action='?act=proses_edit' method='post'>
					<input type='hidden' name='id' value='$isi[id_kategori]'>
					<p><input type='text' name='kategori' value='$isi[nama_kategori]' placeholder='kategori' required></p>
					<p><input type='submit' name='proses' value ='simpan' class='btn btn-danger'></p>
				</form>
				<hr>";
		}elseif (isset($_GET['act'])AND $_GET['act']=='proses_edit') {
			$edit = mysqli_query($connect, "UPDATE kategori set nama_kategori = '$_POST[kategori]' where id_kategori = '$_POST[id]'");
			if($edit){
				echo "Data berhasil di Edit!";
			}else{
				echo "Data Gagal di Edit";
			}
		}elseif (isset($_GET['act'])AND $_GET['act']== 'hapus') {
			$hapus = mysqli_query($connect, "DELETE FROM kategori where id_kategori ='$_GET[id]'");
			if($hapus){
				echo "Data Berhasil dihapus!";
			}else{
				echo "Data Gagal Dihapus";
			}
			echo "<hr>";
		}
		?>
		<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modalTambah">Tambah</button>
		
		<table class="tabel" style="background-color: #FFFFFF;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = mysqli_query($connect, "SELECT * FROM kategori");

				if(mysqli_num_rows($query)>0){
					while($data = mysqli_fetch_array($query)){
						echo"
							<tr>
								<td>$data[id_kategori]</td>
								<td>$data[nama_kategori]</td>
								<td>
									
									<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalEdit".$data['id_kategori']."'>Edit</button>
									
									<a href='?act=hapus&id=$data[id_kategori]' OnClick=\"return confirm('Anda yakin menghapus data ?');\")>
									<button type='button' class='btn merah'>Hapus</button>
									</a>
								</td>
							</tr>
						";
					}
				}else{
					echo "
					<tr>
						<td colspan='3'>Tidak ada data.</td>
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
                <h5 class="modal-title">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form name='tambah' action='?act=proses_tambah' method='post'>
                <div class="form-group">
                    <label for="nama"></label>
                    <input type="text" name="kategori" id="nama" class="form-control" placeholder="Masukan Nama Kategori" required>
                </div>
                <div class="form-group">
                  
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
				$query = mysqli_query($connect, "SELECT * FROM kategori");

				if(mysqli_num_rows($query)>0){
					while($data = mysqli_fetch_array($query)){
						?>
<div class="modal fade" id="modalEdit<?php echo $data['id_kategori']?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form name='tambah' action='?act=proses_edit' method='post'>
                <div class="form-group">
                    <label for="nama"></label>
                    <input type="hidden" name="id" value="<?php echo $data['id_kategori']?>">
                    <input type="text" name="kategori" value="<?php echo $data['nama_kategori']?>" id="nama" class="form-control" placeholder="Masukan Nama Kategori" required>
                </div>
                <div class="form-group">
                  
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