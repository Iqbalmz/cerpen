<?php $page = "PENCARIAN";?>
<?php include("inc/header.php");?>

	<div class="container" style="margin-bottom: 175px">
           <hr>
		<h2>Hasil pencarian untuk<span>"<?php echo $_GET['search']; ?></span>"</h2>
		<hr>
          <div class="row"> 
            <?php 
                $query = mysqli_query($connect, "SELECT alt.id_cerpen, alt.judul, alt.penulis, wil.id_Kategori, wil.nama_kategori, alt.cerita from
          cerpen alt, kategori wil where alt.id_kategori = wil.id_kategori and alt.judul Like '%$_GET[search]%'");
                if(mysqli_num_rows($query)>0){
                    while($data = mysqli_fetch_array($query)){
                        ?>

                        <div class="col-md-4">
        <div class="card" style="box-shadow: 0 2px 20px rgba(0,0,0,0.5);">
            <div class="card-header">
            
              <h4><?php echo $data['judul'] ?></h4>
                    
            <div class="card-body" style='color: #00ada7'>
                <h6 class="font-medium">penulis: <?php echo $data['penulis'] ?></h6> <span class="m-b-15 d-block">kategori:<?php echo $data['nama_kategori'] ?> </span>
                        <div class="comment-footer"> <span class="text-muted float-right"><a href="detail_cerpen.php?id=<?php echo $data['id_cerpen']?>"><button class="btn btn-info float-right">Baca</button></a></span> </div>
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
<?php include("inc/footer.php");?>


