<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bank Term Deposit Prediction</title>
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
  <header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12 shadow-lg animate__animated animate__fadeIn">
    <div class="max-w-5xl mx-auto px-6 text-center">
      <h1 class="text-5xl font-bold tracking-tight mb-4">Bank Term Deposit Prediction</h1>
    </div>
  </header>
  <!-- Navigation -->
  <nav class="bg-[#181f33] shadow-md sticky top-0 z-10 animate__animated animate__fadeInDown">
    <div class="max-w-5xl mx-auto px-6">
      <div class="flex gap-6 py-4">
        <a href="home.php" class="px-5 py-2.5 text-blue-300 border-2 border-blue-700 rounded-lg hover:bg-blue-900 transition-all duration-200 font-medium flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
          </svg>
          Home
        </a>
        <a href="input_form.php" class="px-5 py-2.5 bg-blue-700 text-white rounded-lg font-medium shadow-sm hover:bg-blue-800 transition-all duration-200 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
          </svg>
          Input Manual
        </a>
        <a href="history.php" class="px-5 py-2.5 text-blue-300 border-2 border-blue-700 rounded-lg hover:bg-blue-900 transition-all duration-200 font-medium flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
          </svg>
          History
        </a>
      </div>
    </div>
  </nav>
  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-8 mt-12 bg-[#181f33] rounded-2xl shadow-xl flex-grow mb-12 animate__animated animate__fadeIn">
    <section>
      <h2 class="text-3xl font-bold mb-6 text-blue-300 border-b border-blue-800 pb-2 gradient-text">Input Data Nasabah</h2>
      <form method="POST" action="predict_manual.php" class="space-y-6">
        <!-- Personal Information -->
        <div class="grid md:grid-cols-3 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="age" class="block mb-1 text-sm font-medium text-gray-200">Usia <span class="text-red-500">*</span></label>
            <input type="number" id="age" name="age" required min="18" max="100" 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan usia (18-100 tahun)">
            <p class="text-xs text-gray-400 mt-1">Contoh: 25</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="job" class="block mb-1 text-sm font-medium text-gray-200">Pekerjaan <span class="text-red-500">*</span></label>
            <select id="job" name="job" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="admin.">Admin</option>
              <option value="blue-collar">Blue-collar</option>
              <option value="entrepreneur">Entrepreneur</option>
              <option value="housemaid">Housemaid</option>
              <option value="management">Management</option>
              <option value="retired">Retired</option>
              <option value="self-employed">Self-employed</option>
              <option value="services">Services</option>
              <option value="student">Student</option>
              <option value="technician">Technician</option>
              <option value="unemployed">Unemployed</option>
              <option value="unknown">Unknown</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih jenis pekerjaan utama Anda</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="marital" class="block mb-1 text-sm font-medium text-gray-200">Status Pernikahan <span class="text-red-500">*</span></label>
            <select id="marital" name="marital" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="divorced">Divorced</option>
              <option value="unknown">Unknown</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih status pernikahan Anda</p>
          </div>
        </div>
        <div class="grid md:grid-cols-3 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="education" class="block mb-1 text-sm font-medium text-gray-200">Pendidikan <span class="text-red-500">*</span></label>
            <select id="education" name="education" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="primary">Primary</option>
              <option value="secondary">Secondary</option>
              <option value="tertiary">Tertiary</option>
              <option value="unknown">Unknown</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih tingkat pendidikan terakhir</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="default" class="block mb-1 text-sm font-medium text-gray-200">Memiliki Kredit Macet? <span class="text-red-500">*</span></label>
            <select id="default" name="default" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="yes">Ya</option>
              <option value="no">Tidak</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih "Ya" jika pernah memiliki kredit macet</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="balance" class="block mb-1 text-sm font-medium text-gray-200">Saldo (dalam Rupiah, angka bulat, boleh pakai titik ribuan) <span class="text-red-500">*</span></label>
            <input type="text" id="balance" name="balance" required pattern="^[0-9.]+$" inputmode="numeric"
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan saldo rata-rata dalam Rupiah, contoh: 10.000.000">
            <p class="text-xs text-gray-400 mt-1">Masukkan saldo dalam Rupiah, hanya angka dan titik (tanpa koma/desimal). Contoh: 10.000.000</p>
          </div>
        </div>
        <div class="grid md:grid-cols-3 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="housing" class="block mb-1 text-sm font-medium text-gray-200">Memiliki Pinjaman Rumah? <span class="text-red-500">*</span></label>
            <select id="housing" name="housing" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="yes">Ya</option>
              <option value="no">Tidak</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih "Ya" jika memiliki pinjaman rumah</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="loan" class="block mb-1 text-sm font-medium text-gray-200">Memiliki Pinjaman Pribadi? <span class="text-red-500">*</span></label>
            <select id="loan" name="loan" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="yes">Ya</option>
              <option value="no">Tidak</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih "Ya" jika memiliki pinjaman pribadi</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="contact" class="block mb-1 text-sm font-medium text-gray-200">Jenis Kontak Terakhir <span class="text-red-500">*</span></label>
            <select id="contact" name="contact" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="cellular">Cellular</option>
              <option value="telephone">Telephone</option>
              <option value="unknown">Unknown</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih jenis kontak terakhir yang digunakan</p>
          </div>
        </div>
        <div class="grid md:grid-cols-3 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="day" class="block mb-1 text-sm font-medium text-gray-200">Hari Terakhir Kontak <span class="text-red-500">*</span></label>
            <input type="number" id="day" name="day" required min="1" max="31" 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="1-31">
            <p class="text-xs text-gray-400 mt-1">Masukkan hari (1-31) saat terakhir dihubungi</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="month" class="block mb-1 text-sm font-medium text-gray-200">Bulan Terakhir Kontak <span class="text-red-500">*</span></label>
            <select id="month" name="month" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="jan">Jan</option>
              <option value="feb">Feb</option>
              <option value="mar">Mar</option>
              <option value="apr">Apr</option>
              <option value="may">May</option>
              <option value="jun">Jun</option>
              <option value="jul">Jul</option>
              <option value="aug">Aug</option>
              <option value="sep">Sep</option>
              <option value="oct">Oct</option>
              <option value="nov">Nov</option>
              <option value="dec">Dec</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih bulan saat terakhir dihubungi</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="duration" class="block mb-1 text-sm font-medium text-gray-200">Durasi Kontak (detik) <span class="text-red-500">*</span></label>
            <input type="number" id="duration" name="duration" required min="0" 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan durasi (detik)">
            <p class="text-xs text-gray-400 mt-1">Contoh: 120 (detik)</p>
          </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="campaign" class="block mb-1 text-sm font-medium text-gray-200">Jumlah Kontak Kampanye Ini <span class="text-red-500">*</span></label>
            <input type="number" id="campaign" name="campaign" required min="1" 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan jumlah kontak">
            <p class="text-xs text-gray-400 mt-1">Berapa kali dihubungi selama kampanye ini</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="pdays" class="block mb-1 text-sm font-medium text-gray-200">Hari Sejak Kontak Terakhir <span class="text-red-500">*</span></label>
            <input type="number" id="pdays" name="pdays" required 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="-1 jika belum pernah">
            <p class="text-xs text-gray-400 mt-1">Isi -1 jika belum pernah dihubungi sebelumnya</p>
          </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="previous" class="block mb-1 text-sm font-medium text-gray-200">Jumlah Kontak Sebelumnya <span class="text-red-500">*</span></label>
            <input type="number" id="previous" name="previous" required min="0" 
              class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan jumlah kontak sebelumnya">
            <p class="text-xs text-gray-400 mt-1">Berapa kali pernah dihubungi sebelum kampanye ini</p>
          </div>
          <div class="feature-card bg-[#232b47] p-4 rounded-xl">
            <label for="poutcome" class="block mb-1 text-sm font-medium text-gray-200">Hasil Kampanye Sebelumnya <span class="text-red-500">*</span></label>
            <select id="poutcome" name="poutcome" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              <option value="">-- Pilih --</option>
              <option value="success">Success</option>
              <option value="failure">Failure</option>
              <option value="other">Other</option>
              <option value="unknown">Unknown</option>
            </select>
            <p class="text-xs text-gray-400 mt-1">Pilih hasil terakhir jika pernah dihubungi</p>
          </div>
        </div>
        <!-- Model Selection -->
        <div class="feature-card bg-[#232b47] p-4 rounded-xl">
          <label for="model" class="block mb-2 text-sm font-semibold text-gray-200">Pilih Model (.sav)</label>
          <select id="model" name="model" required class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">-- Pilih model --</option>
            <?php
            $model_dir = __DIR__ . '/model/';
            if (is_dir($model_dir)) {
              foreach (glob($model_dir . '*.sav') as $file) {
                $filename = basename($file);
                echo "<option value=\"$filename\">$filename</option>";
              }
            }
            ?>
          </select>
        </div>
        <!-- Submit Button -->
        <div class="text-center pt-6">
          <button type="submit" class="bg-blue-700 text-white px-12 py-4 rounded-xl hover:bg-blue-800 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl inline-flex items-center gap-3 hover-scale">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
            </svg>
            Prediksi Sekarang
          </button>
        </div>
      </form>
    </section>
  </main>
  <!-- Footer -->
  <footer class="bg-[#181f33] text-gray-400 text-center py-8 mt-auto shadow-inner">
    <div class="max-w-5xl mx-auto px-6">
      <p class="text-sm">&copy; 2025 Bank Term Deposit Prediction</p>
    </div>
  </footer>
</body>
</html>