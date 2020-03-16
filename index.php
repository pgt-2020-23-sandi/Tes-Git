<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>kalkulator with database</title>
<link rel="stylesheet"
href="bootstrap-4.4.1-dist/css/bootstrap.min.css"
integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
</head>
<body><link rel="stylesheet" href="mbcsmbfdzb.css" type="text/css" />

<script type="text/javascript" src="mbjsmbfdzb.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="#">KALKULATOR DB</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="index.php">kalkulator</a>
</li>
<li class="nav-item">
<a class="nav-link" href="http://localhost/create">Menu utama</a>
</li>
</ul>
</div>
</div>
</nav>
<div class="container" style="margin-top:20px">
<hr>
<table class="table table-striped table-hover table-sm table-bordered">
<thead class="thead-dark">
<tr>
<th>no. </th>
<th>id</th>
<th>nilai_a</th>
<th>nilai_b</th>
<th>hasil</th>
<th>operasi</th>
<th>keterangan</th>

<th>aksi</th>
</tr>
</thead>
<tbody>
<?php
//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
$sql = mysqli_query($koneksi, "SELECT * FROM riwayat") or die(mysqli_error($koneksi));
//jika query diatas menghasilkan nilai > 0 maka menjalankan script dibawah if...
if(mysqli_num_rows($sql) > 0){
//membuat variabel $no untuk menyimpan nomor urut
$no = 1;
//melakukan perulangan while dengan dari dari query $sql
while($data = mysqli_fetch_assoc($sql)){
//menampilkan data perulangan
echo '
<tr>
<td>'.$no.'</td>
<td>'.$data['id'].'</td>
<td>'.$data['nilai_a'].'</td>
<td>'.$data['nilai_b'].'</td>
<td>'.$data['hasil'].'</td>
<td>'.$data['operasi'].'</td>
<td>'.$data['keterangan'].'</td>
<td>
<a href="edit.php?id='.$data['id'].'"
class="badge badge-warning">Edit</a>
<a
href="delete.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin
menghapus data ini?\')">Delete</a>
</td>
</tr>
';
$no++;
}
//jika query menghasilkan nilai 0
}else{
echo '
<tr>
<td colspan="6">Tidak ada data.</td>
</tr>
';
}
?>

<!-- tambah -->
<div class="container" style="margin-top:20px">
<h2>Tambah data</h2>
<hr>

<?php
if(isset($_POST['submit'])){
$id = $_POST['id'];
$nilai_a = $_POST['nilai_a'];
$nilai_b = $_POST['nilai_b'];
$operasi = $_POST['operasi'];


switch ($operasi){ 
  case "penjumlahan":
    $hasil = $_POST['nilai_a'] + $_POST['nilai_b'];
    if ($hasil >= 0 && $hasil <=10){
    $keterangan = "A";}
    if ($hasil >= 11 && $hasil <=20){
    $keterangan = "B";}
    if ($hasil > 20){
    $keterangan = "C";}
    if ($hasil < 0){
    $keterangan = "D";}

$cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE
id='$id'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO riwayat(id, nilai_a, nilai_b, hasil, operasi, keterangan) VALUES('$id', '$nilai_a', '$nilai_b', '$hasil', '$operasi', '$keterangan')") or
die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menambahkan data.");
document.location="index.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan
proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah
terdaftar.</div>';
}
break;

case "pengurangan":
    $hasil = $_POST['nilai_a'] - $_POST['nilai_b'];
    if ($hasil >= 0 && $hasil <=10){
    $keterangan = "A";}
    if ($hasil >= 11 && $hasil <=20){
    $keterangan = "B";}
    if ($hasil > 20){
    $keterangan = "C";}
    if ($hasil < 0){
    $keterangan = "D";}

$cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE
id='$id'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO riwayat(id, nilai_a, nilai_b, hasil, operasi, keterangan) VALUES('$id', '$nilai_a', '$nilai_b', '$hasil', '$operasi', '$keterangan')") or
die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menambahkan data.");
document.location="index.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan
proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah
terdaftar.</div>';
}
break;

case "perkalian":
    $hasil = $_POST['nilai_a'] * $_POST['nilai_b'];
    if ($hasil >= 0 && $hasil <=10){
    $keterangan = "A";}
    if ($hasil >= 11 && $hasil <=20){
    $keterangan = "B";}
    if ($hasil > 20){
    $keterangan = "C";}
    if ($hasil < 0){
    $keterangan = "D";}

$cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE
id='$id'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO riwayat(id, nilai_a, nilai_b, hasil, operasi, keterangan) VALUES('$id', '$nilai_a', '$nilai_b', '$hasil', '$operasi', '$keterangan')") or
die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menambahkan data.");
document.location="index.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan
proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah
terdaftar.</div>';
}
break;

case "pembagian":
    $hasil = $_POST['nilai_a'] / $_POST['nilai_b'];
    if ($hasil >= 0 && $hasil <=10){
    $keterangan = "A";}
    if ($hasil >= 11 && $hasil <=20){
    $keterangan = "B";}
    if ($hasil > 20){
    $keterangan = "C";}
    if ($hasil < 0){
    $keterangan = "D";}

$cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE
id='$id'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO riwayat(id, nilai_a, nilai_b, hasil, operasi, keterangan) VALUES('$id', '$nilai_a', '$nilai_b', '$hasil', '$operasi', '$keterangan')") or
die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menambahkan data.");
document.location="index.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan
proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah
terdaftar.</div>';
}
break;

}
    


}

if(isset($_POST['10x'])){
	$id = $_POST['id'];
	$nilai_a = $_POST['nilai_a'];
	$nilai_b = $_POST['nilai_b'];
	$hasil = $_POST['nilai_a'] + $_POST['nilai_b'];
	$keterangan = "penjumlahan 10x";

for ($i=1; $i<=10; $i++){
	$id++;
	$nilai_a = $nilai_b;
	$nilai_b = $hasil;
	$hasil = $nilai_a + $nilai_b;
	$keterangan;
	


$cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE
id='$id'") or die(mysqli_error($koneksi));
if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO riwayat(id, nilai_a, nilai_b, hasil, operasi, keterangan) VALUES('$id', '$nilai_a', '$nilai_b', '$hasil', '$operasi', '$keterangan')") or
die(mysqli_error($koneksi));
if($sql){
echo '<script>alert("Berhasil menambahkan data.");
document.location="index.php";</script>';
}else{
echo '<div class="alert alert-warning">Gagal melakukan
proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah
terdaftar.</div>';
}

}
}

?>


<form action="index.php" method="post">
<div class="form-group row">
<label class="col-sm-2 col-form-label">id</label>
<div class="col-sm-10">
<input type="text" name="id" class="form-control"
size="4" required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">nilai_a</label>
<div class="col-sm-10">
<input type="text" name="nilai_a" class="form-control"
required>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">nilai_b</label>
<div class="col-sm-10">
<input type="text" name="nilai_b" class="form-control"
required>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">operasi</label>
<div class="col-sm-10">
<select name="operasi" class="form-control" required>
<option value="">PILIH operasi</option>
<option value="penjumlahan">penjumlahan</option>
<option value="pengurangan">pengurangan</option>
<option value="perkalian">perkalian</option>
<option value="pembagian">pembagian</option>
</select>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">&nbsp;</label>
<div class="col-sm-10">
<input type="submit" name="submit" class="btn btnprimary" value="HITUNG & SIMPAN">
<input type="submit" name="10x" class="btn btnprimary" value="Penjumlahan otomatis 10x">
</div>

</form>
</div>


<tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-
q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
crossorigin="anonymous"></script>
</body>
</html>
