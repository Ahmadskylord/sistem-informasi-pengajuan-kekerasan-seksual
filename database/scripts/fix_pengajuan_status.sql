-- Backup your data before running this script!

-- Update 'status' values in 'pengajuan' table that are not in the valid set to 'menunggu'
UPDATE pengajuan
SET status = 'menunggu'
WHERE status NOT IN ('menunggu', 'diproses', 'selesai', 'ditolak');
