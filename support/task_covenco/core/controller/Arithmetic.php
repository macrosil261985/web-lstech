<?php
class Arithmetic {

    function accumulateHours($hoursarray) {
        $total = 0;
        foreach($hoursarray as $h) {
            $parts = explode(":", $h);
            $total += $parts[2] + $parts[1]*60 + $parts[0]*3600;        
        }   
        
        $hours = floor($total / 3600);
        $minutes = floor(($total - ($hours * 3600)) / 60);
        $seconds = $total - ($hours * 3600) - ($minutes * 60);
        
        $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
        $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
        $seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);
    
        return $hours . ':' . $minutes . ":" . $seconds;
    }
	
}
?>