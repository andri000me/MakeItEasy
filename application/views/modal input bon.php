<!-- di HEAD -->
<!-- Add form group -->
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- modal  -->
<!-- Modal Input Setoran-->
<div id="inputSetoran" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Setoran</h4>
      </div>
      <form action="<?php echo base_url().'Transaksi/tambah_transaksi'; ?>" method="post">
      <div class="modal-body">

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Tanggal :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="tanggal" class="form-control input-tanggal datepicker">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Nama Petani :</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="nama_petani" class="form-control">
          </div>
        </div>

        <div class="row" style="padding-bottom: 5px">
          <div class="col-md-4">
            <label>Saldo :</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" disabled>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
          <label> Masukkan barang bon </label>
          <input type="hidden" name="count" value="1" />
            <div id="fields">
              <div class="controls form-inline" id="profs"> 
                <form >
                  <div id="field" class="form-group">
                    <input autocomplete="off" class="input form-control" id="field1" name="prof1" type="select" placeholder="Nama Barang" data-items="8"/>
                    <input autocomplete="off" class="input form-control" id="qty1" name="qty1" type="number" placeholder="Jumlah" data-items="8"/>
                    <input autocomplete="off" class="input form-control" id="price1" name="price1" type="number" placeholder="Harga" data-items="8" disabled=/>
                    <button id="b1" class="btn add-more" type="button">+</button>
                  </div>
                </form>
              <br>
              <small>Tekan + untuk menambahkan kolom :)</small>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <br>

        <div class="row" style="padding : 10px 0px">
          <form>
            <div class="col-md-4"> 
              <label>Ambil uang:</label>
            </div>
            <div class="col-md-8">
              <input type="number" class="form-control" step ="50">
            </div>
          </form>
          <br>
        </div>

        
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>
    </div>

  </div>
</div>
<!-- END Modal Input Setoran -->



<!-- dibawah jquery -->
<script>
  $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#price" + next;
        var addRemove = "#price" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text" placeholder="Nama Barang">' +'   <input autocomplete="off" class="input form-control" id="qty' + next + '" name="qty' + next + '" type="number" placeholder="Jumlah">' + '<input autocomplete="off" class="input form-control" id="price' + next + '" name="price' + next + '" type="number" placeholder="Harga" data-items="8" disabled=/>';
        var newInput = $(newIn);
        // var newInq = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="qty' + next + '" type="number" placeholder="Jumlah">';
        // var newInputq = $(newInq);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me">-</button></div><div id="field"> <br id="br'+next+'">';
        var removeButton = $(removeBtn);
        // $(newInputq).after(newInput);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                var qtyID = "#qty" + fieldNum;
                var priceID = "#price" + fieldNum;
                var brID = "#br" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
                $(qtyID).remove();
                $(priceID).remove();
                $(brID).remove();
            });
    });  
});
</script>