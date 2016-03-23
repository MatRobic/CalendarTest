<?php 

namespace Calendar;

require('CalendarInterface.php');

use DateTimeInterface;

class CalendarClass implements CalendarInterface {

	private $_datetime;
	private $_month;
	private $_year;

	/**
     * @param DateTimeInterface $datetime
     */
    public function __construct(DateTimeInterface $datetime) {
    	$dayFormated = strtotime($datetime->format('Y-m-d'));
    	$this->_datetime = $dayFormated;
		$this->_month = date('m', $dayFormated); 
		$this->_year = date('Y', $dayFormated);
    }

    /**
     * Get the day
     *
     * @return int
     */
    public function getDay() {
    	return (int) date('d', $this->_datetime); 
    }

    /**
     * Get the weekday (1-7, 1 = Monday)
     *
     * @return int
     */
    public function getWeekDay() {
    	return (int) date('N', $this->_datetime); 
    }

    /**
     * Get the first weekday of this month (1-7, 1 = Monday)
     *
     * @return int
     */
    public function getFirstWeekDay() {
    	$first_day =  (int) date('N', mktime(0, 0, 0, $this->_month, 1, $this->_year));  

    	return $first_day;
    }

    /**
     * Get the first week of this month (18th March => 9 because March starts on week 9)
     *
     * @return int
     */
    public function getFirstWeek() {
    	$first_week = (int) date('W', mktime(0, 0, 0, $this->_month, 1));

    	return $first_week;
    }

    /**
     * Get the number of days in this month
     *
     * @return int
     */
    public function getNumberOfDaysInThisMonth() {
		$daysInThisMonth = (int) cal_days_in_month(0, $this->_month, $this->_year);

		return $daysInThisMonth;
    }

    /**
     * Get the number of days in the previous month
     *
     * @return int
     */
    public function getNumberOfDaysInPreviousMonth() {
		$daysInPreviousMonth = (int) cal_days_in_month(0, $this->_month-1, $this->_year);

		return $daysInPreviousMonth;
    }

    /**
     * Get the calendar array
     *
     * @return array
     */
    public function getCalendar() {

    	$array = array();

    	$day = $this->getDay();
    	$month = $this->_month; 
		$year = $this->_year;	
		$day_of_the_week = $this->getWeekDay();	
    	$days_in_month = $this->getNumberOfDaysInThisMonth();
    	$days_in_previous_month = $this->getNumberOfDaysInPreviousMonth();
    	$first_day = $this->getFirstWeekDay();	
    	$first_week = $this->getFirstWeek();

		$day_count = 1;		
		$day_num = 0;
		$arrayWeek = array();

		$stack = array();
		for ( $i = 0; $i < 7; $i++ ) { 
			$number = $day - $i - $day_of_the_week;
		    array_push($stack, $number);
		}	

		while ( $day_of_the_week > 0 && $day_count ) {
			$arrayWeek[$days_in_previous_month - $day_num] = 'false';
			$day_of_the_week--;
		}
		
		while ( $day_num <= $days_in_month ) {
						
			if ( in_array($day_num, $stack) ) {
				$arrayWeek[$day_num] = 'true';
	    	} 
	    	else {    		
				$arrayWeek[$day_num] = 'false';
	    	}			
			$day_num++; 
			$day_count++;

			if ( $day_count > 7 ) {
				$array[$first_week] = $arrayWeek;
				$first_week++;
				$arrayWeek = NULL;
				$day_count = 1;
			}
		}

		$dayLeft = 7 - count($arrayWeek);
		for($i=0;$i<$dayLeft;$i++)
		{
		    $arrayWeek[$i+1] = 'false';
		}
		$array[$first_week] = $arrayWeek;
		$first_week++;
		$arrayWeek = NULL;

		return $array;
    }
}

$dayCurrent = new \DateTime();
$calendar = new CalendarClass($dayCurrent);
echo 'Day: ' . $calendar->getDay() . '<br>';
echo 'WeekDay: ' . $calendar->getWeekDay() . '<br>';
echo 'FirstWeekDay: ' . $calendar->getFirstWeekDay() . '<br>';
echo 'FirstWeek: ' . $calendar->getFirstWeek() . '<br>';
echo 'NumberOfDaysInThisMonth: ' . $calendar->getNumberOfDaysInThisMonth() . '<br>';
echo 'NumberOfDaysInPreviousMonth: ' . $calendar->getNumberOfDaysInPreviousMonth() . '<br>';
print_r($calendar->getCalendar());

?>

