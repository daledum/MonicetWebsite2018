<?php

class mfData {
  public static function getDiaSemanaPT($diaSemana){
    $semana = array(
        "Sun" => "Domingo", 
        "Mon" => "Segunda-feira", 
        "Tue" => "Terça-feira", 
        "Wed" => "Quarta-feira", 
        "Thu" => "Quinta-feira", 
        "Fry" => "Quinta-feira", 
        "Sat" => "Sábado"
        );
    return (isset($semana[$diaSemana]))? $semana[$diaSemana]: ''; 
  }
  
  public static function getMesPT($mes){
    $meses = array(
        "Jan" => "Janeiro", 
        "Feb" => "Fevereiro", 
        "Mar" => "Março", 
        "Apr" => "Abril", 
        "May" => "Maio", 
        "Jun" => "Junho", 
        "Jul" => "Julho", 
        "Aug" => "Agosto", 
        "Nov" => "Novembro", 
        "Sep" => "Setembro", 
        "Oct" => "Outubro", 
        "Nov" => "Novembro", 
        "Dec" => "Dezembro"
        );
    return (isset($meses[$mes]))? $meses[$mes]: ''; 
  }
  
  public static function getDataTextualPT( $date = null ){
    putenv("Atlantic/Azores");
    $result = '';
    if( $date ){
      $date = strtotime($date);
      $result =  self::getDiaSemanaPT(date("D", $date)).', dia '.date("d", $date).' de '.self::getMesPT(date("M", $date)).' de '.date("Y", $date);
    } else {
      $result =  self::getDiaSemanaPT(date("D")).', dia '.date("d").' de '.self::getMesPT(date("M")).' de '.date("Y");
    }
    return $result;
  }
  
  public static function getDatePlusOffset( $date, $dateFormat = 'Y-m-d', $year_off = 0, $month_off = 0, $day_off = 0, $hour_off = 0, $min_off = 0, $sec_off = 0 ) {
    $baseDate = strtotime($date);
    
    $year = date('Y', $baseDate) + $year_off;
    $month = date('m', $baseDate) + $month_off;
    $day = date('d', $baseDate) + $day_off;
    $hour = date('H', $baseDate) + $hour_off;
    $min = date('H', $baseDate) + $min_off;
    $sec = date('H', $baseDate) + $sec_off;
    
    return date( $dateFormat, mktime($hour, $minute, $second, $month, $day, $year));
  }
  
  public static function getDatasDaSemanaDaData($dataNaSemana = null)
  {
    if(!$dataNaSemana)
    {
      $dataNaSemana = date('Y-m-d');
    }
    $dataNaSemanaStamp = strtotime($dataNaSemana);
    $dia_semana = date('w', $dataNaSemanaStamp);
    $ano = date("Y", $dataNaSemanaStamp);
    $mes = date("m", $dataNaSemanaStamp);
    $dia = date("d", $dataNaSemanaStamp);
    $datas = array();
    for( $i=0; $i <= 6; $i++)
    {
      $datas[$i] = date("Y-m-d", mktime(0, 0, 0, $mes , ($dia-$dia_semana+$i), $ano));
    }
    return $datas;
  }

  public static function getDatasPorDiaSemanaNoIntervalo($dia_semana = 0, $inicio = null, $fim = null )
  {
    $datas = array();
    if( ($dia_semana <= 0) || ($dia_semana > 6))
    {
      return $datas;
    }
    if(!$inicio || !$fim)
    {
      return $datas;
    }

    $num_dias = (strtotime($fim) - strtotime($inicio)) /86400 + 1;
    $ano_inicio = date("Y", strtotime($inicio));
    $mes_inicio = date("m", strtotime($inicio));
    $dia_inicio = date("d", strtotime($inicio));

    for( $i=0; $i<$num_dias; $i++)
    {
      if(date("N", mktime(0, 0, 0, $mes_inicio , ($dia_inicio+$i), $ano_inicio)) == $dia_semana)
      {
        $datas[] = date("Y-m-d", mktime(0, 0, 0, $mes_inicio , ($dia_inicio+$i), $ano_inicio));
      }
    }

    return $datas;
  }

  public static function getDatasNoIntervalo($inicio = null, $fim = null, $fimDeSemana = false )
  {
    $datas = array();
    if(!$inicio || !$fim) {
      return $datas;
    }

    $num_dias = (strtotime($fim) - strtotime($inicio)) /86400 + 1;
    $ano_inicio = date("Y", strtotime($inicio));
    $mes_inicio = date("m", strtotime($inicio));
    $dia_inicio = date("d", strtotime($inicio));

    for( $i=0; $i<$num_dias; $i++) {
      $date_time = mktime(0, 0, 0, $mes_inicio , ($dia_inicio+$i), $ano_inicio);
      if( ( date("w", $date_time) != 0  && date("w", $date_time) != 6) || $fimDeSemana ) {
        $datas[] = date("Y-m-d", $date_time);
      }
    }

    return $datas;
  }

