 <?php  
include "config/koneksi.php"
	if (isset($_POST['save'])) {
		$sql = mysqli_query($con, "INSERT INTO tb_user VALUES (null, '$_POST[user]', '$_POST[pass]', '$_POST[level]')");

		echo "<script>alert('Data Tersimpan');document.location.href='?menu=user'</script>";
	}

	if (isset($_GET['hapus'])) {
		$sql = mysqli_query($con, "DELETE FROM tb_user WHERE id_user='$_GET[id]'");

		echo "<script>alert('Data Terhapus');document.location.href='?menu=user'</script>";
	}

	if (isset($_GET['edit'])) {
		$sql = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user='$_GET[id]'");

		$edit= mysqli_fetch_array($sql);
	}

	if (isset($_POST['update'])) {
		$sql = mysqli_query($con, "UPDATE tb_user SET username ='$_POST[user]', password='$_POST[pass]', level='$_POST[level]' WHERE id_user= '$_GET[id]')");

		echo "<script>alert('Data Berhasil Terupdate');document.location.href='?menu=user'</script>";
	}
?>

<<!DOCTYPE html>
<html>
<head>
	<title>FORM ADD USER</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="user" value=""></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="pass" value=""></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td><select name="level">
					<option value="admin">Admin</option>
					<option value="member">Member</option>
				</select></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="save" value="SAVE"></td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>LEVEL</th>
			<th colspan="2">AKSI</th>
		</tr>
		<?php
			$no = 0;
			$sql = mysqli_query($con, "SELECT * FROM tb_user");
			while($r=mysqli_fetch_array($sql)){
				$no++
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $r['username']; ?></td>
			<td><?php echo $r['password']; ?></td>
			<td><?php echo $r['level']; ?></td>
			<td><a href="?menu=user&hapus&id=<?php echo $r['id_user'] ?>">HAPUS</a></td>
			<td><a href="?menu=user&hapus&id=<?php echo $r['id_user'] ?>">EDIT</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>