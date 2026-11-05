<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = trim($_POST['nama'] ?? '');
    $npm = trim($_POST['npm'] ?? '');
    $paket = $_POST['paket'] ?? '';

    if (empty($nama)) {
        $errors[] = "Nama wajib diisi.";
    }

    if (empty($npm)) {
        $errors[] = "NPM wajib diisi.";
    }

    if (empty($paket)) {
        $errors[] = "Paket wajib dipilih.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $nama) && !empty($nama)) {
        $errors[] = "Nama hanya boleh huruf dan spasi.";
    }

    if (!preg_match("/^[0-9]*$/", $npm) && !empty($npm)) {
        $errors[] = "NPM hanya boleh angka.";
    }

    if ($paket == "1 bulan") {
        $benefit = "Potongan 50% untuk pembelian produk tertentu.";
    } else {
        $benefit = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
    }
}
?>

<h2>Pendaftaran Membership</h2>

<form method="POST">
    Nama :
    <input type="text" name="nama"><br><br>

    NPM :
    <input type="text" name="npm"><br><br>

    Paket Membership :
    <select name="paket">
        <option value="">--Pilih Paket--</option>
        <option value="1 bulan">1 bulan</option>
        <option value="3 bulan">3 bulan</option>
    </select>

    <br><br>
    <button type="submit">Daftar</button>
</form>

<hr>

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    echo "Silahkan lengkapi formulir di atas.";

} else {

    if (!empty($errors)) {

        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }

    } else {

        echo "<h3>Informasi Pendaftaran</h3>";
        echo "<p>Nama : " . htmlspecialchars($nama) . "</p>";
        echo "<p>NPM : " . htmlspecialchars($npm) . "</p>";
        echo "<p>Paket : " . htmlspecialchars($paket) . "</p>";
        echo "<p>Keuntungan : " . htmlspecialchars($benefit) . "</p>";

        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: "
            . htmlspecialchars($benefit) . "</p>";
    }
}
?>