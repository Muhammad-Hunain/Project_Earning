<?php
$row = [];
$code = "";
$img = "";

// $_FILES['img']['name']='noimage.jpg';
// if(isset($_FILES['img']['name'])){
// function chang(){

// }
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="favicon.png" rel="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css" />

    <style>
        /*Blue Circle  */

        .cus {
            width: 90%;
            /* margin: 0 auto; */
            margin-top: 70px;
        }

        .main-circle {
            position: relative;
            border-radius: 100%
        }

        .circle {
            overflow: hidden;
            width: 280px;
            height: 280px;
            border-radius: 100%;
            position: relative;
            border: 15px solid #006A9C;
            /* margin-top: 60px; */
        }

        .bottom-info {

            width: 100%;
            height: 200px;
            background: #000;
            position: absolute;
            bottom: -118px;
        }

        .bottom-top-info {
            width: 43%;
            height: 50px;
            background: #000;
            position: absolute;
            bottom: 60px;
            border-top-right-radius: 20px;
        }

        /*  */

        .card-2 {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 280px;
            min-height: 280px;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
            /* margin-left: 80px; */
            border-radius: 50% !important;
            background: #1e2329 !important;
            box-shadow: 11px 11px 29px #14171b,
                -11px -11px 29px #292f37 !important;
            ;
            border-width: 100px;
            border-width: 20px;
            border-color: #5981ff;
            border-bottom-width: 100px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-color: #000;

        }

        .card-3 {
            position: relative;
            display: flex;
            /* flex-direction: row; */
            justify-content: center;
            align-items: center;
            min-width: 280px;
            min-height: 280px;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
            /* margin-left: 120px; */
            border-radius: 50% !important;
            background: #1e2329 !important;
            box-shadow: 11px 11px 29px #14171b,
                -11px -11px 29px #292f37 !important;
                
        }

        .data {
            color: #fff !important;
            font-size: 25px;
            font-weight: 800;
           
    left: 106px;
            
            top: 40px;
        }

        .data-1 {
            font-size: 20px;
            left: 10px;
            color: #fff
        }

        .data-2 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 45px;
            font-weight: 800;
            position: absolute;
            color: #fff;
            left: 100px;
             top: 89px;
        }

        .data-3 {
            position: absolute;
            color: #fff;
            bottom: 0px;
            left: 100px;
            text-align: center;
        }
       

        @media(max-width:768px) {
            .card-3 {
                margin-left: 0px;
            }

        }
    
        @media(max-width:576px) {
            .slider-1{
            margin-left: 130px;
        }     

        }

    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar bg-dark ">
                <div class="container-fluid">
                    <a class="navbar-brand logo">
                        <img src="./assests/images/favicon.png" class="img-fluid" alt="">
                        <span>Punycode</span>
                    </a>
                    <form class="d-flex">
                        <a class="btn butn " type="submit">Home</a>
                        <a class="btn butn ms-2" type="submit">Punycode Converter</a>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <?php

    ?>
    <?php

error_reporting(0);
    if(isset($_POST['submit'])){
    if(empty($_POST["code"]) && empty($_POST["img"])) {
        echo"<h1 style='color:#fff'>Enter the Code & image</h1>";
    }
    else{
        $code = $_POST["code"];
        $img = $_FILES['img']['name'];
    }
}

    $conn = mysqli_connect('localhost', 'root', '', 'sampledata') or die("Connection Failed");
    $q = "SELECT * FROM `punnycode` WHERE PunyCode='{$code}'";
    $result = mysqli_query($conn, $q) or die("query failed");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo $_POST['img'];
        if (isset($_FILES['img'])) {
            // echo'<pre>';
            // print_r($_FILES);
            // echo'</pre>';

            $filename = $_FILES['img']['name'];
            $temp_name = $_FILES['img']['tmp_name'];
            $type = $_FILES['img']['type'];

            $data = move_uploaded_file($temp_name, "assests/" . $filename);
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
    <?php
        }
    }
    ?>

    <div class="container card bg-dark m-auto ">
        <div class="row m-auto">
            <div class="col-md-12 col-sm-12 my-5 card-1" id="canvas">
                <div class="col-md-12 m-auto  col-sm-8">
                    <h1 class="text-center fs-3 my-5" style="color:#5981ff;"> Enter PunnyCode <br> & Image </h1>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                        <input class="form-control form-control-lg mt-5 ms-2" name="code" type="text" placeholder="Enter Punycode ">
                        <input class="form-control form-control-lg my-4 ms-2" name="img" type="file" placeholder="Enter Punycode ">
                        <input class="btn butn ms-2 mb-5" name='submit' type="submit">Submit</input>
                    </form>
                </div>
            </div>
        </div>
        <?php


        ?>
        
        <div class="row cus d-flex justify-content-center align-items-center ">
        <div class="col-11 col-sm-12 col-md-8 main-circle">
            <div class="circle ms-5 ">          
                    <img id="imgPunny" src="assests/<?php echo empty($img) ? 'user.jpg' :  $img;?>" style="width:250px;height:250px; border-radius:50%; overflow:hidden " alt="Nothing">
                    <div class="bottom-top-info">                       
                        <span class=" col-4 data-1"><?php echo $row['Year'] ?></span>
                    </div>
                    <div class="bottom-info">
                        <span class=" col-4 data"><?php echo $row['DisplayPunycode'] ?></span>
                    </div>
                </div>
        </div>
      
       <div class="col-md-2 col-sm-12 mt-5 slider-1">
       <span class="mt-5" style="color: #fff;">Scale<br></span>       <input type="range" min="1" max="10" step="1" value="10" onchange="scale(this.value)" class="slider " id="myRange scale">
       <span class="mt-5"style="color: #fff;"><br>X-Axis<br></span>   <input type="range" min="-400" max="400" step="1" value="0" class="slider  " onchange="width1(this.value)"  id="myRange width">
       <span class="mt-5" style="color: #fff;"><br>Y-Axis<br></span>  <input type="range" min="-400" max="400" step="1"  value="0" class="slider " onchange="height1(this.value)"  id="myRange height">
       <span  class="mt-5" style="color: #fff;"><br>Rotate<br></span> <input type="range" min="1" max="360" step="1" value="0" class="slider" onchange="rotate(this.value)" id="myRange rotate">
        </div>

            <div class="col-md-12 mt-5 col-sm-8 d-flex justify-content-center ">
                <div class="col-md-4  card-parent ms-5">DisplayPunycode
                    <p class="card-3 ">
                            <span class=" col-4 px-4 py-2 my-1 data-2 "><?php echo $row['DisplayPunycode'] ?></span>
                            <span class=" col-4 px-4 py-2 my-1 data-3 "><?php echo $row['Year'] ?></span>
                    </p>
                </div>
            </div>
  
        </div>
    </div>
</div>
</body>

<script>
    
    function width1(e){ 
            console.log(e)
            //  document.getElementById('imgPunny').style.width=e+"px"
            document.getElementById('imgPunny').style.marginLeft = e+"px";
        }
    function height1(e){
        document.getElementById('imgPunny').style.marginTop = e +"px";
    }

    function scale(e){
        document.getElementById('imgPunny').style.transform = "scale("+e+")";
    }

    function rotate(e){
        document.getElementById('imgPunny').style.transform = "rotate("+e+"deg)";

    }

    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    canvas.width = 500;
    canvas.height = 500;

    var rawImage;
    var svgImage;

    var h = canvas.height;
    var w = canvas.width;
    var aspect = 1;
    var rotation = 0;


</script>


</html>