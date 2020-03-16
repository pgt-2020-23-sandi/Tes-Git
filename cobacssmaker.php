<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>paan sih, databes nih !</title>
<link rel="stylesheet"
href="bootstrap-4.4.1-dist/css/bootstrap.min.css"
integrity="sha384-
MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
</head>
<body><link rel="stylesheet" href="mbcsmbfdzb.css" type="text/css" />


<!-- Navigation menus created with the free version of Easy CSS Menu downloaded from www.easycssmenu.com
     You are free to use this menu code for personal, non-commercial use only. Any other use is a serious violation of copyright laws.
     You are required to retain this comment block in your website code in an unchanged fashion.
     The above limitations do not apply on menus created with the paid version of the software. -->
<div id="mbfdzbebul_wrapper" style="max-width: 100%;">
  <ul id="mbfdzbebul_table" class="mbfdzbebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient45" style="width: 67px;"><a class="button_1">home<br /></a></div></li>
  <li><div class="buttonbg gradient_button gradient45" style="width: 87px;"><div class="arrow"><a>aksi</a></div></div>
    <ul class="gradient_menu gradient82">
    <li class="gradient_menuitem gradient40 first_item"><a href="tambah.php" title="">tambah</a></li>
    <li class="gradient_menuitem gradient40 last_item"><a href="edit.php" title="">edit</a></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient45" style="width: 90px;"><div class="arrow"><a>gallery</a></div></div>
    <ul class="gradient_menu gradient82">
    <li class="gradient_menuitem gradient40 first_item"><a title="">ukm</a></li>
    <li class="gradient_menuitem gradient40 last_item"><a class="with_arrow" title="">kegiatan</a>
      <ul class="gradient_menu gradient122">
      <li class="gradient_menuitem gradient40 first_item"><a title="">ngoding</a></li>
      <li class="gradient_menuitem gradient40"><a title="">ngapel</a></li>
      <li class="gradient_menuitem gradient40 last_item"><a title="">ngegame</a></li>
      </ul></li>
    </ul></li>
  <li><div class="buttonbg gradient_button gradient45"><a class="button_4">contact us</a></div></li>
  </ul>
</div>
<!-- Menus will work without this javascript file. It is used only for extra
     effects, improved usability, compatibility with very old web browsers
     and support for touch screen devices. -->
<script type="text/javascript" src="mbjsmbfdzb.js"></script>
<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="#">CRDU PHP</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="nav-link" href="index.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="tambah.php">Tambah</a>
</li>
</ul>
</div>
</div>
</nav>-->
<div class="container" style="margin-top:20px">
<h2>Daftar Mahasiswa</h2>
<hr>
<table class="table table-striped table-hover table-sm table-bordered">
<thead class="thead-dark">
<tr>
<th>id</th>
<th>NIM</th>
<th>NAMA MAHASISWA</th>
<th>kode matkul</th>
<th>kode dosen</th>
<th>uts</th>
<th>uas</th>
<th>sks</th>
<th>aksi</th>
</tr>
</thead>
<tbody>
<?php
//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
$sql = mysqli_query($koneksi, "SELECT a.id, a.nim, a.nama, b.kd_mk, b.kd_dosen, b.uts, b.uas, c.nama_mk, c.sks
FROM mahasiswa AS a
LEFT JOIN nilai AS b
ON a.nim=b.nim
LEFT JOIN matakuliah AS c
ON c.kd_mk=b.kd_mk") or die(mysqli_error($koneksi));
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
<td>'.$data['nim'].'</td>
<td>'.$data['nama'].'</td>
<td>'.$data['kd_mk'].'</td>
<td>'.$data['kd_dosen'].'</td>
<td>'.$data['uts'].'</td>
<td>'.$data['uas'].'</td>
<td>'.$data['sks'].'</td>
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
