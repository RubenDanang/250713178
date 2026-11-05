<?php

$nama = "";
$npm = "";
$paket = "";
$benefit = "";
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"]);
    $npm = trim($_POST["npm"]);
    $paket = $_POST["paket"];

    if (empty($nama)) {
        $error[] = "Nama wajib diisi.";
    }

    if (empty($npm)) {
        $error[] = "NPM wajib diisi.";
    }

    if (empty($paket)) {
        $error[] = "Paket wajib dipilih.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $nama) && !empty($nama)) {
        $error[] = "Nama hanya boleh huruf dan spasi.";
    }

    if (!preg_match("/^[0-9]+$/", $npm) && !empty($npm)) {
        $error[] = "NPM hanya boleh angka.";
    }

    if ($paket == "1 Bulan") {
        $benefit = "Potongan 50% untuk pembelian produk tertentu.";
    } elseif ($paket == "3 Bulan") {
        $benefit = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Membership</title>
</head>
<body>

<h2>Pendaftaran Membership</h2>

<form method="post">
    Nama :
    <input type="text" name="nama"><br><br>

    NPM :
    <input type="text" name="npm"><br><br>

    Paket :
    <select name="paket">
        <option value="">-- Pilih Paket --</option>
        <option value="1 Bulan">1 Bulan</option>
        <option value="3 Bulan">3 Bulan</option>
    </select>

    <br><br>
    <input type="submit" value="Daftar">
</form>

<hr>

<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo "Silahkan lengkapi formulir di atas.";

} elseif (!empty($error)) {

    foreach ($error as $pesan) {
        echo "<p>$pesan</p>";
    }

} else {

    echo "<h3>Informasi Pendaftaran</h3>";
    echo "<p>Nama : " . htmlspecialchars($nama) . "</p>";
    echo "<p>NPM : " . htmlspecialchars($npm) . "</p>";
    echo "<p>Paket Membership : " . htmlspecialchars($paket) . "</p>";
    echo "<p>Keuntungan : " . htmlspecialchars($benefit) . "</p>";
    echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: "
        . htmlspecialchars($benefit) . "</p>";
}
?>

</body>
</html>