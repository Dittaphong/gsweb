<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debuger {

  public function prevalue($value)
  {
    echo "<pre>";
    print_r($value);
    exit();
  }
  public function NullObj($e)
  {
    isset($e) ? $e : $e = '';
    echo $e;
  }
  public function exam_result($e)
  {
    if ($e=='0') {
      echo "ไม่ผ่าน";
    } elseif ($e=='1') {
      echo "ผ่าน แบบมีเงื่อนไข";
    } elseif ($e=='2') {
      echo "ผ่าน ดี";
    } elseif ($e=='3') {
      echo "ผ่าน ดีมาก";
    } elseif ($e=="") {
      echo "รอผลสอบ";
    } else {
      echo "รอผลสอบ";
    }
  }
  public function DocName($ExamType, $StudentType)
  {
    if ($StudentType>=80 && $StudentType<=89) {
      $DocName['QECE'] = "สอบวัดความรู้";
    } else {
      $DocName['QECE'] = "สอบวัดคุณสมบัติ";
    }
    if ($StudentType==82) {
        $DocName['StudentTypeName'] = "การค้นคว้าอิสระ";
        $DocName['PROP'] = "สอบเค้าโครงการค้นคว้าอิสระ";
        $DocName['THES'] = "สอบการค้นคว้าอิสระ";
    } else {
        $DocName['StudentTypeName'] = "วิทยานิพนธ์";
        $DocName['PROP'] = "สอบเค้าโครงวิทยานิพนธ์";
        $DocName['THES'] = "สอบวิทยานิพนธ์";
    }
if (isset($ExamType)) {
  if ($ExamType=="QECE") {
      if ($StudentType>=80 && $StudentType<=89) {
        $DocName['NamePage'] = "คำร้องขอสอบวัดความรู้";
      } else {
        $DocName['NamePage'] = "คำร้องขอสอบวัดคุณสมบัติ";
      }
    } else {
      if ($StudentType==82) {
        if ($ExamType=="ADVI") {
          $DocName['NamePage'] = "คำร้องขอที่ปรึกษาการค้นคว้าอิสระ";
        } elseif ($ExamType=="PROP") {
          $DocName['NamePage'] = "คำร้องขอสอบเค้าโครงการค้นคว้าอิสระ";
        } elseif ($ExamType=="THES") {
          $DocName['NamePage'] = "คำร้องขอสอบการค้นคว้าอิสระ";
        }
      } else {
        if ($ExamType=="ADVI") {
          $DocName['NamePage'] = "คำร้องขอที่ปรึกษาวิทยานิพนธ์";
        } elseif ($ExamType=="PROP") {
          $DocName['NamePage'] = "คำร้องขอสอบเค้าโครงวิทยานิพนธ์";
        } elseif ($ExamType=="THES") {
          $DocName['NamePage'] = "คำร้องขอสอบวิทยานิพนธ์";
        }
      }
    }

    return $DocName;
  }
}
  public function DateThai($strDate)
  {
    // 2008-08-14 13:42:44
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
  }
  public function YearThai($strDate)
  {
    // 2008-08-14 13:42:44
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strYear";
  }
  public function FullDateThai($strDate)
  {
    // 2008-08-14 13:42:44
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $strMonthThai=$strMonthCut[$strMonth];
    // return "วันที่ $strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
    return "วันที่ $strDay $strMonthThai $strYear";
  }

  public function inputDateThai($strDate, $inputName)
  {
    $thDate = $this->DateThai($strDate);
    echo "<p>".$thDate."</p>";
    echo "<input class='form-control' type='hidden' name='".$inputName."' value='".$strDate."' >";
  }
  public function inputFullDateThai($strDate, $inputName)
  {
    $thDate = $this->FullDateThai($strDate);
    echo "<p>".$thDate."</p>";
    echo "<input class='form-control' type='datetime' name='".$inputName."' value='".$strDate."' >";
  }
  public function diff_date_edit($date){
	$startTimeStamp = new DateTime($date);//+60
	$endTimeStamp = $startTimeStamp->modify('+60 day');
	$nowTimeStamp = new DateTime('now');

	$timeDiff = date_diff($nowTimeStamp, $endTimeStamp);

	$numberDays = $timeDiff->format('%a');
	$numberDays2 = $timeDiff->format('%a');
	if($numberDays<0)
	{
		echo "<script>$('.btn-edit').hide();</script>";
	}
	elseif ($numberDays=0)
	{
		echo "วันสุดท้าย";
	}
	else
	{
		echo $numberDays2." วัน";
	}
  }

} /* End of file Someclass.php */
