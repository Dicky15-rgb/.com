<?php
$token = "API KEY ANDA"; // Ganti dengan token asli kamu

$header = array(
    "Authorization: Bearer " . $token,
    "Content-Type: application/x-www-form-urlencoded"
);

$produk = $_POST;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://bukaolshop.net/api/v1/produk/create");
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($produk));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$hasil = curl_exec($ch);
curl_close($ch);

// Kembalikan ke browser
$res = json_decode($hasil, true);
if (isset($res["status"])) {
    echo "<h2>✅ Produk berhasil dikirim!</h2>";
    echo "<p><strong>Nama:</strong> " . $res["nama_barang"] . "</p>";
    echo "<p><strong>Status:</strong> " . $res["status"] . "</p>";
    echo "<p><strong>ID Antrian:</strong> " . $res["id_antrian"] . "</p>";
} else {
    echo "<h2>❌ Gagal mengirim produk</h2>";
    echo "<pre>" . htmlspecialchars($hasil) . "</pre>";
}
?>