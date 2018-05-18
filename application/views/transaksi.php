<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/AdminLTE.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/inpo-box.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/skins/_all-skins.min.css">

     <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jquery-ui/themes/base/jquery-ui.css'?>">

     <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#setoranForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 5px;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
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

	<!-- modals tambah transaksi baru -->
  		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Transaksi Baru</button>

	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
    
	      <!-- Modal content-->
			<form id="setoranForm">
			  <h1>Input Setoran</h1>
			  <!-- One "tab" for each step in the form: -->
			  <div class="tab">
			  	<h4>Setoran Cabai</h4>
			  	<label for="tgl_setor">Tanggal</label>
			    <p><input placeholder="Tanggal..." oninput="this.className = ''" name="tgl_setor"></p>
			    <label for="nama_setor">Nama</label>
			    <p><input placeholder="Masukkan Nama atau ID..." oninput="this.className = ''" name="nama_setor"></p>
			    <label for="cabai_setor">Jenis Cabai</label>
			    <p><input placeholder="Masukkan Nama atau ID..." oninput="this.className = ''" name="cabai_setor"></p>
			    <label for="cabai_setor">Harga</label>
			    <p><input oninput="this.className = ''" name="cabai_setor"></p>
		   	    <label for="berat_kotor">Berat Kotor</label>
			    <input oninput="this.className = ''" name="berat_kotor">
			    <label for="berat_bs">Berat BS</label>
			    <input oninput="this.className = ''" name="berat_bs">
			    <label for="berat_bersih">Berat Bersih</label>
			    <input oninput="this.className = ''" name="berat_bersih">
			  </div>
			  <div class="tab">
			    <p class="pull-right"><b>[ID] Nama</b></p><br>
			    <p class="pull-right">Saldo</p>
			    <p>Total Uang Cabai ...</p>
			    <h4>BON</h4>
			    <p><input oninput="this.className = ''" name="uang_bon"></p>
			  </div>
			  <div style="overflow:auto;">
			    <div style="float:right;">
			      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
			      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			    </div>
			  </div>
			  <!-- Circles which indicates the steps of the form: -->
			  <div style="text-align:center;margin-top:40px;">
			    <span class="step"></span>
			    <span class="step"></span>
			  </div>
			</form>
    </div>
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

    
    <!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>
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

	<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
 
</body>
</html>