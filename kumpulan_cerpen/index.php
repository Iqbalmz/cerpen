<?php 
    include('inc/header.php');
?>

    <!--banner-->

    <section id="banner">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Hallo, Selamat Datang di Website Kumpulan Cerpen Indonesia</h4>
                        <p>Semoga anda menikmati dan terbantu dengan adanya website kumpulan cerpen ini </p>
                    </div>

                    <div class="col-md-6">
                    <img src="assets/img/banner.png" width="400px" class="ban-img img-fluid ml-5" alt="">
                </div> 
                <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3dfc1" fill-opacity="1" d="M0,128L48,133.3C96,139,192,149,288,138.7C384,128,480,96,576,90.7C672,85,768,107,864,133.3C960,160,1056,192,1152,186.7C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
<h4>Cerpen</h4>
    </section>
<section  style="background-color: #f3dfc1">
        <div class="container">
            <h2 class="mt-5 text-center">Kumpulan Cerpen</h2>
          <div class="row mb-3"> 
            <?php 
                $query = mysqli_query($connect, "SELECT alt.id_cerpen, alt.judul, alt.penulis, wil.id_Kategori, wil.nama_kategori, alt.cerita from
          cerpen alt, kategori wil where alt.id_kategori = wil.id_kategori");
                if(mysqli_num_rows($query)>0){
                    while($data = mysqli_fetch_array($query)){
                        ?>

                        <div class="col-md-4 mt-4 py-2">
        <div class="card card-body h-100" style="box-shadow: 0 2px 20px rgba(0,0,0,0.5);color: #00ada7">
            
            
              <h4><?php echo $data['judul'] ?></h4>
                    
            
                <h6 class="font-medium mt-2">penulis: <?php echo $data['penulis'] ?></h6> <span class="m-b-15 d-block mt-2">kategori:<?php echo $data['nama_kategori'] ?> </span>
<div class="card card-footer h-100">
                        <div class="comment-footer"><span class="text-muted float-right"><a href="detail_cerpen.php?id=<?php echo $data['id_cerpen']?>"><button class="btn btn-info float-right">Baca</button></a></span> </div>
            </div>
        
    </div>

</div>
                        
                 <?php   }
                }else{
                    echo "<h3>Tidak ada data</h3>";
                }
                
            ?>
    
    
</div>
</div>

</div>
</section>
    
 
<?php 
    include('inc/footer.php');
?>