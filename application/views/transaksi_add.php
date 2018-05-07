<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jquery-ui/themes/base/jquery-ui.css'?>">
</head>

<body>
	<!-- tambah transaksi baru -->
	<div class="container">
		<label>Nama Petani</label>
		<?php echo $petani->nama; ?>
		<br>
		<label>Daerah</label>
		<?php echo $petani->desa;  ?>
		<br>
		<label>Jumlah Uang</label>
		<?php echo $jumlah_uang; ?>
		<br>
		<label>Saldo</label><br>
		<?php echo $saldo; ?>
		<br>

		<form  action="<?php echo base_url().'Transaksi2/tambah_transaksi'; ?>" method="post">
			<table>
				<tr>
					<th colspan="2">BON</th>
				</tr>
				<tr>
					<td>Uang</td>
					<td>Barang</td>
				</tr>
				<td><input type="text" name="bon_uang"></td>
				<td><input type="text" name="bon_barang"></td>
			</table>
			<input type="submit" value="Submit">
		</form>
    </div>

    <script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>
    <!-- js autocomplete jquery -->
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $( "#bon" ).autocomplete({
              source: "<?php //echo site_url('Transaksi2/get_autocomplete/?');?>"
            });
        });
    </script> -->
    <!-- js jquery-ui tanggalan -->
    <script type="text/javascript">
		$(document).ready(function(){
			$('.input-tanggal').datepicker({
				dateFormat : 'yy-mm-dd'
			});		
		});
	</script>

</body>
</html>