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
$spp = query("SELECT * FROM spp");

if (isset($_POST['search'])) {
    $spp = searchDonation($_POST['keyword']);
}
?>

<table class="table">
    <tr>
        <td colspan="4">
            <span id="action">
                <h2>Daftar SPP</h2>
                <a href="create.php" class="badge green">Tambah</a>
            </span>
        </td>
    </tr>
    <tr>
        <th>No</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Pengaturan</th>
    </tr>
    <?php foreach ($spp as $s) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $s['tahun']; ?></td>
            <td>Rp. <?= rupiah($s['nominal']); ?></td>
            <td>
                <a href="update.php?i=<?= $s['id'] ?>" class="badge yellow">Ubah</a>
                <a href="delete.php?i=<?= $s['id'] ?>" class="badge red" onclick="return confirm('Apakah yakin menghapus data SPP tahun <?= $s['tahun'] ?>?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php if ($spp == []) : ?>
        <div class="info info-red">Data tidak ada!</div>
    <?php endif; ?>
</table>

<?php include_once('../layouts/footer.php'); ?>