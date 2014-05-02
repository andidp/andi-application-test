<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Andi Application Test | backend</title>
    <base href="{$config.base_url}" />
    <link rel="stylesheet" href="asset/backend_skins/stylesheets/base.css" type="text/css" media="screen" />
    <!--
        You can change the admin theme by changing the 'default' directory in the path below
    -->
    <link rel="stylesheet" href="asset/backend_skins/stylesheets/themes/default/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/backend_skins/stylesheets/override.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/editor/CLEditor/jquery.CLEditor.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="asset/jquery-ui/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" />

    <script type="text/javascript" src="asset/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="asset/editor/CLEditor/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="asset/editor/CLEditor/jquery.cleditor.extimage.js"></script>
    <script type="text/javascript" src="asset/jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="asset/js/main.js"></script>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><a href="dashboard">Andi Application Test</a></h1>
            <div id="main-navigation">
                <ul class="wat-cf">
                    <li><a href="dashboard">Frontend site</a></li>
                </ul>
            </div>
        </div>

        <div id="wrapper" class="wat-cf">
            <div id="main">

                {include file="$template.tpl"}

                <div id="footer">
                    <div class="block">
                        <p>&copy;Company</p>
                    </div>
                </div>
            </div>

        </div><!-- wrapper -->

    </div><!-- container -->
</body>
</html>