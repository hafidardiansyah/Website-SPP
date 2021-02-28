<?php
include_once('../layouts/navbar.php');
include_once('../layouts/sidebar.php');

// check level
if (!isset($_SESSION["admin"])) {
    echo "
		<script>
            alert('Tidak dapat mengakses fitur ini!');
            window.history.back();
		</script>
		";
    exit;
}

$no = 1;
$siswa = query("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id");
?>

<table class="table">
    <tr>
        <td colspan="10">
            <span id="action">
                <h2>Daftar Siswa</h2>
                <div>
                    <a href="pdf.php" class="badge grey">File PDF</a>
                    <a href="create.php" class="badge green">Tambah</a>
                </div>
            </span>
        </td>
    </tr>
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No telepon</th>
        <th>Pengaturan</th>
    </tr>
    <?php foreach ($siswa as $s) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $s['nisn']; ?></td>
            <td><?= $s['nis']; ?></td>
            <td><?= $s['nama']; ?></td>
            <td><?= $s['kelas']; ?></td>
            <td><?= $s['alamat']; ?></td>
            <td><?= $s['no_telepon']; ?></td>
            <td>
                <a href="update.php?n=<?= $s['nisn'] ?>" class="badge yellow">Ubah</a>
                <a href="delete.php?n=<?= $s['nisn'] ?>" class="badge red" onclick="return confirm('Apakah yakin menghapus data siswa <?= $s['nama'] ?>?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php if ($siswa == []) : ?>
        <div class="info info-red">Data tidak ada!</div>
    <?php endif; ?>
</table>

<?php include_once('../layouts/footer.php'); ?>