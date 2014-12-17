<?php
namespace StructuredPHP\Common\Util\Math;

use StructuredPHP\Common\Type\Object;

/**
 * 
 * 
 * @author haihao
 *
 */
class GeoCalculator extends Object {
	
	const HIGH_LAT 	= "HIGH_LAT";
	const LOW_LAT	= "LOW_LAT";
	const HIGH_LON	= "HIGH_LON";
	const LOW_LON	= "LOW_LON";
	
	/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
	/*::                                                                         :*/
	/*::  This routine calculates the distance between two points (given the     :*/
	/*::  latitude/longitude of those points). It is being used to calculate     :*/
	/*::  the distance between two locations using GeoDataSource(TM) Products    :*/
	/*::                     													 :*/
	/*::  Definitions:                                                           :*/
	/*::    South latitudes are negative, east longitudes are positive           :*/
	/*::                                                                         :*/
	/*::  Passed to function:                                                    :*/
	/*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
	/*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
	/*::    unit = the unit you desire for results                               :*/
	/*::           where: 'M' is statute miles                                   :*/
	/*::                  'K' is kilometers (default)                            :*/
	/*::                  'N' is nautical miles                                  :*/
	/*::  Worldwide cities and other features databases with latitude longitude  :*/
	/*::  are available at http://www.geodatasource.com                          :*/
	/*::                                                                         :*/
	/*::  For enquiries, please contact sales@geodatasource.com                  :*/
	/*::                                                                         :*/
	/*::  Official Web site: http://www.geodatasource.com                        :*/
	/*::                                                                         :*/
	/*::         GeoDataSource.com (C) All Rights Reserved 2014		   		     :*/
	/*::                                                                         :*/
	/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
	public function distance($lat1, $lon1, $lat2, $lon2, $unit = "M")
	{
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
	
		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}
	
	/**
	 * get boundary location
	 *
	 * @param unknown $lat
	 * @param unknown $lon
	 * @param unknown $distance
	 * @param unknown $type
	 * @param real $interval
	 * @return multitype:unknown real
	 */
	public function getBoundaryLocation($lat, $lon, $distance, $type, $interval = 0.001)
	{
		$lat1 = $lat;
		$lon1 = $lon;
		$lat2 = $lat;
		$lon2 = $lon;
		$result = array('lat'=> $lat2, 'lon' => $lon2);
		while (($distance - $this->distance($lat1, $lon1, $lat2, $lon2)) > 0.1)
		{
			switch ($type) {
				case self::HIGH_LAT:
					$lat2 += $interval;
					$result['lat'] = $lat2;
					break;
				case self::LOW_LAT:
					$lat2 -= $interval;
					$result['lat'] = $lat2;
					break;
				case self::HIGH_LON:
					$lon2 += $interval;
					$result['lon']	= $lon2;
					break;
				default:
					$lon2 -= $interval;
					$result['lon']	= $lon2;
					break;
			}
		}
		return $result;
	}
	
}