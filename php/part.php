<?php

if(isset($_POST) && !empty($_POST)) {
    //If Attachment
    if(!empty($_FILES['passport']['name'])) {
        //Store Variables
        $file_name = $_FILES['passport']['name'];
        $temp_name = $_FILES['passport']['tmp_name'];
        $file_type = $_FILES['passport']['type'];

        //Get Extension
        $base = basename($file_name);
        $extension = substr($base, strlen($base) - 4, strlen($base));

        //Allowed Extensions
        $allowed_extensions = array(".jpg", ".png", "jpeg");
        //Check Extension
        if(in_array($extension, $allowed_extensions)) {
            //Mail Essentials
            $from = $_POST['email'];
            $to = "itguru190@gmail.com";
            $subject = "New Exousia TV Partner";
            $message = "This is A Sample Message";

            //Things We Need
            $file = $temp_name;
            $content = chunk_split(base64_encode(file_get_contents($file)));
            $uid = md5(uniqid(time()));


            $header = "From: ". $from;
            $header .= "Reply-To: ".$to;
            $header .= "MIME-Version: 1.0";

            //Declare Multiple Parts
            $header .= "Content-Type: multipart/mixed; boundary=\"".$uid;
            $header .= "This is a multi-part message in MIME format.";

            //Plain Text Parts
            $header .= "__".$uid;
            $header .= "Content-type:text/plain; charset=iso-8859-1";
            $header .= "Content-Transfer-Encoding: 7bit";
            $header .= $message;

            //Attachment Part
            $header .= "__".$uid;
            $header .= "Content-Type: ".$file_type."; name=\"".$file_name;
            $header .= "Content-Disposition: attachment; filename=\"".$file_name;
            $header .= $content;

            if(mail($to, $subject, "", $header)) {
                echo "Success";
            } else {
                echo "Fail";
            }

        } else {
            echo "File type not allowed";
        }

    } else{
        echo "No file posted";
    }
}

?>