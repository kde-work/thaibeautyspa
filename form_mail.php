<div style="display:none;">
    <?php

    $valid_types =  array("jpg", "png", "jpeg", "txt", "doc", "docx", "pdf");
    $surname= $_POST['thai_page__1'];
    $name = $_POST['thai_page__2'];
    $date_user= $_POST['thai_page__5'];
    $facebook= $_POST['thai_page__3'];
    $skype= $_POST['thai_page__4'];
    $to = 'melnikov@tbs-spa.ru';
    $subject_text = "(thai)Форма с сайта";
    $From = 'wordpress@thaibeautyspa.kutalo.com' ;
    $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
    $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.

    $subject= '=?utf-8?B?' . base64_encode($subject_text) . '?=';

    $headers    = "MIME-Version: 1.0;$EOL";
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";
    $headers   .= "From: $From\nReply-To: $From\n";

    $multipart  = "--$boundary$EOL";
    $multipart .= "Content-Type: text/html; charset=utf-8$EOL";
    $multipart .= "Content-Transfer-Encoding: base64$EOL";
    $multipart .= $EOL; // раздел между заголовками и телом html-части
    $multipart .= chunk_split(base64_encode($message));
    $message = '<br>Фамилия:' . $surname . '<br>Имя:' . $name . '<br>Дата рождения:' . $date_user . '<br> facebook:' . $facebook . '<br> Skype:' . $skype;
    $multipart .= $message;
    #начало вставки файлов

    foreach($_FILES as $key => $value){
        $filename = $value["tmp_name"];
        $NameFile = $value["name"];
        $file = fopen($filename, "rb");
        $data = fread($file,  filesize( $filename ) );
        fclose($file);
        // в этой переменной надо сформировать имя файла (без всякого пути);
        $File = $data;
        $multipart .=  "$EOL--$boundary$EOL";
        $multipart .= "Content-Type: application/octet-stream; name=\"$NameFile\"$EOL";
        $multipart .= "Content-Transfer-Encoding: base64$EOL";
        $multipart .= "Content-Disposition: attachment; filename=\"$NameFile\"$EOL";
        $multipart .= $EOL;
        $multipart .= chunk_split(base64_encode($File));



    }
    $multipart .= "$EOL--$boundary--$EOL";
    if(!mail($to, $subject, $multipart, $headers)){
        echo 'Письмо не отправлено';
    }
    else{ ?>
        <script>window.location.replace('/thai');</script>
    <?php }

    ?>
</div>