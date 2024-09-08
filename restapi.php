<?php
require 'validasi.php';

if (isset($_POST['uid'])) {
    $uid = $_POST['uid'];

    // Hapus UID dari tabel addxiisija1
    mysqli_query($conn, "DELETE FROM addxiisija1");

    // Cek apakah UID ada di tabel dataxiisija1
    $cek_dataxiisija1 = mysqli_query($conn, "SELECT * FROM dataxiisija1 WHERE uid='$uid'");

    if (mysqli_num_rows($cek_dataxiisija1) > 0) {
        // Jika UID ditemukan di dataxiisija1, lanjutkan ke absensi
        $cek_absen_hari_ini = mysqli_query($conn, "SELECT * FROM dataabsenxiisija1 WHERE uid='$uid' AND tanggalabsen=CURRENT_DATE");

        if (mysqli_num_rows($cek_absen_hari_ini) > 0) {
            // Jika sudah ada, cek apakah jamkeluar sudah diisi
            $data_absen = mysqli_fetch_assoc($cek_absen_hari_ini);

            if ($data_absen['jamkeluar'] == '00:00:00') {
                // Hitung selisih waktu antara jam masuk dan waktu sekarang
                $jam_masuk = new DateTime($data_absen['jammasuk']);
                $waktu_sekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                $selisih_waktu = $jam_masuk->diff($waktu_sekarang);

                // Cek apakah selisih waktu lebih dari 30 menit
                if ($selisih_waktu->i >= 30 || $selisih_waktu->h > 0) {
                    // Jika lebih dari 30 menit, update jamkeluar
                    mysqli_query($conn, "UPDATE dataabsenxiisija1 SET jamkeluar=CURTIME() WHERE uid='$uid' AND tanggalabsen=CURRENT_DATE");
                    echo "Jam keluar tercatat.";
                } else {
                    // Jika kurang dari 30 menit, tidak melakukan update
                    echo "Absen Pulang Harus Menunggu 30 Detik";
                }
            } else {
                // Jika jamkeluar sudah diisi, tidak melakukan apa-apa
                echo "Data sudah tercatat.";
            }
        } else {
            // Jika belum ada, ambil data dari dataxiisija1 dan insert
            $data = mysqli_fetch_assoc($cek_dataxiisija1);

            // Tentukan keterangan berdasarkan jam saat ini
            $timezone = new DateTimeZone('Asia/Jakarta'); // Atur timezone ke Asia/Jakarta
            $current_time = new DateTime('now', $timezone); // Mengambil waktu saat ini
            $current_hour = (int)$current_time->format('H'); // Mengambil jam dalam format 24-jam

            if ($current_hour >= 6 && $current_hour < 18) {
                $keterangan = 'Hadir';
            } else {
                $keterangan = 'Terlambat';
            }

            // Insert data baru ke tabel dataabsenxiisija1
            mysqli_query($conn, "INSERT INTO dataabsenxiisija1 (uid, namalengkap, kelas, jurusan, tanggalabsen, jammasuk, keterangan) 
                VALUES ('$uid', '{$data['namalengkap']}', '{$data['kelas']}', '{$data['jurusan']}', CURRENT_DATE, CURTIME(), '$keterangan')");
            echo "Data absensi masuk tercatat.";
        }
    } else {
        // Jika UID tidak ditemukan di dataxiisija1, kirimkan UID ke addxiisija1.php
        mysqli_query($conn, "INSERT INTO addxiisija1 VALUES('$uid')");
    }
}
?>
