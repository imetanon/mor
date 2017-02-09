<!doctype html>
<html class="no-js" lang="<?php echo $lang; ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $site_title; ?></title>
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="keywords" content="<?php echo $site_keywords; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $meta_tag; ?>
<?php echo $styles; ?>
<!-- JS -->
<?php echo $scripts_header; ?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Message of Right
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url(''); ?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo site_url('/application'); ?>">Application</a>
                </li>
                <li>
                    <a href="<?php echo site_url('/sms-template'); ?>">SMS-Template</a>
                </li>
                <li>
                    <a href="<?php echo site_url('/workflow'); ?>">Workflow</a>
                </li>
                <li>
                    <a href="<?php echo site_url(''); ?>">Logs</a>
                </li>
                <li>
                    <a href="<?php echo site_url('/sms-form'); ?>">SMS Form</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php echo $content; ?>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php echo $scripts_footer; ?>
</body>
</html>
