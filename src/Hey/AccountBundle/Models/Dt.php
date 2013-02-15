<?php
namespace Hey\AccountBundle\Models;
/**
 * Classe date
 * @author Dolyveen Renault
 * 
 */
class Dt
{
	public static function getTimeStamps($date,$separateur="/",$multiplicateur=1,$addition=0,$gmt = false)
	{
		
		list($d,$h) = explode(" ",$date);
		list($heure,$min) = explode(":",$h);
		
		if(!is_numeric($heure))
		$heure = 0;
		
		if(!is_numeric($min))
		$min = 0;
		
		list($d,$m,$y) = explode($separateur,$d);
		
		if($gmt)
		$tps = gmmktime($heure,$min,0, $m, $d, $y);
		else
		$tps = mktime($heure,$min,0, $m, $d, $y);
		

		if($multiplicateur!=1)
		$tps = $tps * $multiplicateur;
		
		if($addition!=0)
		$tps = $tps + $addition;

		return $tps;
	}
	
}