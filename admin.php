<?php
include_once('layouts/navbar.php');
include_once('layouts/sidebar.php');

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

$siswa = query("SELECT * FROM siswa");
$pengguna = query("SELECT * FROM pengguna");
$kelas = query("SELECT * FROM kelas");
$pembayaran = query("SELECT * FROM pembayaran");
$spp = query("SELECT * FROM spp");
?>

<h2>Informasi Singkat</h2>
<section id="short">
    <a href="student" class="card">
        Jumlah Siswa
        <p class="total">
            <?= count($siswa); ?>
        </p>
    </a>
    <a href="payment" class="card">
        Jumlah Pembayaran
        <p class="total">
            <?= count($pembayaran); ?>
        </p>
    </a>
</section>

<section id="short">
    <a href="spp" class="card">
        Jumlah SPP
        <p class="total">
            <?= count($spp); ?>
        </p>
    </a>
    <a href="user" class="card">
        Jumlah Pengguna
        <p class="total">
            <?= count($pengguna); ?>
        </p>
    </a>
    <a href="class" class="card">
        Jumlah Kelas
        <p class="total">
            <?= count($kelas); ?>
        </p>
    </a>
</section>

<?php include_once('layouts/footer.php'); ?>