<?php $page = "Cerpen";
  include('inc/header.php');
  include('inc/sidebar.php');?>

  <section class="main">
    <h1>Buku</h1>
    <hr>
    <?php 
        if(isset($_GET['act'])AND $_GET['act']=='tambah'){
          echo "
            <h3>Tambah Data</h3>
            <form name='tambah' action='?act=proses_tambah' method='post' enctype='multipart/form-data'>
            <p><input type='text' name='buku' placeholder='nama buku' required></p>
            <p><textarea name='keterangan' cols='50' rows='10' placeholder='keterangan' required='true'></textarea></p>
            <p>
              Kategori: <select name='id_kategori'>
          
          ";
          $kategori = mysqli_query($connect, "SELECT * FROM kategori");
          while($opsi=mysqli_fetch_array($kategori)){
            echo "<option class='form-control' value='$opsi[id_kategori]'>$opsi[nama_kategori]</option>";
          }
          echo "
            </select>
          </p>
          <p><input type='file' name='gambar'></p>
          <p>
          stok : <select name='stok'>
          <option value='1'>ada</option>
          <option value='2'>kosong</option>
          </select>
          </p>
          <p><input type='submit' name='proses' value='Simpan' class='btn btn-danger'></p>
          </form>
          <hr>
          ";
        }elseif (isset($_GET['act'])AND $_GET['act']=='proses_tambah') {
          if($_POST['nama_buku'] = null){
          echo "Data gagal ditambahkan";
          }else{
         $tambah = mysqli_query($connect, "INSERT into cerpen (judul, cerita, id_kategori, penulis)
              values ('$_POST[judul]', '$_POST[cerita]', '$_POST[id_kategori]', '$_POST[penulis]')");
          if($tambah){
            echo "Data berhasil ditambahkan";
          }else{
            echo "Data gagal ditambahkan";
          }
          echo "<hr>";
        }
        }elseif(isset($_GET['act']) AND $_GET['act']=='edit'){
          $isi = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM buku WHERE id_buku = '$_GET[id]'"));
          echo "
            <h3>Edit Data</h3>
            <form name='edit' action='?act=proses_edit' method='post' enctype='multipart/form-data'>
            <input type = 'hidden' name='id' value='$isi[id_buku]'>
            <p><input type='text' name='nama_buku' value='$isi[nama_buku]' placeholder='Nama buku'></p>
            <p><textarea name='Keterangan' cols='50' rows='10' placeholder='keterangan'>$isi[keterangan]</textarea></p>
            <p>
              Kategori: <select name='id_kategori'>

          ";
            $kategori = mysqli_query($connect, "SELECT * FROM kategori");
            while($opsi = mysqli_fetch_array($kategori)){
              echo "<option value='$opsi[id_kategori]'>
            $opsi[kategori]</option>";
        }
        echo "
          </select>
          <p>
          stok : <select name='stok'>
          <option value='1'>ada</option>
          <option value='2'>kosong</option>
          </select>
          </p>
          </p>
          <img src='uploads/buku/$isi[gambar]' alt='$isi [nama_buku]'><br>
          <input type='file'  name='gambar'>
          </p>
          <p><input type='submit' name='proses' value='simpan' class='btn btn-danger'></p>
          </form>
          <hr>
        ";
      }elseif (isset($_GET['act'])AND $_GET['act']=='proses_edit'){
         $edit = mysqli_query($connect, "UPDATE cerpen SET judul = '$_POST[judul]', cerita = '$_POST[cerita]', id_kategori = '$_POST[id_kategori]', penulis = '$_POST[penulis]' where id_cerpen = '$_POST[id]'");
          if($edit){
            echo "Data Berhasil Diedit";
          }else{
            echo "Data Gagal Diedit";
          }
          echo "<hr>";
        }elseif(isset($_GET['act']) AND $_GET['act']=='hapus'){
          $hapus = mysqli_query($connect, "DELETE from cerpen where id_cerpen = '$_GET[id]'");

          if($hapus){
            echo "Data Berhasil Dihapus";
          }else{
            echo "Data Gagal Dihapus";
          }
          echo "<hr>";
        }
      ?>
<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modalTambah">Tambah</button>
  <table class="tabel" style="background-color: #FFFFFF;">
    <thead>
      <th>ID</th>
      <th>Judul Cerpen</th>
      <th>Kategori</th>
      <th>penulis</th>
      <th>cerita</th>
      <th>Aksi</th>
    </thead>
    <tbody>
      <?php
      $i = 0;
        $query = mysqli_query($connect, "SELECT alt.id_cerpen, alt.judul, alt.penulis, wil.id_Kategori, wil.nama_kategori, alt.cerita from
          cerpen alt, kategori wil where alt.id_kategori = wil.id_kategori");
        if(mysqli_num_rows($query)>0){
          while($data = mysqli_fetch_array($query)){
            
            $i++;
            echo "
              <tr>
                <td>".$i."</td>
                <td>$data[judul]</td>
                <td>$data[nama_kategori]</td>
                <td>$data[penulis]</td>
                <td>$data[cerita]</td>
                <td>
                  <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modalEdit".$data['id_cerpen']."'>Edit</button>
                <a href='?act=hapus&id=$data[id_cerpen]' OnClick=\"return confirm('Anda yakin ingin menghapus data ?');\")>
                  <button type='button' class='btn merah'>Hapus</button>
                  </a>
                </td>
              </tr>
            ";
          }
        }else{
          echo "
            <tr>
              <td colspan='7'>Tidak ada data.</td>
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
                <h5 class="modal-title">Tambah Data Cerpen</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form name='tambah' action='?act=proses_tambah' method='post'>
                <div class="form-group">
                    <label for="nama">Judul</label>
                    <input type="text" name="judul" id="nama" class="form-control" placeholder="Masukan judul" required>
                </div>
                <div class="form-group">
                   <label for="nama">Cerita</label>
                   <textarea name="cerita" class="form-control"></textarea>
                </div>
                 <div class="form-group">
                   <label for="nama">Kategori</label>
                   <select name='id_kategori' class="form-control">
                 <?php  $kategori = mysqli_query($connect, "SELECT * FROM kategori");
          while($opsi=mysqli_fetch_array($kategori)){
            echo "<option class='form-control' value='$opsi[id_kategori]'>$opsi[nama_kategori]</option>";
          }
          echo "
            </select>"
            ?>
                </div>
                 <div class="form-group">
                    <label for="nama">Penulis</label>
                    <input type="text" name="penulis" id="nama" class="form-control" placeholder="penulis" required>
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
      $i = 0;
        $query = mysqli_query($connect, "SELECT alt.id_cerpen, alt.judul, alt.penulis, wil.id_Kategori, wil.nama_kategori, alt.cerita from
          cerpen alt, kategori wil where alt.id_kategori = wil.id_kategori");
        if(mysqli_num_rows($query)>0){
          while($data = mysqli_fetch_array($query)){
            ?>
     <div class="modal fade" id="modalEdit<?php echo $data['id_cerpen']?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Cerpen</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form name='tambah' action='?act=proses_edit' method='post'>
                <div class="form-group">
                    <label for="nama">Judul</label>
                    <input type="hidden" name="id" value="<?php echo $data['id_cerpen']?>">
                    <input type="text" value="<?php echo $data['judul']?>" name="judul" id="nama" class="form-control" placeholder="Masukan judul" required>
                </div>
                <div class="form-group">
                   <label for="nama">Cerita</label>
                   <textarea name="cerita" class="form-control"><?php echo $data['cerita']?></textarea>
                </div>
                 <div class="form-group">
                   <label for="nama">Kategori</label>
                   <select name='id_kategori' class="form-control">
                 <?php  $kategori = mysqli_query($connect, "SELECT * FROM kategori");
          while($opsi=mysqli_fetch_array($kategori)){
            echo "<option class='form-control' value='$opsi[id_kategori]'>$opsi[nama_kategori]</option>";
          }
          echo "
            </select>"
            ?>
                </div>
                 <div class="form-group">
                    <label for="nama">Penulis</label>
                    <input type="text" name="penulis" id="nama" class="form-control" placeholder="penulis" value="<?php echo $data['penulis']?>" required>
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
          <?php }}?>
    </section>
<?php include('inc/footer.php');?>