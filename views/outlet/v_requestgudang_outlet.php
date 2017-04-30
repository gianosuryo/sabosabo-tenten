<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Request Gudang</title>
	
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>

</head>
<body>

<div id="container">
	<h1>Request Barang Gudang</h1>
	<h2>Admin : <?php echo $this->session->userdata("nama_admin"); ?></h2>

	
	<h3>Daftar Barang</h3>
	
	<?php echo form_open('outlet/admin_request_outlet/insert_temp');?>
		<input list="kode_barang" name="kode_barang">
			<datalist id="kode_barang">
			<?php foreach ($load_stok_gudang as $data) { ?>
				<option value="<?php echo $data['KODE_BARANG']; ?>"> <?php echo $data['NAMA_BARANG']; ?> : <?php echo $data['KUANTITAS']; ?> </option>
			<?php } ?>
			</datalist>
			
			Kuantitas : <input type="text" name="kuantitas_barang" value="">
  
		<input type="submit" value="Tambah Request">
	<?php echo form_close(); ?>
	
	<table>
		<tr>
			<th>Nomor</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Kuantitas Barang</th>
			<th>Keterangan</th>
			<th>Delete?</th>
		</tr>
		
		
		<?php 
		$datasubmit = array();
		
		$x = 0;
		foreach ($load_temp_request as $data){ ?>
			<?php 
				$datasubmit[$x] = $data['NOMOR_TEMP'];
				echo form_open('outlet/admin_request_outlet/delete_temp');
			?>
			<tr>
				<td>
					<?php echo $x + 1; ?>
					<input type="hidden" name="nomor_temp" value="<?php echo $data['NOMOR_TEMP']; ?>" >
				</td>
				<td>
					<?php echo $data['KODE_BARANG']; ?>
					<input type="hidden" name="kode_barang" value="<?php echo $data['KODE_BARANG']; ?>" >
				</td>
				<td>
					<?php echo $data['NAMA_BARANG']; ?>
				</td>
				<td>
					<?php echo $data['KUANTITAS']; ?>
				</td>
				<td>
					<?php echo $data['KETERANGAN']; ?>
				</td>		
				<td>
					<input type="submit" value="Delete Request">
				</td>	
			</tr>
			<?php echo form_close();?>
		<?php 
		$x++;
		} ?>
		
		
	</table>
	
	
	
	<?php echo form_open('outlet/admin_request_outlet/submit_temp'); ?>
		<?php foreach($datasubmit as $data){ ?>
			<input type="hidden" name="id_temp[]" value="<?php echo $data; ?>" >
		<?php } ?>
		<input type="submit" value="Submit Request">
	<?php echo form_close(); ?>
	
	<a href="<?php echo base_url()."index.php/outlet/admin_outlet"; ?>">Kembali</a>

</div>

</body>

</html>