@extends('menu.main')

@section('content')
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>

    <section class="workTimeForm">
        <div class="container">
            <form action="" method="post">
                @csrf
                <label>対象年</label><br>
                <select name="year">
                    <option hidden>選択してください</option>
                    <?php
                    for ($year = 2000; $year <= 2022; $year++) {
                        echo ('<option value="' . $year . '">' . $year . '</option>');
                    }
                    ?>
                </select><br>
                <label>対象月</label><br>
                <select name="month">
                    <option hidden>選択してください</option>
                    <?php
                    for ($month = 1; $month <= 12; $month++) {
                        echo ('<option value="' . $month . '">' . $month . '</option>');
                    }
                    ?>
                </select><br>
                <label>社員CD</label><br>
                <input type="text" name="empCd"><br>
                <input class="btn" name="add" type="submit" value="送信">
            </form>
        </div>
    </section>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $procCd = 'SW';
        $logCd = '100';
        $empCd = $_POST['empCd'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        // $empCd ='1';
        // $year = '1';
        // $month ='1';
        $totalString = '"' . $procCd . "," . $logCd . "," . $empCd . "," . $year . "," . $month . '"';

        // $command = "WorkTmConV4 " . $totalString;
        // $command = "C:\\xampp\\htdocs\\WorkTmCon\\test";
        $command = ".\\WorkTmCon\WorkTmCon " . $totalString;
        exec($command, $output, $result_code); 
        print_r( $totalString );
        print_r( $output );
        // dd($year);
        if($result_code === 0){
            echo '疎通成功';
            echo "Error_Code : ". $result_code;
        }else{
            echo '疎通失敗';
            echo "Error_Code : ". $result_code;
        }      
    }
    ?>

</body>

</html>
@endsection