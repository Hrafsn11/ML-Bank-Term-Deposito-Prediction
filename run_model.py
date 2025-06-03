import sys
import pandas as pd
import joblib
import os
import time

if len(sys.argv) < 3:
    print("Usage: run_model.py <input_csv> <model_file>")
    sys.exit(1)

input_csv = sys.argv[1]
model_file = sys.argv[2]

# Validasi file
if not os.path.exists(input_csv):
    print(f"File dataset tidak ditemukan: {input_csv}")
    sys.exit(1)

if not os.path.exists(model_file):
    print(f"File model tidak ditemukan: {model_file}")
    sys.exit(1)

# Load data
df = pd.read_csv(input_csv)

# Hapus kolom target jika ada
for target_col in ['y', 'target', 'label']:
    if target_col in df.columns:
        df = df.drop(columns=[target_col])

# Load pipeline model
try:
    model = joblib.load(model_file)
except Exception as e:
    print(f" Gagal memuat model: {e}")
    sys.exit(1)

# Prediksi
try:
    prediction = model.predict(df)
except Exception as e:
    print(f" Gagal melakukan prediksi: {e}")
    sys.exit(1)

# Simpan hasil ke file unik
os.makedirs('hasil', exist_ok=True)
input_base = os.path.splitext(os.path.basename(input_csv))[0]
timestamp = int(time.time())
output_csv = f"hasil/hasil_{input_base}_{timestamp}.csv"
df_pred = pd.DataFrame(prediction, columns=['Hasil'])
df_pred.index += 1
df_pred.insert(0, 'No', df_pred.index)
df_pred.to_csv(output_csv, index=False)

try:
    df_result = pd.read_csv(output_csv)
    print(f"[RESULT_CSV]{output_csv}")
    print(df_result.to_html(classes='table table-bordered table-striped', index=False))
except Exception as e:
    print(f" Gagal membaca hasil prediksi: {e}")
    sys.exit(1)
