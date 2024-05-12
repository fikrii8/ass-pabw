<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Ambil data yang dikirimkan dari formulir edit
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $username = $_POST['username'];
    $status = $_POST['status'];

    // Baca data JSON
    $jsonString = file_get_contents('data_login.json');
    $magang = json_decode($jsonString, true);

    // Update data yang sesuai dengan ID
    $magang[$id]['nama'] = $nama;
    $magang[$id]['nim'] = $nim;
    $magang[$id]['kelas'] = $kelas;
    $magang[$id]['jurusan'] = $jurusan;
    $magang[$id]['username'] = $username;
    $magang[$id]['status'] = $status;

    // Simpan data kembali ke file JSON
    $updatedJsonString = json_encode($magang);
    file_put_contents('data_login.json', $updatedJsonString);

    // Redirect kembali ke halaman index
    header('Location: index.php');
    exit();
} else {
    // Jika tidak ada permintaan POST yang dikirimkan, kembalikan ke halaman index
    header('Location: index.php');
    exit();
}
?>
