<?php include("inc/header.php"); ?>
<div class="container-fluid bg-light" style="width: 30%; margin-top: 100px; margin-bottom: 175px; box-shadow: 0 2px 20px rgba(0,0,0,0.5); padding: 40px;">
    <form class="form-signin" method="post" action="?act=login">

        <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
        
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputusername" name="username" class="form-control" placeholder="Username" required autofocus>
        <p></p>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <p></p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
        <a href="signup.php"><small>Belum Punya Akun ?</small></a>
    </form>
</div>

<?php
if(isset($_GET['act'])AND $_GET['act']=='login'){
            $nama     = $_POST['username'];
    $password = $_POST['password'];
   

    $query = mysqli_query($connect, "SELECT * FROM user WHERE username = '".$nama."' AND password ='".$password."' AND role='2'");

    if(mysqli_num_rows($query)==1){
        $id = mysqli_fetch_array($query);
        session_start();
          
        $_SESSION['id_user'] = $id['id_user'];
        $_SESSION['nama'] = $nama;
        $_SESSION['password'] = $password;

        header('location:profil.php');
    }else{
         header('location:signin.php');

    }
        }
 include("inc/footer.php"); ?>