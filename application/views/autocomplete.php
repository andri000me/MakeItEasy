<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/jquery-ui/themes/base/jquery-ui.css'?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Autocomplete Codeigniter</h2>
        </div>
        <div class="row">
            <form>
                 <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama_petani" placeholder="Nama Petani" style="width:500px;">
                  </div>
            </form>
        </div>
    </div>
 
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
   <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url().'assets/bower_components/jquery-ui/jquery-ui.js'?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_petani" ).autocomplete({
              source: "<?php echo site_url('Transaksi2/get_petani/?');?>"
            });
        });
    </script>
 
</body>
</html>