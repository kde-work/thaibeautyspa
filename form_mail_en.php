<div >
    <?php
    $surname= $_POST['field_1'];
    $name = $_POST['field_2'];
    $date_user= $_POST['field_3'];
    $facebook= $_POST['field_4'];
    $to = 'info@tbs-spa.ru';
    $subject_text = "(en)Форма с сайта";
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
    $message = '<br>first name:' . $surname . '<br>second name' . $name . '<br>Email:' . $date_user . '<br> Telephone number:' . $facebook ;
    $multipart .= $message;
    $multipart .= "$EOL--$boundary--$EOL";
    if(!mail($to, $subject, $multipart, $headers)){
        echo 'Письмо не отправлено';
    }
    else{ ?>
        <script>window.location.replace('/en');</script>
    <?php }

    ?>
</div>