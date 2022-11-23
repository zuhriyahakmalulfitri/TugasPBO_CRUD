<!DOCTYPE html>

<?php
	include 'koneksi.php';

	$id = '';
	$nim = '';
	$namamhs = '';
	$jk = '';
	$alamat = '';
	$prodi = '';
	$email = '';

	if(isset($_GET['ubah'])){
		$id = $_GET['ubah'];

		$query = "SELECT * FROM tbl_mhs WHERE id = '$id';";
		$sql = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($sql);

		$nim = $result['nim'];
		$namamhs = $result['namamhs'];
		$jk = $result['jk'];
		$alamat = $result['alamat'];
		$prodi = $result['prodi'];
		$email = $result['email'];

	}
?>

<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<script src="js/bootstrap.bundle.min.js" ></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<title>tugas_pbo</title>
</head>
<body>
	<nav class="navbar bg-light mb-4">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      CRUD - BS5
	    </a>
	  </div>
	</nav>
	<div class="container">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id; ?>" name="id">	
			<div class="mb-3 row">
		    	<label for="nim" class="col-sm-2 col-form-label">
		    	NIM
		    	</label>
		    	<div class="col-sm-10">
		      		<input required type="text" name="nim" class="form-control" id="nim" placeholder="Ex: 21051215001" value="<?php echo $nim; ?>">
		    	</div>
		  	</div>
		  	<div class="mb-3 row">
		    	<label for="namamhs" class="col-sm-2 col-form-label">
		    	Nama
		    	</label>
		    	<div class="col-sm-10">
		      		<input required type="text" name="namamhs" class="form-control" id="namamhs" value="<?php echo $namamhs; ?>">
		    	</div>
		  	</div>
		  	<div class="mb-3 row">
		    	<label for="jk" class="col-sm-2 col-form-label">
		    	Jenis Kelamin
		    	</label>
		    	<div class="col-sm-10">
		    		<select required id="jk" name="jk" class="form-select" aria-label="Default select example">
					  <option <?php if($jk == 'Laki-laki'){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
					  <option <?php if($jk == 'Perempuan'){echo "selected";} ?> value="Perempuan">Perempuan</option>
					</select>
		    	</div>
		  	</div>	
		  	<div class="mb-3 row">
		    	<label for="alamat" class="col-sm-2 col-form-label">
		    	Alamat Lengkap
		    	</label>
		    	<div class="col-sm-10">
		      		<textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
		    	</div>
		  	</div>
		    <div class="mb-3 row">
		    	<label for="prodi" class="col-sm-2 col-form-label">
		    	Prodi
		    	</label>
		    	<div class="col-sm-10">
		      		<input value="<?php echo $prodi; ?>" required type="text" name="prodi" class="form-control" id="prodi" placeholder="Ex: Sistem Informasi">
		      	</div>
		    </div>
		    <div class="mb-3 row">
		    	<label for="foto" class="col-sm-2 col-form-label">
		    	Foto
		    	</label>
		    	<div class="col-sm-10">
		      		<input <?php if(!isset($_GET['ubah'])){echo "required";} ?>required class="form-control" type="file" name="foto" id="foto" accept="image/*">
		    	</div>
		  	</div>
		    <div class="mb-3 row">
		    	<label for="email" class="col-sm-2 col-form-label">
		    	Email
		    	</label>
		    	<div class="col-sm-10">
		      		<input value="<?php echo $email; ?>" required type="text" name="email" class="form-control" id="email" placeholder="Ex: @mhs.unesa.ac.id">
		      	</div>
		    </div>

		    <div class="mb-3 row mt-4">
		      <div class="col">
		      	<?php
		      		if(isset($_GET['ubah'])){
		      	?>
			      	<button type="submit" name="aksi" value="edit" class="btn btn-primary">
			      		<i class="fa fa-floppy-o"></i>
			      		Simpan Perubahan
			      	</button>
		      	<?php
		      		} else {
		      	?> 
		      		<button type="submit" name="aksi" value="add" class="btn btn-primary">
			      		<i class="fa fa-floppy-o"></i>
			      		Tambahkan
			      	</button>
			    <?php
			      }
			    ?>
		      		<a href="index.php" type="button" class="btn btn-danger">
		      			<i class="fa fa-reply"></i>
		      			Batal
		      		</a>
		      </div>
		</form>
	  </div>
</body>
</html>