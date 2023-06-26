<?php
include("konfig/koneksi.php");
$s = mysqli_query($conn, "SELECT * FROM kriteria");
$h = mysqli_num_rows($s);

?>

<div class="box-header">
	<h3 class="box-title">Nilai Matriks Ternormalisasi</h3>
</div>

<table class="table table-bordered table-responsive">
	<thead>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">Nama</th>
			<th colspan="<?php echo $h; ?>">Kriteria</th>
		</tr>
		<tr>
			<?php
			for ($n = 1; $n <= $h; $n++) {
				echo "<th>C{$n}</th>";
			}
			?>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0;
		$a = mysqli_query($conn, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");

		// Mencari total nilai kuadrat per kriteria
		$total_kuadrat = array();
		$kriteria_ids = array();
		while ($kriteria = mysqli_fetch_assoc($s)) {
			$id_kriteria = $kriteria['id_kriteria'];
			$kriteria_ids[] = $id_kriteria;
			$total_kuadrat[$id_kriteria] = 0;

			$k = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_kriteria='$id_kriteria'");
			while ($dkuadrat = mysqli_fetch_assoc($k)) {
				$total_kuadrat[$id_kriteria] += ($dkuadrat['nilai'] * $dkuadrat['nilai']);
			}
		}

		while ($da = mysqli_fetch_assoc($a)) {
			echo "<tr>
				<td>" . (++$i) . "</td>
				<td>{$da['nm_alternatif']}</td>";

			$id_alternatif = $da['id_alternatif'];

			$n = mysqli_query($conn, "SELECT * FROM nilai_matrik WHERE id_alternatif='$id_alternatif' ORDER BY id_matrik ASC");

			while ($dn = mysqli_fetch_assoc($n)) {
				$id_kriteria = $dn['id_kriteria'];
				$nilai = $dn['nilai'];
				$nilai_kuadrat = $total_kuadrat[$id_kriteria];

				// Matriks ternormalisasi menggunakan metode SMART
				$nilai_ternormalisasi = $nilai / sqrt($nilai_kuadrat);

				echo "<td align='center'>" . round($nilai_ternormalisasi, 3) . "</td>";
			}

			echo "</tr>\n";
		}
		?>

	</tbody>
</table>
