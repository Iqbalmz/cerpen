<?php $page= "DETAIL BUKU"; ?>
<?php include("inc/header.php");?>

<section id="main-content" class="clearfix">
	<div class="container border border-dark mt-2 mb-2" style="background-color: #ffff; box-shadow: 0 2px 20px rgba(0,0,0,0.5);">
		<hr>
		<?php 
			$query = mysqli_query($connect, "SELECT alt.id_cerpen, alt.judul, alt.penulis, wil.id_Kategori, wil.nama_kategori, alt.cerita from
          cerpen alt, kategori wil where alt.id_kategori = wil.id_kategori and alt.id_cerpen = $_GET[id]");
			while($data = mysqli_fetch_array($query)){
				
				echo "
<div id='product-details'>
<a href='suka.php?id_cerpen=$data[id_cerpen]' class='cart-btn'>
    <button type='button' class='btn btn-info float-right'><img src='assets/img/like.png' width='40px'>  Like</button>        
        </a>
	<h1>$data[judul]</h1>
	<h3 style='color: #00ada7'>Penulis : $data[penulis]</h3>
	<h3 style='color: #00ada7'>kategori : $data[nama_kategori]</h3>
	<p>$data[cerita]</p>
	<hr>
	
</div>

		";
			}

		?>
	</div>

</section>
<?php include("inc/footer.php")?>
