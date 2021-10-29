<?php $page="Suka";?>
<?php include("inc/header.php");
session_start();
if(!isset($_SESSION['id_user'])){
		header('location:signin.php');
	}
?>
<?php 
	if(isset($_GET['id_cerpen'])){
		$id = intval($_GET['id_cerpen']);
		$id_user = intval($_SESSION['id_user']);
		$query_insert = mysqli_query($connect, "INSERT into suka(id_user, id_cerpen) values
			('$_SESSION[id_user]', '$_GET[id_cerpen]')");
			if($query_insert){
				echo "Data berhasil ditambahkan";
			}else{
				echo "Data gagal ditambahkan";
			}
			echo "<hr>";
	}
if(isset($_GET['act'])AND $_GET['act']=='hapus'){
			$hapus = mysqli_query($connect, "DELETE from suka where id_suka ='$_GET[id_suka]'");

			if($hapus){
				echo "Data berhasil dihapus";
			}else{
				echo "Data gagal dihapus";
			}
			echo "<hr>";
		}
?>
<section id="main-content" class="cleaarfix">
	<div class="container">
		<hr>
		<div id="shopping-cart">
			<h2>Suka</h2>
			
				<table border="1" class="table table-bordered table stripped bg-light" style="margin-bottom: 280px">
					<tr class="bg-dark text-light">
						<th>#</th>
						<th>Judul Cerpen</th>
						<th>Kategori</th>
						<th>Aksi</th>
					</tr>
					
					<?php 
					$query = mysqli_query($connect, "SELECT pem.id_suka, b.judul, k.nama_kategori from suka pem, cerpen b, kategori k where pem.id_cerpen = b.id_cerpen and b.id_kategori = k.id_kategori and pem.id_user = '$_SESSION[id_user]'");
        if(mysqli_num_rows($query)>0){
        	$i = 0;
          while($data = mysqli_fetch_array($query)){  
            $i++;
            echo "
              <tr>
                <td>".$i."</td>
                <td>$data[judul]</td>
                
                <td>$data[nama_kategori]</td>
                <td>
                <a href='?act=hapus&id_suka=$data[id_suka]'>
			<button type='button' class='btn merah' OnClick=\"return confirm('Anda yakin menghapus data cerpen dari suka ?');\")>Hapus</button>
		</a>";
                
                    echo "</td>
              </tr>
            ";
          }
          }else{
          	echo "<tr>
<td colspan='4' class='text-center'>Tidak ada data</td>
          	</tr>";
          }

          ?>
				</table>
			
		</div>
	</div>
</section>
<?php include("inc/footer.php");?>