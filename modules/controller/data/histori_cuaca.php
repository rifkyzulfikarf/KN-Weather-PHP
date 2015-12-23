<?php
	if (isset($_POST['apa']) && $_POST['apa'] != "") {
		
		include 'modules/model/class.weather.php';
		$data = new weather();
		
		switch ($_POST['apa']) {
			case "get-cuaca":
				$collect = array();
				
				if (isset($_POST['tglAwal']) && $_POST['tglAwal'] != "" && isset($_POST['tglAkhir']) && $_POST['tglAkhir'] != "") {
					
					if ($query = $data->get_weather($_POST['tglAwal'], $_POST['tglAkhir'], "%")) {
						while ($rs = $query->fetch_array()) {
							if ($rs["event"] == "1") {
								$event = "Cerah";
							} elseif($rs["event"] == "2") {
								$event = "Hujan";
							} elseif($rs["event"] == "3") {
								$event = "Berawan / Badai Petir";
							} elseif($rs["event"] == "4") {
								$event = "Hujan Disertai Badai Petir";
							} else {
								$event = "Tidak Diketahui";
							}
							
							
							$detail = array();
							array_push($detail, $rs["date"]);
							array_push($detail, $event);
							array_push($detail, "<button type='button' class='btn btn-sm btn-primary' id='btn-show-detail' data-id='".$rs['id']."'>
										<i class='fa fa-eye'></i></button>
										<button type='button' class='btn btn-sm btn-danger' id='btn-hapus-data' data-id='".$rs['id']."'>
										<i class='fa fa-trash-o'></i></button>");
							array_push($collect, $detail);
							unset($detail);
						}
					}
				
				}
				echo json_encode(array("aaData"=>$collect));
				break;
			case "get-detail":
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($query = $data->get_weather_by_id($_POST['id'])) {
						while ($rs = $query->fetch_array()) {
							echo "<tr><td>Suhu Maksimal</td><td>".$rs['max_temp']."</td></tr>
								<tr><td>Suhu Rata - Rata</td><td>".$rs['mean_temp']."</td></tr>
								<tr><td>Suhu Minimal</td><td>".$rs['min_temp']."</td></tr>
								<tr><td>Suhu Titik Pengembunan (Dew Point)</td><td>".$rs['dew_point']."</td></tr>
								<tr><td>Rata - Rata Suhu Titik Pengembunan</td><td>".$rs['mean_dew']."</td></tr>
								<tr><td>Suhu Titik Pengembunan Minimal</td><td>".$rs['min_dew']."</td></tr>
								<tr><td>Kelembaban Maksimal</td><td>".$rs['max_humid']."</td></tr>
								<tr><td>Kelembaban Rata - Rata</td><td>".$rs['mean_humid']."</td></tr>
								<tr><td>Kelembaban Minimal</td><td>".$rs['min_humid']."</td></tr>
								<tr><td>Ketinggian Permukaan Air Laut Maksimal</td><td>".$rs['max_sea_level']."</td></tr>
								<tr><td>Rata - Rata Ketinggian Permukaan Air Laut</td><td>".$rs['mean_sea_level']."</td></tr>
								<tr><td>Ketinggian Permukaan Air Laut Minimal</td><td>".$rs['min_sea_level']."</td></tr>
								<tr><td>Jarak Pandang Maksimal</td><td>".$rs['max_visibility']."</td></tr>
								<tr><td>Rata - Rata Jarak Pandang</td><td>".$rs['mean_visibility']."</td></tr>
								<tr><td>Jarak Pandang Minimal</td><td>".$rs['min_visibility']."</td></tr>
								<tr><td>Kecepatan Angin Maksimal</td><td>".$rs['max_wind']."</td></tr>
								<tr><td>Rata - Rata Kecepatan Angin</td><td>".$rs['mean_wind']."</td></tr>
								<tr><td>Kecepatan Hembusan Angin Maksimal</td><td>".$rs['max_gust']."</td></tr>
								<tr><td>Curah Hujan</td><td>".$rs['precip']."</td></tr>
								<tr><td>Sebaran Awan</td><td>".$rs['cloud_cover']."</td></tr>
								<tr><td>Arah Angin (Dalam Derajat)</td><td>".$rs['wind_direction']."</td></tr>";
						}
					}
				}
				break;
			case "tambah-cuaca":
				$arr=array();
				
				if (isset($_POST['maxtemp']) && $_POST['maxtemp'] != "" && isset($_POST['meantemp']) && $_POST['meantemp'] != "" && 
					isset($_POST['mintemp']) && $_POST['mintemp'] != "" && isset($_POST['dewpoint']) && $_POST['dewpoint'] != "" && 
					isset($_POST['meandew']) && $_POST['meandew'] != "" && isset($_POST['mindew']) && $_POST['mindew'] != "" && 
					isset($_POST['maxhumid']) && $_POST['maxhumid'] != "" && isset($_POST['meanhumid']) && $_POST['meanhumid'] != "" && 
					isset($_POST['minhumid']) && $_POST['minhumid'] != "" && isset($_POST['maxsealevel']) && $_POST['maxsealevel'] != "" && 
					isset($_POST['meansealevel']) && $_POST['meansealevel'] != "" && isset($_POST['minsealevel']) && $_POST['minsealevel'] != "" && 
					isset($_POST['maxvisibility']) && $_POST['maxvisibility'] != "" && isset($_POST['meanvisibility']) && $_POST['meanvisibility'] != "" && 
					isset($_POST['minvisibility']) && $_POST['minvisibility'] != "" && isset($_POST['maxwind']) && $_POST['maxwind'] != "" && 
					isset($_POST['meanwind']) && $_POST['meanwind'] != "" && isset($_POST['maxgust']) && $_POST['maxgust'] != "" && 
					isset($_POST['precip']) && $_POST['precip'] != "" && isset($_POST['cloudcover']) && $_POST['cloudcover'] != "" && 
					isset($_POST['event']) && $_POST['event'] != "" && isset($_POST['winddirection']) && $_POST['winddirection'] != "" && 
					isset($_POST['tgl']) && $_POST['tgl'] != "") {
					
					if ($result = $data->add($_POST['tgl'], $_POST['maxtemp'], $_POST['meantemp'], $_POST['mintemp'], $_POST['dewpoint'], 
					$_POST['meandew'], $_POST['mindew'], $_POST['maxhumid'], $_POST['meanhumid'], $_POST['minhumid'], $_POST['maxsealevel'], 
					$_POST['meansealevel'], $_POST['minsealevel'], $_POST['maxvisibility'], $_POST['meanvisibility'], $_POST['minvisibility'], 
					$_POST['maxwind'], $_POST['meanwind'], $_POST['maxgust'], $_POST['precip'], $_POST['cloudcover'], $_POST['event'], 
					$_POST['winddirection'])) {
						$arr['status']=TRUE;
						$arr['msg']="Data tersimpan..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menyimpan..";
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
			case "hapus-cuaca":
				$arr=array();
				
				if (isset($_POST['id']) && $_POST['id'] != "") {
					
					if ($result = $data->delete($_POST['id'])) {
						$arr['status']=TRUE;
						$arr['msg']="Data terhapus..";
					} else {
						$arr['status']=FALSE;
						$arr['msg']="Gagal menghapus..";
					}
				} else {
					$arr['status']=FALSE;
					$arr['msg']="Harap isi data dengan lengkap..";
				}
				
				echo json_encode($arr);
				break;
		}
	}
?>