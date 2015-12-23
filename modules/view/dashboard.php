<?php
	$data = new connection();
	
	if ($query = $data->runQuery("SELECT COUNT(`id`) FROM `weather_history` WHERE `delete` = '0';")) {
		while ($rs = $query->fetch_array()) {
			$total = $rs[0];
		}
	}
?>
<section class="wrapper site-min-height">
	<!-- page start-->
	<div id="morris">
		<div class="row state-overview">
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol yellow">
						<i class="fa fa-cloud"></i>
					</div>
					<div class="value">
						<h1 class=" count4"><?php echo 22; ?></h1>
						<p>Parameter Cuaca</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol blue">
						<i class="fa fa-bar-chart-o"></i>
					</div>
					<div class="value">
						<h1 class=" count4"><?php echo $total; ?></h1>
						<p>Total Data</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol red">
						<i class="fa fa-download"></i>
					</div>
					<div class="value">
						<h1 class=" count4"><?php echo 0; ?></h1>
						<p>JSON Request</p>
					</div>
				</section>
			</div>
			<div class="col-lg-3 col-sm-6">
				<section class="panel">
					<div class="symbol terques">
						<i class="fa fa-tachometer"></i>
					</div>
					<div class="value">
						<h1 class=" count4"><?php echo "100%"; ?></h1>
						<p>Performa Hitung</p>
					</div>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Prosentase Data Cuaca
					</header>
					<div class="panel-body">
						<div id="graph-cuaca" class="graph"></div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- page end-->
</section>

<script>
$(document).ready(function(){
	Morris.Donut({
        element: 'graph-cuaca',
        data: [
          <?php
			if ($query = $data->runQuery("SELECT `event`, COUNT(`id`) FROM `weather_history` GROUP BY `event`;")) {
				while ($rs = $query->fetch_array()) {
					if ($rs["event"] == "1") {
						$event = "Sunny";
					} elseif($rs["event"] == "2") {
						$event = "Rain";
					} elseif($rs["event"] == "3") {
						$event = "Thunderstorm";
					} elseif($rs["event"] == "4") {
						$event = "Rain-Thunderstorm";
					} else {
						$event = "Tidak Diketahui";
					}
					
					echo "{label:'$event',value:'".number_format($rs[1] / $total * 100, 0)."'},";
				}
			}
		  ?>
        ],
          colors: ['#46BFBD', '#F7464A', '#34a39b', '#FDB45C'],
        formatter: function (y) { return y + "%" }
      });
});
</script>