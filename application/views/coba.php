<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
                          <thead>
                            <tr>
                              <th style="text-align: center; line-height: 50px">jenis cabai</th>
                              <th style="text-align: center; line-height: 50px">berat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($cabai as $tb): ?>
                              <tr>
                                <td><?= $tb->jenis ?></td>
                                <td><?= $tb->bersih ?></td>
                              </tr>
                            <?php $no++; endforeach ?>
                          </tbody>
                        </table>



                        <table>
                          <thead>
                            <tr>
                              <th style="text-align: center; line-height: 50px">#</th>
                              <th style="text-align: center; line-height: 50px">Tanggal</th>
                              <th style="text-align: center; line-height: 50px">kotor</th>
                              <th>Jumlah BON</th>
                              <th>Jumlah Uang</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($jumlahan as $tb): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $tb->tanggal ?></td>
                                <td><?= $tb->berat_kotor ?></td>
                                <td><?= $tb->bon ?></td>
                                <td><?= $tb->jumlah_uang ?></td>
                              </tr>
                            <?php $no++; endforeach ?>
                          </tbody>
                        </table>

                        <table>
                          <thead>
                            <tr>
                              <th style="text-align: center; line-height: 50px">#</th>
                              <th style="text-align: center; line-height: 50px">Tanggal</th>
                              <th style="text-align: center; line-height: 50px">bersih</th>
                              <th>Jumlah Uang</th>
                              <th>Transferan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; foreach ($rekapPembeli as $tb): ?>
                              <tr>
                                <td><?= $no ?></td>
                                <td><?= $tb->tanggal ?></td>
                                <td><?= $tb->bersih ?></td>
                                <td><?= $tb->jumlah_uang ?></td>
                                <td><?= $tb->transferan ?></td>
                              </tr>
                            <?php $no++; endforeach ?>
                          </tbody>
                        </table>

  <div id="canvas-holder" style="width:40%">
    <canvas id="chart-area"></canvas>
  </div>


</body>
</html>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/chart.js/Chart.js"></script>
<script>
    $(document).ready(function() {
      $.ajax({
        url : "http://localhost/MakeItEasy/Perusahaan/rekap_cabai",
        type : "GET",
        dataType: "JSON",
        success : function(data){
          console.log(data);

          var jenis = [];
          var berat = [];

          for (var i in data) {
            jenis.push(data[i].jenis);
            berat.push(data[i].bersih);
          }

          var config = {
            type: 'doughnut',
            data: {
              datasets: [{
                data: berat,
                backgroundColor: [
                  'rgba(200, 200, 200, 0.75)',
                  'rgba(200, 200, 200, 5)',
                  'rgba(200, 100, 200, 0.75)',
                ],
                label: 'Dataset 1'
              }],
              labels: jenis,
            },
            options: {
              responsive: true,
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
              },
              animation: {
                animateScale: true,
                animateRotate: true
              }
            }
          };

          var ctx = document.getElementById('chart-area').getContext('2d');
          window.myDoughnut = new Chart(ctx, config);
        }
      });

      
    });
</script>

