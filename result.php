<?php
// Halaman hasil prediksi: tampilkan tabel data dan hasil prediksi
$upload_dir = 'dataset/';
$model_dir = 'model/';
$hasil_dir = 'hasil/';

// Pastikan folder tersedia
if (!is_dir($upload_dir))
    mkdir($upload_dir, 0777, true);
if (!is_dir($model_dir))
    mkdir($model_dir, 0777, true);
if (!is_dir($hasil_dir))
    mkdir($hasil_dir, 0777, true);

if (isset($_GET['filename']) && isset($_GET['model'])) {
    $filename = basename($_GET['filename']);
    $model = basename($_GET['model']);
    $hasil_file = isset($_GET['hasil_file']) ? $_GET['hasil_file'] : '';
    $dataset_path = $upload_dir . $filename;
    $model_path = $model_dir . $model;

    // Validasi file dataset dan model
    if (!file_exists($dataset_path)) {
        die("File dataset tidak ditemukan.");
    }
    if (!file_exists($model_path)) {
        die("File model tidak ditemukan.");
    }

    // Jika hasil prediksi sudah ada, tidak perlu jalankan python lagi
    if ($hasil_file && file_exists($hasil_file)) {
        $prediction_output = '';
    } else {
        // Jalankan script Python untuk prediksi
        $command = "python run_model.py \"$dataset_path\" \"$model_path\" 2>&1";
        $prediction_output = shell_exec($command);
        // Ambil path file hasil dari output Python
        if (preg_match('/\[RESULT_CSV\](.+)\n/', $prediction_output, $m)) {
            $hasil_file = trim($m[1]);
        }
    }

    // Baca dataset CSV dan gabungkan dengan hasil prediksi
    $table_html = '<table class="mt-6"><thead><tr><th>No</th>';
    $data_rows = [];
    if (($handle = fopen($dataset_path, "r")) !== false) {
        $is_header = true;
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if ($is_header) {
                foreach ($data as $col) {
                    $table_html .= "<th>" . htmlspecialchars($col) . "</th>";
                }
                $table_html .= '<th style="background-color:#2563eb;color:white;font-weight:bold;">Hasil Prediksi</th>';
                $table_html .= "</tr></thead><tbody>";
                $is_header = false;
            } else {
                $data_rows[] = $data;
            }
        }
        fclose($handle);
    }

    // Ambil hasil prediksi dari file hasil
    $prediksi = [];
    if ($hasil_file && file_exists($hasil_file)) {
        if (($h = fopen($hasil_file, 'r')) !== false) {
            $header = fgetcsv($h, 1000, ',');
            $hasil_idx = null;
            foreach ($header as $idx => $col) {
                if (strtolower($col) == 'hasil') {
                    $hasil_idx = $idx;
                    break;
                }
            }
            while (($row = fgetcsv($h, 1000, ',')) !== false) {
                if ($hasil_idx !== null && isset($row[$hasil_idx])) {
                    $prediksi[] = $row[$hasil_idx];
                }
            }
            fclose($h);
        }
    } else {
        // Jika hasil belum ada, parsing dari output HTML Python
        $hasil_col_index = null;
        if (preg_match('/<table.*?<thead>(.*?)<\/thead>.*?<tbody>(.*?)<\/tbody>/is', $prediction_output, $matches)) {
            $thead = $matches[1];
            $tbody = $matches[2];
            if (preg_match_all('/<th[^>]*>(.*?)<\/th>/', $thead, $th_matches)) {
                foreach ($th_matches[1] as $idx => $th) {
                    if (stripos($th, 'hasil') !== false) {
                        $hasil_col_index = $idx;
                        break;
                    }
                }
            }
            if ($hasil_col_index !== null && preg_match_all('/<tr>(.*?)<\/tr>/is', $tbody, $tr_matches)) {
                foreach ($tr_matches[1] as $tr) {
                    if (preg_match_all('/<td[^>]*>(.*?)<\/td>/', $tr, $td_matches)) {
                        $val = $td_matches[1][$hasil_col_index] ?? null;
                        if ($val !== null) $prediksi[] = $val;
                    }
                }
            }
        }
    }
    // Gabungkan data dan prediksi ke tabel HTML
    $row_num = 1;
    foreach ($data_rows as $i => $row) {
        $table_html .= "<tr><td>" . $row_num++ . "</td>";
        foreach ($row as $col) {
            $table_html .= "<td>" . htmlspecialchars($col) . "</td>";
        }
        $hasil = isset($prediksi[$i]) ? ($prediksi[$i] == '1' ? 'yes' : ($prediksi[$i] == '0' ? 'no' : htmlspecialchars($prediksi[$i]))) : '-';
        $table_html .= '<td style="background-color:#2563eb;color:white;font-weight:bold;">' . $hasil . '</td></tr>';
    }
    $table_html .= "</tbody></table>";

    // Tampilkan hasil prediksi dan data
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hasil Prediksi</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <style>
            body { font-family: 'Inter', sans-serif; }
            table { border-collapse: collapse; width: 100%; }
            th, td { padding: 10px; border: 1px solid #232b47; text-align: center; }
            th { background-color: #232b47; color: #60a5fa; }
        </style>
    </head>
    <body class="bg-[#101624] text-gray-200 min-h-screen flex flex-col">
        <div class="max-w-6xl mx-auto p-6 mt-10 bg-[#181f33] rounded-lg shadow animate__animated animate__fadeIn">
            <h1 class="text-2xl font-bold mb-4 text-blue-300 gradient-text">📊 Hasil Prediksi</h1>
            <div class="flex flex-col md:flex-row gap-6 overflow-x-auto items-stretch">
                <!-- Data Table -->
                <div class="flex-1 border border-blue-900 rounded-lg p-4 overflow-auto min-h-[400px] flex flex-col justify-stretch bg-[#232b47]">
                    <div class="overflow-auto h-full flex-1">$table_html</div>
                </div>
            </div>
            <div class="mt-6 text-center">
                <a href="home.php" class="inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-semibold">🔁 Kembali</a>
            </div>
        </div>
        <footer class="bg-[#181f33] text-gray-400 text-center py-8 mt-auto shadow-inner">
            <div class="max-w-5xl mx-auto px-6">
                <p class="text-sm">&copy; 2025 Bank Term Deposit Prediction</p>
            </div>
        </footer>
    </body>
    </html>
    HTML;

} else {
    echo "Parameter tidak lengkap.";
}
?>