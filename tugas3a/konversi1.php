<?php
function celsiusToFahrenheit($suhu) {
    return ($suhu * 9/5) + 32;
}

function fahrenheitToCelsius($suhu) {
    return ($suhu - 32) * 5/9;
}

function celsiusToKelvin($suhu) {
    return $suhu + 273.15;
}

$hasil = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputSuhu = $_POST['suhu'];
    $jenisKonversi = $_POST['konversi'];

    if (!is_numeric($inputSuhu)) {
        $error = "Input harus berupa angka!";
    } else {
        switch ($jenisKonversi) {
            case "C_to_F":
                $res = celsiusToFahrenheit($inputSuhu);
                $hasil = "$inputSuhu °C = " . number_format($res, 2) . " °F";
                break;
            case "F_to_C":
                $res = fahrenheitToCelsius($inputSuhu);
                $hasil = "$inputSuhu °F = " . number_format($res, 2) . " °C";
                break;
            case "C_to_K":
                $res = celsiusToKelvin($inputSuhu);
                $hasil = "$inputSuhu °C = " . number_format($res, 2) . " K";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3A - Konversi Suhu</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #eeeeee;
    margin: 0;
    padding: 20px;
}

.container {
    background-color: white;
    padding: 20px;
    width: 300px;
    margin: 50px auto;
    border: 1px solid #ccc;
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #aaa;
}

button {
    width: 100%;
    padding: 10px;
    background-color: green;
    color: white;
    border: none;
}

.result {
    margin-top: 10px;
    padding: 10px;
    background-color: #ddf;
    text-align: center;
}

.error {
    margin-top: 10px;
    padding: 10px;
    background-color: #fdd;
    text-align: center;
}
    </style>
</head>
<body>

<div class="container">
    <h2>Konversi Suhu</h2>
    <form method="POST" action="">
        <label for="suhu">Masukkan Angka Suhu:</label>
        <input type="text" name="suhu" id="suhu" placeholder="Contoh: 30" required>

        <label for="konversi">Pilih Konversi:</label>
        <select name="konversi" id="konversi">
            <option value="C_to_F">Celsius &rarr; Fahrenheit</option>
            <option value="F_to_C">Fahrenheit &rarr; Celsius</option>
            <option value="C_to_K">Celsius &rarr; Kelvin</option>
        </select>

        <button type="submit">Konversi Sekarang</button>
    </form>

    <?php if ($hasil): ?>
        <div class="result"><?php echo $hasil; ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
