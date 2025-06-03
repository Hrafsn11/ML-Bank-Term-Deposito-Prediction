<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$upload_dir = 'dataset/';
$model_dir = 'model/';
$hasil_dir = 'hasil/';
if (!is_dir($upload_dir))
    mkdir($upload_dir, 0777, true);
if (!is_dir($model_dir))
    mkdir($model_dir, 0777, true);
if (!is_dir($hasil_dir))
    mkdir($hasil_dir, 0777, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dan konversi saldo ke euro dengan pembulatan
    $saldo = $_POST['balance'];
    $saldo_rupiah = preg_replace('/[^0-9]/', '', $saldo); 
    $saldo_euro = round($saldo_rupiah / 18504); // Konversi ke wuro, dibulatkan ke integer

    $formData = [
        'age' => $_POST['age'],
        'job' => $_POST['job'],
        'marital' => $_POST['marital'],
        'education' => $_POST['education'],
        'default' => $_POST['default'],
        'balance' => $saldo_euro, // saldo euro 
        'housing' => $_POST['housing'],
        'loan' => $_POST['loan'],
        'contact' => $_POST['contact'],
        'day' => $_POST['day'],
        'month' => $_POST['month'],
        'duration' => $_POST['duration'],
        'campaign' => $_POST['campaign'],
        'pdays' => $_POST['pdays'],
        'previous' => $_POST['previous'],
        'poutcome' => $_POST['poutcome']
    ];

    // Buat file CSV sementara
    $timestamp = time();
    $filename = "manual_input_{$timestamp}.csv";
    $filepath = $upload_dir . $filename;

    $file = fopen($filepath, 'w');
    fputcsv($file, array_keys($formData)); 
    fputcsv($file, array_values($formData)); 
    fclose($file);

    // Jalankan prediksi dan ambil file hasil unik
    $model = trim($_POST['model']);
    $model_path = $model_dir . $model;
    $command = "python run_model.py \"$filepath\" \"$model_path\" 2>&1";
    $output = shell_exec($command);
    $hasil_file = '';
    if (preg_match('/\[RESULT_CSV\](.+)\n/', $output, $m)) {
        $hasil_file = trim($m[1]);
    }

    header("Location: result.php?filename=" . urlencode($filename) . "&model=" . urlencode($model) . "&hasil_file=" . urlencode($hasil_file));
    exit();
} else {
    echo "Request method tidak valid.";
}
ob_end_flush();
?>