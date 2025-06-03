<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$upload_dir = 'dataset/';
$model_dir = 'model/';

if (!is_dir($upload_dir))
    mkdir($upload_dir, 0777, true);
if (!is_dir($model_dir))
    mkdir($model_dir, 0777, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_success = false;
    $filename = '';

    // Upload file CSV
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['file']['name']);
        $uploaded_path = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaded_path)) {
            $file_success = true;
        } else {
            echo "Gagal memindahkan file.<br>";
            exit;
        }
    } else {
        echo "Upload file gagal: " . $_FILES['file']['error'] . "<br>";
        exit;
    }

    // Pastikan mode sudah dipilih
    if (!isset($_POST['model']) || empty($_POST['model'])) {
        echo "Anda belum memilih model.<br>";
        exit;
    }

    if ($file_success) {
        $model = trim($_POST['model']);
        $model_path = $model_dir . $model;
        $command = "python run_model.py \"$uploaded_path\" \"$model_path\" 2>&1";
        $output = shell_exec($command);
        $hasil_file = '';
        if (preg_match('/\[RESULT_CSV\](.+)\n/', $output, $m)) {
            $hasil_file = trim($m[1]);
        }
        header("Location: result.php?filename=" . urlencode($filename) . "&model=" . urlencode($model) . "&hasil_file=" . urlencode($hasil_file));
        exit();
    }
} else {
    echo "Request method tidak valid.";
}
ob_end_flush();
?>