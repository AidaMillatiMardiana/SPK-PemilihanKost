<?php

include("konfig/koneksi.php");


$query = "SELECT MAX(CONVERT(REPLACE(id_kriteria, 'C', ''), SIGNED)) as idMaks FROM kriteria";
$hasil = mysqli_query($conn, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) $nim;
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "C";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . $noUrut;

?>

<div class="box-header">
	<h3 class="box-title">Tambah Kriteria</h3>
</div>


<form action="" method="POST">

	<input type="text" name="id_kriteria" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
	<br />
	<input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria">
	<br />
	<input type="number" step="any" name="bobot" class="form-control" placeholder="Bobot">
	<br />
	<input type="number" step="any" name="poin1" class="form-control" placeholder="A1">
	<br />
	<input type="number" step="any" name="poin2" class="form-control" placeholder="A2">
	<br />
	<input type="number" step="any" name="poin3" class="form-control" placeholder="A3">
	<br />
	<input type="number" step="any" name="poin4" class="form-control" placeholder="A4">
	<br />
	<input type="number" step="any" name="poin5" class="form-control" placeholder="A5">
	<br />
	<input type="number" step="any" name="poin6" class="form-control" placeholder="A6">
	<br />
	<input type="number" step="any" name="poin7" class="form-control" placeholder="A7">
	<br />
	<input type="number" step="any" name="poin8" class="form-control" placeholder="A8">
	<br />
	<input type="number" step="any" name="poin9" class="form-control" placeholder="A9">
	<br />
	<input type="number" step="any" name="poin10" class="form-control" placeholder="A10">
	<br />
	<input type="number" step="any" name="poin11" class="form-control" placeholder="A11">
	<br />
	<input type="number" step="any" name="poin12" class="form-control" placeholder="A12">
	<br />
	<input type="number" step="any" name="poin13" class="form-control" placeholder="A13">
	<br />
	<input type="number" step="any" name="poin14" class="form-control" placeholder="A14">
	<br />
	<input type="number" step="any" name="poin15" class="form-control" placeholder="A15">
	<br />
	<input type="number" step="any" name="poin16" class="form-control" placeholder="A16">
	<br />
	<input type="number" step="any" name="poin17" class="form-control" placeholder="A17">
	<br />
	<input type="number" step="any" name="poin18" class="form-control" placeholder="A18">
	<br />
	<input type="number" step="any" name="poin19" class="form-control" placeholder="A19">
	<br />
	<input type="number" step="any" name="poin20" class="form-control" placeholder="A20">
	<br />
	<select name="sifat" class="form-control">
		<option value="benefit">Benefit</option>
		<option value="cost">Cost</option>
	</select>
	<br />
	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
	<br />
</form>

<?php
if (isset($_POST['simpan'])) {
	$s = mysqli_query($conn, "insert into kriteria (id_kriteria,nama_kriteria,bobot,poin1,poin2,poin3,poin4,poin5,poin6,poin7,poin8,poin9,poin10,poin11,poin12,poin13,poin14,poin15,poin16,poin17,poin18,poin19,poin20,sifat) 
	values 
	('$_POST[id_kriteria]','$_POST[nama_kriteria]','$_POST[bobot]','$_POST[poin1]','$_POST[poin2]','$_POST[poin3]','$_POST[poin4]','$_POST[poin5]','$_POST[poin6]','$_POST[poin7]','$_POST[poin8]','$_POST[poin9]','$_POST[poin10]','$_POST[poin11]','$_POST[poin12]','$_POST[poin13]','$_POST[poin14]','$_POST[poin15]','$_POST[poin16]','$_POST[poin17]','$_POST[poin18]','$_POST[poin19]','$_POST[poin20]','$_POST[sifat]')");

	if ($s) {
		echo "<script>alert('Disimpan'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>