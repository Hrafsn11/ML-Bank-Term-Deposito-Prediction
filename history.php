<?php
// Halaman Riwayat Hasil Prediksi
$dataset_dir = 'dataset/';
$hasil_dir = 'hasil/';
$history = [];

foreach (glob($dataset_dir . '*.csv') as $csv_file) {
    $filename = basename($csv_file);
    $is_manual = strpos($filename, 'manual_input_') === 0;
    $timestamp = (int) filter_var($filename, FILTER_SANITIZE_NUMBER_INT);
    $date = $timestamp ? date('Y-m-d H:i:s', $timestamp) : date('Y-m-d H:i:s', filemtime($csv_file));
    if (($handle = fopen($csv_file, "r")) !== false) {
        $header = fgetcsv($handle, 1000, ",");
        $rows = [];
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            $rows[] = $row;
        }
        fclose($handle);
        // Cari file hasil prediksi unik yang sesuai
        $hasil_pattern = $hasil_dir . 'hasil_' . pathinfo($filename, PATHINFO_FILENAME) . '_*.csv';
        $hasil_files = glob($hasil_pattern);
        $hasil_file = '';
        if ($hasil_files) {
            usort($hasil_files, function ($a, $b) {
                return filemtime($b) - filemtime($a); });
            $hasil_file = $hasil_files[0];
        }
        $history[] = [
            'jenis' => $is_manual ? 'Manual' : 'CSV Upload',
            'tanggal' => $date,
            'filename' => $filename,
            'jumlah_data' => count($rows),
            'hasil_file' => $hasil_file
        ];
    }
}
// Urutkan terbaru di atas
usort($history, function ($a, $b) {
    return strtotime($b['tanggal']) - strtotime($a['tanggal']); });
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Hasil Prediksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(45deg, #60a5fa, #2563eb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hover-scale { transition: transform 0.2s ease-in-out; }
        .hover-scale:hover { transform: scale(1.02); }
        .feature-card { transition: all 0.3s ease; }
        .feature-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(30,58,138,0.15); }
    </style>
</head>
<body class="bg-[#101624] text-gray-200 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-10 shadow-lg animate__animated animate__fadeIn">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold tracking-tight mb-2 gradient-text">Riwayat Hasil Prediksi</h1>
            <p class="text-lg text-blue-200">Semua riwayat prediksi, baik input manual maupun upload CSV, tersimpan di sini.</p>
        </div>
    </header>
    <!-- Navigation -->
    <nav class="bg-[#181f33] shadow-md sticky top-0 z-10 animate__animated animate__fadeInDown">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex gap-6 py-4">
                <a href="home.php" class="px-5 py-2.5 bg-blue-700 text-white rounded-lg font-medium shadow-sm hover:bg-blue-800 transition-all duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                    Home
                </a>
                <a href="input_form.php" class="px-5 py-2.5 text-blue-300 border-2 border-blue-700 rounded-lg hover:bg-blue-900 transition-all duration-200 font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                    Input Manual
                </a>
                <a href="history.php" class="px-5 py-2.5 bg-blue-700 text-white rounded-lg font-medium shadow-sm flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                    History
                </a>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="max-w-5xl mx-auto p-8 mt-12 bg-[#181f33] rounded-2xl shadow-xl flex-grow mb-12 animate__animated animate__fadeIn">
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-blue-300 mb-2 gradient-text">Riwayat Prediksi</h2>
            <p class="text-gray-400">Daftar seluruh prediksi yang pernah dilakukan, baik input manual maupun upload CSV.</p>
        </div>
        <div class="overflow-x-auto rounded-xl shadow-sm bg-[#232b47] p-6">
            <table class="min-w-full divide-y divide-blue-900">
                <thead class="bg-blue-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Jenis Input</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nama File</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Jumlah Data</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Detail</th>
                    </tr>
                </thead>
                <tbody class="bg-[#181f33] divide-y divide-blue-900">
                <?php if (count($history) === 0): ?>
                    <tr><td colspan="6" class="text-gray-400 py-8 text-center">Belum ada riwayat prediksi.</td></tr>
                <?php else: ?>
                    <?php foreach ($history as $i => $item): ?>
                        <tr class="hover:bg-blue-900/40 transition-all">
                            <td class="px-6 py-4 font-semibold text-blue-200"><?= $i+1 ?></td>
                            <td class="px-6 py-4 text-blue-300"><?= htmlspecialchars($item['jenis']) ?></td>
                            <td class="px-6 py-4 text-gray-200"><?= htmlspecialchars($item['tanggal']) ?></td>
                            <td class="px-6 py-4 text-gray-200"><?= htmlspecialchars($item['filename']) ?></td>
                            <td class="px-6 py-4 text-gray-200"><?= htmlspecialchars($item['jumlah_data']) ?></td>
                            <td class="px-6 py-4">
                                <a href="result.php?filename=<?= urlencode($item['filename']) ?>&model=&hasil_file=<?= urlencode($item['hasil_file']) ?>" class="inline-block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-semibold hover-scale">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-10 text-center">
            <a href="home.php" class="inline-block bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition font-semibold">⬅️ Kembali ke Home</a>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-[#181f33] text-gray-400 text-center py-8 mt-auto shadow-inner">
        <div class="max-w-5xl mx-auto px-6">
            <p class="text-sm">&copy; 2025 Bank Term Deposit Prediction</p>
        </div>
    </footer>
</body>
</html>