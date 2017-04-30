<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Selamat Datang</title>
</head>
<body>

<div id="container">
	<h1>Selamat Datang</h1>

	<h2>Hai, <?php echo $this->session->userdata("nama_admin"); ?></h2>
	<a href="<?php echo base_url()."index.php/outlet/admin_request_outlet"; ?>">Request Gudang</a>
	<a href="<?php echo base_url()."index.php/login"; ?>">Logout</a>

</div>

</body>
</html>