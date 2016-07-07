<?php 
class CalculateDate{

	public function __construct(){}
	
	public static function CalculateDate(){
		$args = func_get_args();
		if($args[0] == 0){
			$date = time();
		} else{
			$date_time_string = $args[0];
			$dt_elements = explode('T',$date_time_string);
			$date_elements = explode('-',$dt_elements[0]);
			$time_elements =  explode(':',$dt_elements[1]);
			$date = mktime($time_elements[0], $time_elements[1],$time_elements[2], $date_elements[1],$date_elements[2], $date_elements[0]);  
		}
		$firstWeek = date('Y-m-d H:i:s W', strtotime(date('Y', $date).'W011'));
		$lastWeek = date('Y-m-d H:i:s W', strtotime(date('Y', $date) + 1 .'W011') - 1 );
		echo $firstWeek.'<br/>'.$lastWeek ;
	}	
}
?>