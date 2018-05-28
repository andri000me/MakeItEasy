<html lang="en">
<head>


  <title>Jquery select2 ajax autocomplete example code with demo</title>
  <!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

</head>
<body>


<div>
  <h2>Select Box with Search Option Jquery Select2.js</h2>
  <select class="itemName form-control" style="width:500px" name="itemName"></select>
  <input type="text" readonly name="saldo_petani" id="saldo_petani">
</div>

<!-- <p>select2 select box:</p>
    <p>
      <select  class="select2 form-control" style="width:300px">
          <option> </option>
          <option value="AL">Alabama</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WV">West Virginia</option>
      </select>
    </p> -->

    <!-- <input type="text" id="test">  -->

<!-- <script>
      $(function(){
    // turn the element to select2 select style
    $('.select2').select2({
      placeholder: "Select a state"
    });

    $('.select2').on('change', function() {
      var data = $(".select2 option:selected").text();
      $("#test").val(data);
    })
  });
</script> -->

<script type="text/javascript">
  $(function(){
      $('.itemName').select2({
        placeholder: '--- Select Item ---',
        ajax: {
          url: "<?php echo base_url();?>Transaksi2/get_petani",
          dataType: "json",
          delay: 250,
          data: function(params){
            return{
              nama : params.term
            };
          },
          processResults: function (data) {
            var results = [];

            $.each(data, function(index, item){
              results.push({
                id: item.id,
                text: item.nama,
                saldo: item.saldo,
                desa: item.desa
              });
            });
            return{
              results: results
            };
          }
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo
      });

      $('.itemName').on('change', function()  {
          var data = $('.itemName').select2('data');
          $("#saldo_petani").val(data[0].saldo);
      })
    });

  function formatRepo (repo) {
  if (repo.loading) {
    return repo.text;
  }

  var markup = "<div class='select2-result-repository clearfix'>" +
    "[" + repo.id + "]" +
    "<b> " + repo.text + " </b>" +
    "(" + repo.desa + ")"+
    "</div>";
  return markup;
}

</script>


</body>
</html>