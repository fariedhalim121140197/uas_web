<?php
session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: session.php");
        exit;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style1.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Praktikum PemWeb RA 121140197 - Daftar Data Mahasiswa</title>
</head>
<body>
    <div class="all">
        <div class="header">
            <p>Data Mahasiswa</p>
            <a href="index.html">html</a>
        </div>
        
        <div class="body">
            <div class="post">
                <h2>Daftar Data Mahasiswa</h2>
                <div class="form">
                    <form action="" method="get">
                        <input type="text" class="is1" id="search" name="search" placeholder="Cari menggunakan Nama...">
                        <input type="submit" class="btn1" value="Cari">
                    </form>
                </div>
                <div class="hasil">
                <table>
                    <div class="stick">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                        </tr>
                    </div>
                    <?php
                    include 'koneksi.php';
                    $no = 1;

                    if (isset($_GET['search'])) {
                        $code = $_GET['search'];
                        $data = mysqli_query($conn, "SELECT * FROM member WHERE prodi LIKE '%".$code."%' ORDER BY nama asc");
                    } else {
                        $data = mysqli_query($conn, 'SELECT * FROM member');
                    }

                    while ($show = mysqli_fetch_array($data)) {
                        echo "
                        <tr>
                            <td>$no</td>
                            <td>$show[nama]</td>
                            <th>$show[tmpLahir]</th>
                            <td>$show[tglLahir]</td>
                            <td>$show[jk]</td>
                            <td>$show[goldar]</td>
                            <td>$show[alamat]</td>
                            <td>$show[agama]</td>
                        </tr>
                        ";
                        $no++;
                    };
                    ?>
                </table>
            </div>
        </div>

        <div class="post">
            <h2>Tambah Data Member</h2>
            <div class="form">
                <form class="formulir" id="inForm" action="" method="post">
                    <div class="row">
                        <div class="column">
                            <div class="ic">
                                <label for="nama">Nama</label> <br>
                                <input id="nama" class="is" type="fullname" name="nama" />
                            </div>
                            <div class="ic">
                                <label for="tglLahir">Tanggal Lahir</label> <br>
                                <input id="tglLahir" class="is1" type="date" name="tglLahir" />
                            </div>
                            <div class="ic">
                                <label for="goldar">Golongan Darah:</label><br>
                                <select id="goldar" name="goldar" class="is2">
                                    <option value=""></option>                                        
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="o">O</option>
                                </select>
                            </div>
                            <div class="ic">
                                <label for="agama">Agama:</label><br>
                                <select id="agama" name="agama" class="is2">
                                    <option value=""></option>                                        
                                    <option value="a">Islam</option>
                                    <option value="b">Kristem</option>
                                    <option value="ab">Hindu</option>
                                    <option value="o">Buddha</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="ic">
                                <label for="tmpLahir">Tempat Lahir</label> <br>
                                <input id="tmpLahir" class="is" type="text" name="tmpLahir" />
                            </div>
                            <div class="ic">
                                <label for="jk">Jenis Kelamin</label> <br>
                                <input type="radio" id="l" name="jk" value="Laki-Laki">
                                <label for="l">Laki-Laki</label><br>
                                <input type="radio" id="p" name="jk" value="Perempuan">
                                <label for="p">Perempuan</label><br>
                            </div>
                            <div class="ic">
                                <label for="alamat">Alamat</label> <br>
                                <input id="alamat" class="is" type="text" name="alamat"/>
                            </div>
                            <div class="ic">
                                <p style="text-align: right;">
                                    <input type="submit" class="btn1" value="Submit" >
                                </p>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
                include 'koneksi.php';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama = $_POST['nama'];
                    $tmpLahir = $_POST['tmpLahir'];
                    $tglLahir = $_POST['tglLahir'];
                    $jk = $_POST['jk'];
                    $goldar = $_POST['goldar'];
                    $alamat = $_POST['alamat'];
                    $agama = $_POST['agama'];

                    $query = "INSERT INTO member (nama, tmpLahir, tglLahir, jk, goldar, alamat, agama) VALUES ('$nama', '$tmpLahir', '$tglLahir', '$jk', '$goldar', '$alamat', '$agama')";

                    if (mysqli_query($conn, $query)) {
                        echo "Data berhasil ditambahkan.";
                        echo "<a href='crud.php'>Kembali</a>";
                    } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }
                }
                ?>
            </div>

            <h2>Edit Data Member</h2>
            <div class="form">
                <form action="" method="post">
                    <label for="edit">Nama data yang diedit:</label>
                    <input type="text" name="edit" maxlength="9" class="in1" required><br>
                    <div class="row">
                        <div class="column">
                            <div class="ic">
                                <label for="nama">Nama</label> <br>
                                <input id="nama" class="is" type="fullname" name="nama" />
                            </div>
                            <div class="ic">
                                <label for="tglLahir">Tanggal Lahir</label> <br>
                                <input id="tglLahir" class="is1" type="date" name="tglLahir" />
                            </div>
                            <div class="ic">
                                <label for="goldar">Golongan Darah:</label><br>
                                <select id="goldar" name="goldar" class="is2">
                                    <option value=""></option>                                        
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="o">O</option>
                                </select>
                            </div>
                            <div class="ic">
                                <label for="agama">Agama:</label><br>
                                <select id="agama" name="agama" class="is2">
                                    <option value=""></option>                                        
                                    <option value="a">Islam</option>
                                    <option value="b">Kristem</option>
                                    <option value="ab">Hindu</option>
                                    <option value="o">Buddha</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="ic">
                                <label for="tmpLahir">Tempat Lahir</label> <br>
                                <input id="tmpLahir" class="is" type="text" name="tmpLahir" />
                            </div>
                            <div class="ic">
                                <label for="jk">Jenis Kelamin</label> <br>
                                <input type="radio" id="l" name="jk" value="Laki-Laki">
                                <label for="l">Laki-Laki</label><br>
                                <input type="radio" id="p" name="jk" value="Perempuan">
                                <label for="p">Perempuan</label><br>
                            </div>
                            <div class="ic">
                                <label for="alamat">Alamat</label> <br>
                                <input id="alamat" class="is" type="text" name="alamat"/>
                            </div>
                            <div class="ic">
                                <p style="text-align: right;">
                                    <input type="submit" class="btn1" value="Submit" >
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                include 'koneksi.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $edit = $_POST['edit'];
                    $nama = $_POST['nama'];
                    $tmpLahir = $_POST['tmpLahir'];
                    $tglLahir = $_POST['tglLahir'];
                    $jk = $_POST['jk'];
                    $goldar = $_POST['goldar'];
                    $alamat = $_POST['alamat'];
                    $agama = $_POST['agama'];

                    $query = "UPDATE mhs SET nama = '$nama', prodi = '$prodi' nim = '$nim', nama = '$nama', nim = '$nim', prodi = '$prodi' where nama = '$edit'";

                    if (mysqli_query($conn, $query)) {
                        echo "Data berhasil diedit.";
                        echo "<a href='index1.php'>Kembali</a>";
                    } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    };
                }
                ?>
            </div>

            <h2>Hapus Data Member</h2>
            <div class="form">
                <form action="" method="get">
                    <label for="del">Nama data yang akan dihapus:</label>
                    <input type="text" name="del" maxlength="9" class="in1" required><br>
                    <input type="submit" class="btn1" value="Hapus">
                </form>
                <?php
                include ("koneksi.php");
                if (isset($_GET['del'])) {
                    $delete_kode = $_GET['del'];
                    $delete_query = "DELETE FROM mhs WHERE nama = '$delete_kode'";

                    if (mysqli_query($conn, $delete_query)) {
                        echo "Data berhasil dihapus.";
                        echo "<a href='index1.php'>Kembali</a>";
                    } else {
                        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>