import os
import barcode
from barcode.writer import ImageWriter

# Buat folder untuk menyimpan barcode
output_dir = "barcodes"
os.makedirs(output_dir, exist_ok=True)

# Generate barcode dari 0000144600001 sampai 0000144601999
for i in range(144600001, 144601999 + 1):
    number = f"{i:013d}"  # Format ke EAN-13
    ean = barcode.get('ean13', number, writer=ImageWriter())
    filename = os.path.join(output_dir, f"barcode_{number}")
    ean.save(filename)

print("Semua barcode berhasil dibuat dan disimpan dalam folder 'barcodes'.")
