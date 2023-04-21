<?php 
require_once('auth.php');
?>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= validate_image($_settings->info('logo')) ?>">

    <title><?= ucwords(str_replace("_"," ",$page)) ?> | <?= $_settings->info('name') ?></title>



    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <script src="<?= base_url ?>assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <link id="pagestyle" href="<?= base_url ?>assets/css/material-kit.css?v=3.0.2" rel="stylesheet" />
    <link id="pagestyle" href="<?= base_url ?>assets/summernote/summernote-lite.min.css" rel="stylesheet" />
    <link id="pagestyle" href="<?= base_url ?>assets/css/custom.css" rel="stylesheet" />

    <script>
            var loader = $('<div id="pre-loader">')
            loader.html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')
            function start_loader(){
                $('body').find('#pre-loader').remove()
                $('body').prepend(loader)
            }
            function end_loader(){
                $('body').find('#pre-loader').remove()
            }
            $(function(){
                setTimeout(() => {
                    end_loader()
                }, 500);
            })
    </script>

</head>