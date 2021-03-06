<?php
include('config.inc.php');
include('parser.inc.php');
include('builder.inc.php');

$list = get_template_list();
foreach ($list as $key => $value)
  $select_list_options .= "<option value=\"$key\">$value[1]</option>\n            ";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Builder</title>

    <!-- Bootstrap core CSS -->
    <link href="https://www.runstorageapis.com/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.runstorageapis.com/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <h2>Site Builder</h2>
        <p>Please select a title, description &amp; theme. With this information and a markdown file with the site's content, Site Builder will create a static one-page website.</p>
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form enctype="multipart/form-data" action="compile" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- Here we use 2097152 Byte (2M), but this can be change without any issues -->
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
            <!-- Select Website Title and Description -->
            <input class="form-control" type="text" name="title" placeholder="Website Title" /> <br /> <br />
            <input class="form-control" type="text" name="description" placeholder="Website Description" /> <br /> <br />
            <!-- Select one of the Styles available -->
            <div class="form-group">
              <select class="form-control" name="style">

                <?=$select_list_options;?>
              </select>
            </div><br />
            <!-- Name of input element determines name in $_FILES array -->
            <input name="userfile" type="file" class="form-control" /> <br /> <br />
            <input type="submit" class="btn btn-success" value="Create" />
        </form>
    </div>
  </body>
</html>
