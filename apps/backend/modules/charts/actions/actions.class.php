<?php

/**
 * charts actions.
 *
 * @package    monicet
 * @subpackage charts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeChart(sfWebRequest $request)
  {
    
    $colors = array();
    $colors['Ba'] = 'd90000';
    $colors['Bb'] = '00e700';
    $colors['Be'] = '00e7e7';
    $colors['Bm'] = 'e700e7';
    $colors['Bp'] = 'e6e6e6';
    $colors['Cc'] = 'fdc600';
    $colors['Cm'] = 'ddd2de';
    $colors['Dc'] = '0094da';
    $colors['Dd'] = 'e9e900';
    $colors['Em'] = '00d4c2';
    $colors['Gg'] = '00dc94';
    $colors['Gm'] = '00e697';
    $colors['Ha'] = '97e700';
    $colors['Kb'] = 'e7a000';
    $colors['Lk'] = 'e86800';
    $colors['Mb'] = 'e9009f';
    $colors['Md'] = 'e9000a';
    $colors['Mm'] = '7600e8';
    $colors['Oo'] = '80e600';
    $colors['Pc'] = '00e763';
    $colors['Pm'] = '006be7';
    $colors['Sb'] = '000000';
    $colors['Sc'] = 'a9d8ca';
    $colors['Sf'] = '000fdc';
    $colors['Tt'] = '878787';
    $colors['Zc'] = 'c1c1c1';
    $colors['Zp'] = 'c37676';
    
    $chco = '';
    $chdl = '';
    $chds = '';
    $chd = '';
    $dados = array();
    
    $sightings = SightingPeer::getFromInterval('2008-01-01', '2011-01-01');
    
    foreach($colors as $x => $color){
      $dados[$x] = 0;
    }
    
    foreach($sightings as $sighting){
      if($sighting->getSpecieId()){
        if($sighting->getTotal()){
          $dados[$sighting->getSpecie()->getCode()] += $sighting->getTotal();
        }
        else{
          $dados[$sighting->getSpecie()->getCode()] += 1;
        }
      }
    }
    
    $max = 0;
    
    foreach($dados as $d){
      if($d > $max){
        $max = $d;
      }
    }
    
    foreach($colors as $x => $color){
      if($dados[$x] > 0){
        $chco .= $color .',';
        $chdl .= $x.'|';
        $chds .= '0,'.$max.',';
        $chd .= $dados[$x].'|';
      }
    }
    
    $chco = substr($chco,0,-1);
    $chdl = substr($chdl,0,-1);
    $chds = substr($chds,0,-1);
    $chd = substr($chd,0,-1);
    
    $this->url = 'http://chart.apis.google.com/chart'.
      '?chxr=0,0,'.$max.
      '&chxt=y'.
      '&chbh=a'.
      '&chs=500x300'.
      '&cht=bvg'.
      '&chco='.$chco.
      '&chds='.$chds.
      '&chd=t:'.$chd.
      '&chdl='.$chdl.
      '&chdlp=b'.
      '&chtt=Vertical+bar+chart';
  }
  
  public function executeTime_chart(sfWebRequest $request){
    
    $colors = array();
    $colors['Ba'] = 'd90000';
    $colors['Bb'] = '00e700';
    $colors['Be'] = '00e7e7';
    $colors['Bm'] = 'e700e7';
    $colors['Bp'] = 'e6e6e6';
    $colors['Cc'] = 'fdc600';
    $colors['Cm'] = 'ddd2de';
    $colors['Dc'] = '0094da';
    $colors['Dd'] = 'e9e900';
    $colors['Em'] = '00d4c2';
    $colors['Gg'] = '00dc94';
    $colors['Gm'] = '00e697';
    $colors['Ha'] = '97e700';
    $colors['Kb'] = 'e7a000';
    $colors['Lk'] = 'e86800';
    $colors['Mb'] = 'e9009f';
    $colors['Md'] = 'e9000a';
    $colors['Mm'] = '7600e8';
    $colors['Oo'] = '80e600';
    $colors['Pc'] = '00e763';
    $colors['Pm'] = '006be7';
    $colors['Sb'] = '000000';
    $colors['Sc'] = 'a9d8ca';
    $colors['Sf'] = '000fdc';
    $colors['Tt'] = '878787';
    $colors['Zc'] = 'c1c1c1';
    $colors['Zp'] = 'c37676';
    
    $data1 = '2009-01-01';
    $data2 = '2009-12-31';
    
    $sightings = SightingPeer::getFromInterval($data1, $data2);
    
    $maximo = (int)date('z', strtotime($data2));
    $minimo = (int)date('z', strtotime($data1));
    
    echo $minimo.','.$maximo;
    
    $chco = '';
    $chdl = '';
    $chds = '';
    $chd = '';
    
    $dados = array();
    $datas = array();
    
    $max = 0;
    
    foreach($sightings as $sighting){
      if($sighting->getSpecieId()){
        $dados[$sighting->getSpecie()->getCode()] = array();
        $datas[$sighting->getSpecie()->getCode()] = array();
        $data = $sighting->getRecord()->getGeneralInfo()->getDate();
        /*if(in_array($data)){
          
        }*/
        
        if($sighting->getTotal()){
          $dados[$sighting->getSpecie()->getCode()][] = array('data' => $data , 'total' => $sighting->getTotal());
          if($sighting->getTotal() > $max){
            $max = $sighting->getTotal();
          }
        }
        else{
          $dados[$sighting->getSpecie()->getCode()][] = array('data' => $data , 'total' => 1);
        }
        
      }
    }
    
    foreach($colors as $x => $color){
      if(isset($dados[$x])){
        $chco .= $color .',';
        $chdl .= $x.'|';
        $chds .= '0,'.$max.',';
        //$chd .= $dados[$x].'|';
        $dt1 = '';
        $dt2 = '';
        foreach($dados[$x] as $d){
          $dt1 .= date('z',strtotime($d['data'])).',';
          $dt2 .= $d['total'].',';
        }
        $chd .= substr($dt1,0,-1).'|'.substr($dt2,0,-1).'|';
      }
    }
    
    $chco = substr($chco,0,-1);
    $chdl = substr($chdl,0,-1);
    $chds = substr($chds,0,-1);
    $chd = substr($chd,0,-1);
    
    $this->dades = $dados;
    
    $this->url = 'http://chart.apis.google.com/chart'.
      //'?chxl=1:|+'.
      '?chxr=0,0,'.$max.'|1,'.$minimo.','.$maximo.
      '&chxt=y,x'.
      '&chs=500x300'.
      '&cht=lxy'.
      '&chco='.$chco.
      '&chds='.$chds.
      '&chd=t:'.$chd.
      '&chdl='.$chdl.
      '&chdlp=b'.
      '&chls=1|1|1|1'.
      '&chma=5,5,5,25'.
      '&chtt=Gráfico+Temporal';
  }
  
}
