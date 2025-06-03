# ML-Bank-Term-Deposito-Prediction

Website ini adalah aplikasi prediksi deposito berjangka bank berbasis machine learning dengan antarmuka web. Aplikasi ini memungkinkan pengguna mengunggah dataset, memilih model prediksi, dan melihat hasil prediksi secara interaktif.

## Fitur Utama
- Upload dataset CSV
- Pilih model machine learning (.sav)
- Proses prediksi otomatis dengan Python
- Riwayat prediksi tersimpan
- Tampilan hasil prediksi dalam tabel
- Contoh dataset tersedia

## Struktur Direktori
```
.
├── assets/
│   ├── dataset/
│   ├── img/
│   └── model/
├── dataset/                # File CSV dataset yang diunggah
├── hasil/                  # Hasil prediksi (CSV)
├── model/                  # Model machine learning (.sav)
├── home.php                # Halaman utama
├── input_form.php          # Input manual data
├── predict.php             # Proses upload & prediksi
├── result.php              # Tampilkan hasil prediksi
├── history.php             # Riwayat prediksi
├── run_model.py            # Script Python untuk prediksi
├── README.md
```

## Cara Kerja
1. Pengguna mengunggah file CSV melalui form di `home.php`.
2. Pengguna memilih model `.sav` di folder `model/`.
3. `predict.php` menjalankan `run_model.py` untuk memproses prediksi.
4. Hasil prediksi disimpan di folder `hasil/` dan ditampilkan di `result.php`.
5. Riwayat prediksi dapat diakses di `history.php`.

## Dependensi
- PHP 7+
- Python 3, pandas, joblib
- TailwindCSS, Animate.css

## Menjalankan Aplikasi
1. Pastikan PHP dan Python sudah terinstall.
2. Install dependensi Python:
   ```powershell
   pip install pandas joblib
   ```
3. Jalankan server lokal (misal Laragon/XAMPP).
4. Akses `home.php` melalui browser.

## Catatan
- Model machine learning harus berupa file `.sav` hasil training pipeline scikit-learn.
- Dataset harus format CSV dengan kolom sesuai kebutuhan model.
- Semua hasil prediksi otomatis tersimpan dan dapat diakses ulang.

## Tampilan Aplikasi

![Landing Page](https://i.imgur.com/MyAjR8O.png)
*Landing page aplikasi prediksi deposito bank*

![Upload Dataset](assets/img/Upload-Dataset.png)
*Form upload dataset dan pemilihan model*

![Input Manual](assets/img/InputManual.png)
*Form input data manual untuk prediksi*

![Hasil Prediksi](assets/img/HasilPrediksi.png)
*Tampilan hasil prediksi dalam tabel*

![Riwayat Input](assets/img/HistoryInput.png)
*Halaman riwayat prediksi yang pernah dilakukan*


---
