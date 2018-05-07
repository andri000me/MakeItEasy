<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jquery-ui/themes/base/jquery-ui.css'?>">
</head>

<body>
	<!-- list harga cabai hari ini -->
	<div>
		<h3>Transaksi Cabai hari ini</h3>
		<p> datetime </p> <?php echo $today; ?>
		<table>
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Kode</th>
					<th rowspan="2">Jenis</th>
					<th colspan="2">Harga</th>
				</tr>
				<tr>
					<th>BS</th>
					<th>Bersih</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($harga_today as $key): ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $key->kode ?></td>
					<td><?= $key->jenis ?></td>
					<td><?= $key->harga_bs ?></td>
					<td><?= $key->harga_bersih ?></td>
				</tr>
				<?php $no++; endforeach ?>
			</tbody>
		</table>		
	</div>

	<!-- tambah transaksi baru -->
	<div class="container">
		<form action="<?php echo base_url().'Transaksi2/next_transaksi'; ?>" method="post">
			<label>Tanggal</label>
			<input type="text" name="tanggal" class="input-tanggal" style="width: 100px"></td><br>
				
			<label>ID Petani</label>
			<input type="text" name="id_petani" style="width: 100px"><br>
		
			<label>Jenis Cabai</label>
			<input type="text" name="kode_cabai" style="width: 100px"><br>
		
			<b>Berat</b>
			<label>BS</label>
			<input type="text" name="berat_bs" style="width: 50px">kg<br>
		
			<label>Bersih</label>
			<input type="text" name="berat_bersih" style="width: 50px">kg<br>

			<input type="submit" value="Next">

		</form>

		<label>Nama Petani</label><br>
		<label>Daerah</label><br>
		<label>Jumlah Uang</label><br>
		<label>Saldo</label><br>
		<br>

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

					<!-- <label>harga</label>
					<input type="text" name="harga" value="Rp8000" readonly="readonly" style="width: 100px"><br>

					<label>BON</label>
					<input type="text" name="bon" id="bon" style="width: 100px"><br>

					<input type="submit" value="Submit"> -->
		
    </div>

	<!-- tabel transaksi -->
	<table>
		<thead>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Tanggal</th>
				<th rowspan="2">Nama</th>
				<th rowspan="2">Desa</th>
				<th rowspan="2">Jenis Cabai</th>
				<th colspan="2">Berat</th>
				<th rowspan="2">Jumlah Uang</th>
				<th rowspan="2">BON</th>
				<th rowspan="2">Saldo</th>
				<th rowspan="2">pilihan</th>
			</tr>
			<tr>
				<th>BS</th>
				<th>Bersih</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($tb_transaksi as $tb): ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $tb->tanggal ?></td>
				<td><?= $tb->nama ?></td>
				<td><?= $tb->desa ?></td>
				<td><?= $tb->kode_cabai ?></td>
				<td><?= $tb->berat_bs ?></td>
				<td><?= $tb->berat_bersih ?></td>
				<td><?= $tb->jumlah_uang ?></td>
				<td><?= $tb->bon ?></td>
				<td><?= $tb->saldo ?></td>
			</tr>
			<?php $no++; endforeach ?>
		</tbody>
	</table>

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