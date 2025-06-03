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
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(45deg, #60a5fa, #2563eb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hover-scale {
            transition: transform 0.2s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(30, 58, 138, 0.15);
        }
    </style>
</head>

<body class="bg-[#101624] text-gray-200 min-h-screen flex flex-col">

    <!-- Header -->
    <header
        class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-12 shadow-lg animate__animated animate__fadeIn">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold tracking-tight mb-4">Bank Term Deposit Prediction</h1>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-[#181f33] shadow-md sticky top-0 z-10 animate__animated animate__fadeInDown">
        <div class="max-w-5xl mx-auto px-6">
            <div class="flex gap-6 py-4">
                <a href="home.php"
                    class="px-5 py-2.5 bg-blue-700 text-white rounded-lg font-medium shadow-sm hover:bg-blue-800 transition-all duration-200 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Home
                </a>
                <a href="input_form.php"
                    class="px-5 py-2.5 text-blue-300 border-2 border-blue-700 rounded-lg hover:bg-blue-900 transition-all duration-200 font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Input Manual
                </a>
                <a href="history.php"
                    class="px-5 py-2.5 text-blue-300 border-2 border-blue-700 rounded-lg hover:bg-blue-900 transition-all duration-200 font-medium flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    History
                </a>
            </div>

        </div>
    </nav>

    <!-- Main Content -->
    <main
        class="max-w-4xl mx-auto p-8 mt-12 bg-[#181f33] rounded-2xl shadow-xl flex-grow mb-12 animate__animated animate__fadeIn">

        <!-- Info Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-blue-300 border-b border-blue-800 pb-2 gradient-text">Tentang
                Dataset</h2>
            <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                Dataset ini berasal dari <a
                    href="https://www.kaggle.com/datasets/thedevastator/bank-term-deposit-predictions" target="_blank"
                    class="text-blue-400 underline hover:text-blue-200 font-medium hover-scale inline-block">Kaggle -
                    Bank Term Deposit Predictions</a>.
                Dataset berisi data klien bank dan informasi keuangan serta interaksi mereka dengan kampanye pemasaran
                deposito berjangka.
            </p>

            <div class="bg-[#232b47] p-8 rounded-xl shadow-sm">
                <h3 class="font-semibold text-gray-200 mb-6 text-xl">Fitur Utama Dataset</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <ul class="space-y-3">
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">age</strong>
                                <p class="text-sm text-gray-400">Usia klien (19-60 tahun)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">job</strong>
                                <p class="text-sm text-gray-400">Jenis pekerjaan klien (admin., blue-collar,
                                    entrepreneur, dll)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">marital</strong>
                                <p class="text-sm text-gray-400">Status pernikahan (single, married, divorced, unknown)
                                </p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">education</strong>
                                <p class="text-sm text-gray-400">Tingkat pendidikan (primary, secondary, tertiary,
                                    unknown)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">default</strong>
                                <p class="text-sm text-gray-400">Memiliki kredit macet? (yes/no)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">balance</strong>
                                <p class="text-sm text-gray-400">Saldo rata-rata (dalam Euro)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">housing</strong>
                                <p class="text-sm text-gray-400">Memiliki pinjaman rumah? (yes/no)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">loan</strong>
                                <p class="text-sm text-gray-400">Memiliki pinjaman pribadi? (yes/no)</p>
                            </div>
                        </li>
                    </ul>
                    <ul class="space-y-3">
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">contact</strong>
                                <p class="text-sm text-gray-400">Jenis kontak terakhir (cellular, telephone, unknown)
                                </p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">day</strong>
                                <p class="text-sm text-gray-400">Hari terakhir kontak (1-31)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">month</strong>
                                <p class="text-sm text-gray-400">Bulan terakhir kontak (jan-des)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">duration</strong>
                                <p class="text-sm text-gray-400">Durasi kontak terakhir (detik)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">campaign</strong>
                                <p class="text-sm text-gray-400">Jumlah kontak selama kampanye ini</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">pdays</strong>
                                <p class="text-sm text-gray-400">Hari sejak kontak terakhir (-1 jika belum pernah)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">previous</strong>
                                <p class="text-sm text-gray-400">Jumlah kontak sebelumnya</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">poutcome</strong>
                                <p class="text-sm text-gray-400">Hasil kampanye sebelumnya (success, failure, other,
                                    unknown)</p>
                            </div>
                        </li>
                        <li class="feature-card bg-[#181f33] p-4 rounded-lg shadow-sm flex items-center gap-3">
                            <span class="w-2 h-2 bg-blue-400 rounded-full"></span>
                            <div>
                                <strong class="text-blue-300">deposit</strong>
                                <p class="text-sm text-gray-400">Target: membuka deposito berjangka? (yes/no)</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <p class="text-gray-400 italic text-sm mt-6 bg-blue-950/40 p-4 rounded-lg">
                    *Dataset ini digunakan untuk melatih model dan memprediksi apakah seorang klien akan membuka
                    deposito berjangka.
                </p>
            </div>
        </section>

        <!-- Download Dataset Button -->
        <div class="mb-12 text-center">
            <a href="assets/dataset/ContohDataset - test.csv" download
                class="inline-flex items-center gap-3 bg-green-700 text-white px-10 py-4 rounded-xl hover:bg-green-800 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl hover-scale">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Download Contoh Dataset CSV
            </a>
        </div>

        <!-- Upload Form -->
        <section class="bg-[#232b47] p-10 rounded-xl shadow-sm">
            <h2 class="text-3xl font-bold mb-8 text-blue-300 text-center gradient-text">Upload Dataset dan Pilih Model
            </h2>
            <form id="uploadForm" method="POST" action="predict.php" enctype="multipart/form-data"
                class="space-y-8 max-w-2xl mx-auto">

                <!-- Upload Input -->
                <div class="space-y-3">
                    <label for="file" class="block text-sm font-semibold text-gray-200">Upload Dataset (.csv)</label>
                    <div class="relative">
                        <input id="file" type="file" name="file" accept=".csv" required
                            class="block w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-4 text-sm
              file:bg-blue-700 file:text-white file:border-0 file:px-6 file:py-3 file:rounded-lg file:font-medium
              hover:file:bg-blue-800 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    </div>
                </div>

                <!-- Model Selection -->
                <div class="space-y-3">
                    <label for="model" class="block text-sm font-semibold text-gray-200">Pilih Model (.sav)</label>
                    <select id="model" name="model" required
                        class="w-full border-2 border-blue-900 bg-[#181f33] text-gray-200 rounded-xl px-4 py-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                    <button type="submit"
                        class="bg-blue-700 text-white px-12 py-4 rounded-xl hover:bg-blue-800 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl inline-flex items-center gap-3 hover-scale">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Mulai Prediksi
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