<?php
include("konfig/koneksi.php");
$b = mysqli_query($conn, "select * from kriteria");
$jml_krit = mysqli_num_rows($b);
$c = mysqli_fetch_assoc($b);



if (isset($_POST['simpan'])) {

	$o = 1;

	//cek id alternatif
	$id_alt = $_POST['id_alt'];
	$cek = mysqli_query($conn, "select * from alternatif where id_alternatif='$id_alt'");
	$cek_l = mysqli_num_rows($cek);
	if ($cek_l > 0) {
		$del = mysqli_query($conn, "delete from nilai_matrik where id_alternatif='$id_alt'");
	}

	for ($n = 1; $n <= $jml_krit; $n++) {
		$id_k = $_POST['id_krite' . $o];
		$n_k = $_POST['nilai' . $o];


		$m = mysqli_query($conn, "insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$n_k')");

		if ($m) {
			// echo "OK <br>";
		}

		$o++;
	}
}
?>

<h1>Nilai Matriks</h1>
<ul class="nav nav-tabs">

	<li class="active"><a href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>

</ul>
<div class="box-header">
	<h3 class="box-title">Tambah Nilai Matriks</h3>
</div>


<form method="POST" action="">
	<div class="form-group">
		<label class="control-label col-lg-2">Id Alternatif</label>
		<div class="col-lg-4">
			<select name="id_alt" class="form-control" required onchange="window.location.href = '?a=nilaimatrik&alternatif='+this.value">
				<option value="" selected>Pilih Alternatif</option>
				<?php
				$alternatif = isset($_GET['alternatif']) ? $_GET['alternatif'] : '';
				$s = mysqli_query($conn, "select * from alternatif order by CONVERT(REPLACE(id_alternatif, 'A', ''), SIGNED)");
				while ($d = mysqli_fetch_assoc($s)) {
				?>

					<option value="<?php echo $d['id_alternatif'] ?>" <?php echo $alternatif == $d['id_alternatif'] ? 'selected' : '' ?>><?php echo $d['id_alternatif'] . " | " . $d['nm_alternatif'] ?></option>
				<?php
				}
				?>
			</select>


		</div>

	</div>
	<br />
	<hr />
	<?php if ($alternatif != '') { ?>
		<div class="form-group">
			<?php
			$i = 1;
			$alt = mysqli_query($conn, "select * from kriteria");
			//hitung jml kriteria		
			$jml_krit = mysqli_num_rows($alt);

			while ($dalt = mysqli_fetch_assoc($alt)) {
				//ambil data \
				$get = mysqli_query($conn, "select * from nilai_matrik where id_kriteria='$dalt[id_kriteria]' and id_alternatif='$alternatif'");
				$n = mysqli_fetch_assoc($get);
				$nilai_kriteria = is_null($n) ? null : $n['nilai'];
			?>

				<table align="left">
					<tr>
						<td width="200">
							<label><?php echo $dalt['nama_kriteria']; ?></label>
							<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
						</td>
						<div class="col-md-8">
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>1" value="<?php echo $dalt['poin1']; ?>" <?php echo $nilai_kriteria == $dalt['poin1'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>1"><?php echo $dalt['poin1']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>2" value="<?php echo $dalt['poin2']; ?>" <?php echo $nilai_kriteria == $dalt['poin2'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>2"><?php echo $dalt['poin2']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>3" value="<?php echo $dalt['poin3']; ?>" <?php echo $nilai_kriteria == $dalt['poin3'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>3"><?php echo $dalt['poin3']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>4" value="<?php echo $dalt['poin4']; ?>" <?php echo $nilai_kriteria == $dalt['poin4'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>4"><?php echo $dalt['poin4']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>5" value="<?php echo $dalt['poin5']; ?>" <?php echo $nilai_kriteria == $dalt['poin5'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>5"><?php echo $dalt['poin5']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>6" value="<?php echo $dalt['poin6']; ?>" <?php echo $nilai_kriteria == $dalt['poin6'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>6"><?php echo $dalt['poin6']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>7" value="<?php echo $dalt['poin7']; ?>" <?php echo $nilai_kriteria == $dalt['poin7'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>7"><?php echo $dalt['poin7']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>8" value="<?php echo $dalt['poin8']; ?>" <?php echo $nilai_kriteria == $dalt['poin8'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>8"><?php echo $dalt['poin8']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>9" value="<?php echo $dalt['poin9']; ?>" <?php echo $nilai_kriteria == $dalt['poin9'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>9"><?php echo $dalt['poin9']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>10" value="<?php echo $dalt['poin10']; ?>" <?php echo $nilai_kriteria == $dalt['poin10'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>10"><?php echo $dalt['poin10']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>11" value="<?php echo $dalt['poin11']; ?>" <?php echo $nilai_kriteria == $dalt['poin11'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>11"><?php echo $dalt['poin11']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>12" value="<?php echo $dalt['poin12']; ?>" <?php echo $nilai_kriteria == $dalt['poin12'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>12"><?php echo $dalt['poin12']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>13" value="<?php echo $dalt['poin13']; ?>" <?php echo $nilai_kriteria == $dalt['poin13'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>13"><?php echo $dalt['poin13']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>14" value="<?php echo $dalt['poin14']; ?>" <?php echo $nilai_kriteria == $dalt['poin14'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>14"><?php echo $dalt['poin14']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>15" value="<?php echo $dalt['poin15']; ?>" <?php echo $nilai_kriteria == $dalt['poin15'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>15"><?php echo $dalt['poin15']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>16" value="<?php echo $dalt['poin16']; ?>" <?php echo $nilai_kriteria == $dalt['poin16'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>16"><?php echo $dalt['poin16']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>17" value="<?php echo $dalt['poin17']; ?>" <?php echo $nilai_kriteria == $dalt['poin17'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>17"><?php echo $dalt['poin17']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>18" value="<?php echo $dalt['poin18']; ?>" <?php echo $nilai_kriteria == $dalt['poin18'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>18"><?php echo $dalt['poin18']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>19" value="<?php echo $dalt['poin19']; ?>" <?php echo $nilai_kriteria == $dalt['poin19'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>19"><?php echo $dalt['poin19']; ?></label>
							</td>
							<td width="80">
								<input type="radio" name="nilai<?php echo $i; ?>" id="nilai<?php echo $i; ?>20" value="<?php echo $dalt['poin20']; ?>" <?php echo $nilai_kriteria == $dalt['poin20'] ? 'checked' : ''; ?> />
								<label for="nilai<?php echo $i; ?>20"><?php echo $dalt['poin20']; ?></label>
							</td>
					</tr>

				<?php
				$i++;
			}
				?>
				<tr>
					<td colspan=5 align="center">
						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
					</td>
				</tr>
				</table>

		</div>
	<?php } else { ?>
		<h3>Silahkan pilih alternatif</h3>
	<?php } ?>
	</div>


</form>