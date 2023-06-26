<div class="box-header">
    <h3 class="box-title">Data Kriteria</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
                <th>A5</th>
                <th>A6</th>
                <th>A7</th>
                <th>A8</th>
                <th>A9</th>
                <th>A10</th>
                <th>A11</th>
                <th>A12</th>
                <th>A13</th>
                <th>A14</th>
                <th>A15</th>
                <th>A16</th>
                <th>A17</th>
                <th>A18</th>
                <th>A19</th>
                <th>A20</th>
                <th>Sifat Kriteria</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($conn, "select * from kriteria order by CONVERT(REPLACE(id_kriteria, 'A', ''), SIGNED) ASC");
            while ($d = mysqli_fetch_assoc($s)) {
            ?>
                <tr>
                    <td><?php echo $d['id_kriteria']; ?></td>
                    <td><?php echo $d['nama_kriteria']; ?></td>
                    <td><?php echo $d['bobot']; ?></td>
                    <td><?php echo $d['poin1']; ?></td>
                    <td><?php echo $d['poin2']; ?></td>
                    <td><?php echo $d['poin3']; ?></td>
                    <td><?php echo $d['poin4']; ?></td>
                    <td><?php echo $d['poin5']; ?></td>
                    <td><?php echo $d['poin6']; ?></td>
                    <td><?php echo $d['poin7']; ?></td>
                    <td><?php echo $d['poin8']; ?></td>
                    <td><?php echo $d['poin9']; ?></td>
                    <td><?php echo $d['poin10']; ?></td>
                    <td><?php echo $d['poin11']; ?></td>
                    <td><?php echo $d['poin12']; ?></td>
                    <td><?php echo $d['poin13']; ?></td>
                    <td><?php echo $d['poin14']; ?></td>
                    <td><?php echo $d['poin15']; ?></td>
                    <td><?php echo $d['poin16']; ?></td>
                    <td><?php echo $d['poin17']; ?></td>
                    <td><?php echo $d['poin18']; ?></td>
                    <td><?php echo $d['poin19']; ?></td>
                    <td><?php echo $d['poin20']; ?></td>
                    <td><?php echo $d['sifat']; ?></td>
                    <td>
                        <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>