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
		if($date == null)
                return 0;
                
		$date_array = explode(" ",$date);
               
                $d = $date_array[0];
               
                if(isset($date_array[1]))
                $h = $date_array[1];
                else
                $h =  "00:00";
                
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
        public static function getDate($tps,$synthax="d/m/Y")
        {
            if($tps == 0 || $tps == null)
            return null;
            else
            return date($synthax,$tps);    
        }
	
}