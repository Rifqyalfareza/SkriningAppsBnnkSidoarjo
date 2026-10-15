<?php 

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$instansi = isset($_POST['instansi']) ? trim($_POST['instansi']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$no = isset($_POST['notelp']) ? trim($_POST['notelp']) : '';

$stmt = $conn->prepare("update user set instansi = ? , email = ? , no_telp = ? where id_user = ?");
$stmt->bind_param('sssi',  $instansi, $email, $no, $id);
if($stmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Data berhasil diubah'
    ];
} else {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Data gagal diubah : ' .$stmt->error
    ];
}
header('Location: ?page=petugas');
exit();


?>