  public static function getdiaSemanaDCS($tempo)
  {
    $day = null;
    if($tempo > 0 && $tempo <= 20) { $day = '1'; }
    if($tempo > 20 && $tempo <= 40) { $day = '2'; }
    if($tempo > 40 && $tempo <= 60) { $day = '3'; }
    if($tempo > 60 && $tempo <= 80) { $day = '4'; }
    if($tempo > 80 && $tempo   <= 100) { $day = '5'; }
    return $day;
  }


  public static function isPosterior($date_to_test, $date_ref)
  {
    return (self::diff($date_to_test, $date_ref) > 0 )? true : false;
  }
  public static function isPosteriorEqual($date_to_test, $date_ref)
  {
    return (self::diff($date_to_test, $date_ref) >= 0 )? true : false;
  }
  public static function isAnterior($date_to_test, $date_ref)
  {
    return (self::diff($date_to_test, $date_ref) < 0 )? true : false;
  }
  public static function isAnteriorEqual($date_to_test, $date_ref)
  {
    return (self::diff($date_to_test, $date_ref) <= 0 )? true : false;
  }

  public static function isBetweenDates($date, $begin, $end)
	{
	  return (self::diff($date, $begin) >= 0 && self::diff($date, $end) <= 0);
	}
  public static function diff($end, $begin, $interval = 'd')
  {
    return self::diff_general($interval, $begin, $end, false);
  }
  public static function get_month_name( $number ){
    $name = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    return array_key_exists( $number, $name) ? $name[$number] : '';
  }
  public static function get_month_name_abbr( $number ){
    $name = array('', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
    return array_key_exists( $number, $name) ? $name[$number] : '';
  }
  public static function diff_general($interval, $datefrom, $dateto, $using_timestamps = false)
  {
    /*
    $interval can be:
    yyyy - Number of full years
    q - Number of full quarters
    m - Number of full months
    y - Difference between day numbers (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d - Number of full days
    w - Number of full weekdays
    ww - Number of full weeks
    h - Number of full hours
    n - Number of full minutes
    s - Number of full seconds (default)
    */
    if (!$using_timestamps) {
      $datefrom = strtotime($datefrom, 0);
      $dateto = strtotime($dateto, 0);
    }
      $difference = $dateto - $datefrom; // Difference in seconds

    switch($interval) {
      case 'yyyy': // Number of full years
        $years_difference = floor($difference / 31536000);
        if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
          $years_difference--;
        }
        if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
          $years_difference++;
        }
        $datediff = $years_difference;
        break;

      case "q": // Number of full quarters
        $quarters_difference = floor($difference / 8035200);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
          $months_difference++;
        }
        $quarters_difference--;
        $datediff = $quarters_difference;
        break;

      case "m": // Number of full months
        $months_difference = floor($difference / 2678400);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
          $months_difference++;
        }
        $months_difference--;
        $datediff = $months_difference;
        break;

      case 'y': // Difference between day numbers
        $datediff = date("z", $dateto) - date("z", $datefrom);
        break;

      case "d": // Number of full days
        $datediff = floor($difference / 86400);
        break;

      case "w": // Number of full weekdays
        $days_difference = floor($difference / 86400);
        $weeks_difference = floor($days_difference / 7); // Complete weeks
        $first_day = date("w", $datefrom);
        $days_remainder = floor($days_difference % 7);
        $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
        if ($odd_days > 7) { // Sunday
          $days_remainder--;
        }
        if ($odd_days > 6) { // Saturday
          $days_remainder--;
        }
        $datediff = ($weeks_difference * 5) + $days_remainder;
      break;

      case "ww": // Number of full weeks
        $datediff = floor($difference / 604800);
      break;

      case "h": // Number of full hours
        $datediff = floor($difference / 3600);
        break;

      case "n": // Number of full minutes
        $datediff = floor($difference / 60);
        break;

      default: // Number of full seconds (default)
        $datediff = $difference;
        break;
    }
    return $datediff;
  }

  public static function getPeriodByMonthsForQuery($mesInicio=9, $mesFim=8, $ano_inicial=null)
  {
    if(!$ano_inicial)
    {
      $ano_lectivo = mfAnoLectivoPeer::getAnoLectivoActivo();
      $ano_inicial = $ano_lectivo->getPeriodoUmInicio('Y');
    }
    $periodo = array();
    if(($mesInicio >= 9) && ($mesInicio <= 12))
    {
      $periodo['inicio'] = $ano_inicial.'-'.sprintf("%02d", $mesInicio).'-01';
    }
    if(($mesInicio >= 1) && ($mesInicio <= 8))
    {
      $periodo['inicio'] = ($ano_inicial+1).'-'.sprintf("%02d", $mesInicio).'-01';
    }
    if(($mesFim >= 9) && ($mesFim <= 11))
    {
      $periodo['fim'] = $ano_inicial.'-'.sprintf("%02d", ($mesFim+1)).'-01';
    }
    if($mesFim == 12)
    {
      $periodo['fim'] = ($ano_inicial+1).'-01-01';
    }
    if(($mesFim >= 1) && ($mesFim <= 8))
    {
      $periodo['fim'] = ($ano_inicial+1).'-'.sprintf("%02d", ($mesFim+1)).'-01';
    }
    return $periodo;
  }

}

?>
