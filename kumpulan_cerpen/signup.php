<?php include("inc/header.php"); ?>
<section class="main-content">
    <div class="container bg-light" style="margin-top: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.5);">
        <h3>Registrasi</h3>
        <hr style="background-color: #000000">
        <h5>DATA PRIBADI</h5>
        <form method="POST" action="?act=proses_daftar" name="myform" style="margin-bottom: 150px;">
            <label for="nama">Nama :</label><br>
            <input type="text" name="nama" id="nama" class="form-control">
            
            <label for="email">password :</label><br>
            <input type="password" name="pass" id="pass" class="form-control">
            
            <small class="text-info">*Wajib Diisi</small>
            <hr style="background-color: #000000">
            <button type="submit" class="btn btn-dark btn-lg">Daftar</button>
        </form>
    </div>
</section>
<?php
if(isset($_GET['act'])AND $_GET['act']=='proses_daftar'){
            
                $tambah = mysqli_query($connect, "INSERT into user(username, password, role)VALUES('$_POST[nama]','$_POST[pass]', '2')");
            if($tambah){
          header('location:signin.php');
            }else{
                header('location:signup.php');
            }
            echo "<hr>";
        }
 include("inc/footer.php"); ?>