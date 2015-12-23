<?php
	class weather extends connection {
		
		function get_weather($firstDate, $lastDate, $event) {
			$firstDate = $this->clearText($firstDate);
			$lastDate = $this->clearText($lastDate);
			$event = $this->clearText($event);
			
			if ($list = $this->runQuery("SELECT * FROM `weather_history` WHERE `event` LIKE '$event' AND 
			`delete` = '0' AND `date` BETWEEN '$firstDate' AND '$lastDate';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function get_weather_by_id($id) {
			$id = $this->clearText($id);
			
			if ($list = $this->runQuery("SELECT * FROM `weather_history` WHERE `id` = '$id';")) {
				if ($list->num_rows > 0) {
					return $list;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		
		function add($date, $maxTemp, $meanTemp, $minTemp, $dewPoint, $meanDew, $minDew, $maxHumid, 
		$meanHumid, $minHumid, $maxSeaLevel, $meanSeaLevel, $minSeaLevel, $maxVisibility, $meanVisibility, 
		$minVisibility, $maxWind, $meanWind, $maxGust, $precip, $cloudCover, $event, $windDirection) {
			$date = $this->clearText($date);
			$maxTemp = $this->clearText($maxTemp);
			$meanTemp = $this->clearText($meanTemp);
			$minTemp = $this->clearText($minTemp);
			$dewPoint = $this->clearText($dewPoint);
			$meanDew = $this->clearText($meanDew);
			$minDew = $this->clearText($minDew);
			$maxHumid = $this->clearText($maxHumid);
			$meanHumid = $this->clearText($meanHumid);
			$minHumid = $this->clearText($minHumid);
			$maxSeaLevel = $this->clearText($maxSeaLevel);
			$meanSeaLevel = $this->clearText($meanSeaLevel);
			$minSeaLevel = $this->clearText($minSeaLevel);
			$maxVisibility = $this->clearText($maxVisibility);
			$meanVisibility = $this->clearText($meanVisibility);
			$minVisibility = $this->clearText($minVisibility);
			$maxWind = $this->clearText($maxWind);
			$meanWind = $this->clearText($meanWind);
			$maxGust = $this->clearText($maxGust);
			$precip = $this->clearText($precip);
			$cloudCover = $this->clearText($cloudCover);
			$event = $this->clearText($event);
			$windDirection = $this->clearText($windDirection);
			
			$query = "INSERT INTO `weather_history`(`date`, `max_temp`, `mean_temp`, `min_temp`, `dew_point`, `mean_dew`, `min_dew`, 
						`max_humid`, `mean_humid`, `min_humid`, `max_sea_level`, `mean_sea_level`, `min_sea_level`, `max_visibility`, 
						`mean_visibility`, `min_visibility`, `max_wind`, `mean_wind`, `max_gust`, `precip`, `cloud_cover`, `event`, 
						`wind_direction`, `delete`) 
						VALUES('$date', '$maxTemp', '$meanTemp', '$minTemp', '$dewPoint', '$meanDew', '$minDew', '$maxHumid', '$meanHumid', 
						'$minHumid', '$maxSeaLevel', '$meanSeaLevel', '$minSeaLevel', '$maxVisibility', '$meanVisibility', '$minVisibility', 
						'$maxWind', '$meanWind', '$maxGust', '$precip', '$cloudCover', '$event', '$windDirection', '0');";
			
			if ($result = $this->runQuery($query)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		function delete($id) {
			$id = $this->clearText($id);
			
			if ($result = $this->runQuery("UPDATE `weather_history` SET `delete` = '1' WHERE `id` = '$id';")) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
?>