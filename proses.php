<?php 
	include 'koneksi.php';

	if(isset($_POST['aksi'])){
		if($_POST['aksi']=="add"){

			$nim = $_POST['nim'];
			$namamhs = $_POST['namamhs'];
			$jk = $_POST['jk'];
			$alamat = $_POST['alamat'];
			$prodi = $_POST['prodi'];
			$foto = $_FILES['foto']['name'];
			$email = $_POST['email'];

			$dir = "img/";
			$tmpFile = $_FILES['foto']['tmp_name'];

			move_uploaded_file($tmpFile, $dir.$foto);

			$query = "INSERT INTO tbl_mhs VALUES(null, '$nim', '$namamhs', '$jk', '$alamat', '$prodi', '$foto', '$email')";
			$sql = mysqli_query($conn, $query);

			if($sql){
				header("location: index.php");
			} else{
				echo $query;
			}
		} else if($_POST['aksi']=="edit"){
			
			$id = $_POST['id'];
			$nim = $_POST['nim'];
			$namamhs = $_POST['namamhs'];
			$jk = $_POST['jk'];
			$alamat = $_POST['alamat'];
			$prodi = $_POST['prodi'];
			$email = $_POST['email'];

			$queryShow = "SELECT * FROM tbl_mhs WHERE id = '$id';";
			$sqlShow = mysqli_query($conn, $queryShow);
			$result = mysqli_fetch_assoc($sqlShow);

			if($_FILES['foto']['name'] == ""){
				$foto = $result['foto'];
			} else{
				$foto = $_FILES['foto']['name'];
				unlink("img/" .$result['foto']);
				move_uploaded_file($foto = $_FILES['foto']['tmp_name'], 'img/'.$foto = $_FILES['foto']['name']);
			}

			$query = "UPDATE tbl_mhs SET nim='$nim', namamhs='$namamhs', jk='$jk', alamat='$alamat', prodi='$prodi', email='$email', foto='$foto' WHERE id='$id';";
			$sql = mysqli_query($conn, $query);
			header("location: index.php");
		}
	}

	if(isset($_GET['hapus'])){
		$id = $_GET['hapus'];

		$queryShow = "SELECT * FROM tbl_mhs WHERE id = '$id';";
		$sqlShow = mysqli_query($conn, $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		unlink("img/" .$result['foto']);

		$query = "DELETE FROM tbl_mhs WHERE id = '$id';";
		$sql = mysqli_query($conn, $query);

		if($sql){
			header ("location: index.php");	
		} else{
			echo $query;
		}
		//echo "Hapus Data <a href='index.php'>[Home]</a>";
	}
?>