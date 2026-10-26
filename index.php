<?php
$hasil = null;
$angka1 = "";
$angka2 = "";
$operasi = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $angka1 = $_POST["angka1"] ?? "";
    $angka2 = $_POST["angka2"] ?? "";
    $operasi = $_POST["operasi"] ?? "";

    if (
        $angka1 !== "" &&
        $angka2 !== "" &&
        is_numeric($angka1) &&
        is_numeric($angka2)
    ) {
        $a = (float) $angka1;
        $b = (float) $angka2;

        //Fitur Penjumlahan
        if ($operasi === "tambah") {
            $hasil = $a + $b;
        } elseif ($operasi === "kurang") {
            //Fitur Pengurangan
            $hasil = $a - $b;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eaf0f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .kalkulator {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 320px;
            box-shadow: 0 4px 15px #0002;
        }

        h2 {
            text-align: center;
            color: #263b55;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        .tombol {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .tambah {
            background: #218838;
        }

        .kurang {
            background: #c0392b;
        }

        button:hover {
            opacity: 0.8;
        }

        .hasil {
            margin-top: 20px;
            padding: 12px;
            background: #e8f5e9;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="kalkulator">
        <h2>Kalkulator Sederhana</h2>

        <form method="POST">
            <label for="angka1">Angka pertama</label>
            <input
                type="number"
                step="any"
                id="angka1"
                name="angka1"
                value="<?= htmlspecialchars((string)$angka1) ?>"
                required
            >

            <label for="angka2">Angka kedua</label>
            <input
                type="number"
                step="any"
                id="angka2"
                name="angka2"
                value="<?= htmlspecialchars((string)$angka2) ?>"
                required
            >

            <div class="tombol">
                <button
                    class="tambah"
                    type="submit"
                    name="operasi"
                    value="tambah"
                >
                    Tambah (+)
                </button>

                <button
                    class="kurang"
                    type="submit"
                    name="operasi"
                    value="kurang"
                >
                    Kurang (-)
                </button>
            </div>
        </form>

        <?php if ($hasil !== null): ?>
            <div class="hasil">
                Hasil:
                <strong><?= htmlspecialchars((string)$hasil) ?></strong>
            </div>
        <?php elseif ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <div class="hasil">
                Masukkan dua angka yang valid.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>