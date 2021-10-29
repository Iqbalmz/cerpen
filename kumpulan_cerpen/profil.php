<?php 
include("inc/header.php"); 
session_start();
    if(!isset($_SESSION['id_user'])){
        header('location:signin.php');
    }
    $isi = mysqli_fetch_array(mysqli_query($connect, "SELECT * from user where id_user = '$_SESSION[id_user]'"));
?>
<section class="main-content" style="margin-bottom: 150px">
    <div class="container">
        
            <h3>Akun Saya</h3>
            <hr style="background-color: #000000">
            <form method="POST" action="?act=edit" name="myform">
                <input type="hidden" name="id_user" >
                <h5>DATA PRIBADI</h5>
                <label for="nama">User Name:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $isi['username']?>">
                <input type="hidden" name="id" value="<?php echo $isi['id_user']?>">
                <label for="alamat">Paswword:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $isi['password']?>">
                <small class="text-info">*Wajib Diisi</small>
                <hr style="background-color: #000000">
                <button type="submit" class="btn btn-dark btn-lg">Simpan</button>
            </form><br>
            <a href="signout.php"><button class="btn btn-danger btn-lg">Logout</button></a>
        
    </div>
</section>


<?php 

if(isset($_GET['act'])AND $_GET['act']=='edit'){
            
                $edit = mysqli_query($connect, "UPDATE user set username='$_POST[nama]', password='$_POST[password]' where id_user='$_POST[id]'");
            if($edit){
          header('location:profil.php');
            }else{
                header('location:profil.php');
            }
            
        }
include("inc/footer.php"); ?>