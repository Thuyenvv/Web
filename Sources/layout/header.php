<?php 
    session_start();
    function HeaderTemplate($title)
    {
        echo '<!DOCTYPE html>
            <html lang="vi">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
                    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
                    <link rel="stylesheet" href="../../css/style.css">
                    <title>' . $title .'</title>
                </head>
            <body>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1447514961951882&autoLogAppEvents=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, "script", "facebook-jssdk"));</script>
        ';
    }
?>