<?php  
    date_default_timezone_set("Asia/Dhaka");
    echo date("d/m/y h:i:s a -D")."<br>";
    echo date("d/M/Y H:i:s A -l")."<br>";
    echo date("d/F/Y H:i:s A -l")."<br>";

    // mktime(hour, minute, second, month, day, year)
    $date = mktime(12, 30, 30, 12, 30, 2021);
    echo date("d/m/Y h:i:s a -l", $date)."<br>";

    // strtotime()
    $date = strtotime("+5 years +4 months +3 weeks +2 days +1 hours");
    echo date("d/F/Y h:i:s a -l", $date)."<br>";

    // datetime class
    $date = new DateTime();
    $myDOB = new DateTime("1987-09-10");
    $myAge = $date->diff($myDOB);
    echo "My age is: ".$myAge->y." years ".$myAge->m." months ".$myAge->d." days<br>";

    // file upload
    if(isset($_POST['up123'])){
        $fileName = $_FILES['file']['name'];
        $tmpFileName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileExtenSion = pathinfo($fileName, PATHINFO_EXTENSION);
        $approvedExtension = ['jpg', 'jpeg', 'png', 'gif'];
        $newFileName = uniqid("IMG_", true).substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 6).time().rand(1000, 9999).".".$fileExtenSion;
        $destination = "uploads/".$newFileName;

        if(empty($fileName)){
            $err = "Please select a file";
        }elseif(!in_array($fileExtenSion, $approvedExtension)){
            $err = "Invalid file format";
        }else{
            $imageSize = getimagesize($tmpFileName);
            if($imageSize === false){
                $err = "This is not an image file";
            }elseif($imageSize[0] < 400 || $imageSize[1] < 400){
                $err = "Image size is too small";
            }elseif($fileSize > 1000000){
                $err = "File size must be less than 1MB";
            }else{
                $move = move_uploaded_file($tmpFileName, $destination);
                if($move){
                    $success = "File uploaded successfully";
                }else{
                    $err = "File upload failed";
                }
            }
        }
    }
?>
<hr>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload" name="up123">
    <div style="color: <?= isset($err) ? 'red':(isset($success) ? 'green':null) ?>">
        <?= $err ?? $success ?? null ?>
    </div>
</form>
