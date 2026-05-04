<?php
// Hataları görmek için (Geliştirme aşamasında açık kalabilir)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $ad    = htmlspecialchars($_POST['name'] ?? 'Belirtilmedi');
    $email = htmlspecialchars($_POST['email'] ?? 'Belirtilmedi');
    $tel   = htmlspecialchars($_POST['phone'] ?? 'Belirtilmedi');
    $tarih = htmlspecialchars($_POST['birthdate'] ?? 'Belirtilmedi');
    $sehir = htmlspecialchars($_POST['city'] ?? 'Belirtilmedi');
  
    // Dosyaya Kaydetme (Hatalı değişkenler düzeltildi)
    $log = "Tarih: " . date("Y-m-d H:i:s") . " | Ad: $ad | E-posta: $email | Tel: $tel | Şehir: $sehir\n";
    file_put_contents("mesajlar.txt", $log, FILE_APPEND);

    // Ekrana Düzenli Yazdırma
    echo "<style>
            table { width: 500px; border-collapse: collapse; font-family: sans-serif; margin-top: 20px; }
            td { padding: 10px; border: 1px solid #ddd; }
            tr:nth-child(even) { background-color: #f9f9f9; }
            h2 { color: #2c3e50; }
            .btn { display: inline-block; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; margin-top: 20px; }
          </style>";

    echo "<h2>Form Gönderim Sonucu</h2>";
    echo "<table>";
    echo "<tr><td><b>Ad Soyad:</b></td><td>$ad</td></tr>";
    echo "<tr><td><b>E-posta:</b></td><td>$email</td></tr>";
    echo "<tr><td><b>Telefon:</b></td><td>$tel</td></tr>";
    echo "<tr><td><b>Doğum Tarihi:</b></td><td>$tarih</td></tr>";
    echo "<tr><td><b>Şehir:</b></td><td>$sehir</td></tr>";
    echo "</table>";

    // index.html localhost üzerinde çalıştığı için geri dönüş linki[cite: 1]
    echo "<br><a href='index.html' class='btn'>Geri Dön</a>";
} else {
    echo "Lütfen formu kullanarak erişim sağlayın.";
}
?>