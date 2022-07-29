<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    include('../config/config.php');
    require('../../carbon/autoload.php');
    
    if(isset($_POST['thoigian'])){
        $thoigian = $_POST['thoigian'];
    }else{
        $thoigian="";
        $subdays=Carbon::now('Asia/Ho_chi_Minh')->subdays(365)->toDateString();
    }

    if($thoigian=='7ngay'){
        $subdays=Carbon::now('Asia/Ho_chi_Minh')->subdays(7)->toDateString();
    }else if($thoigian=='28ngay'){
        $subdays=Carbon::now('Asia/Ho_chi_Minh')->subdays(28)->toDateString();
    }else if($thoigian=='90ngay'){
        $subdays=Carbon::now('Asia/Ho_chi_Minh')->subdays(90)->toDateString();
    }else if($thoigian=='365ngay'){
        $subdays=Carbon::now('Asia/Ho_chi_Minh')->subdays(365)->toDateString();
    }

    $now=Carbon::now('Asia/Ho_chi_Minh')->toDateString();

    //$sql_select="SELECT * FROM tbl_giohang WHERE ngay";

    $sql="SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
    $query=mysqli_query($mysqli,$sql);
    while($val=mysqli_fetch_array($query)){
        $chart_data[]=array(
            'date'=>$val['ngaydat'],
            'order'=>$val['donhang'],
            'sales'=>$val['doanhthu'],
            'quantity'=>$val['soluongban']
        );
    }

    echo $data=json_encode($chart_data);

?>