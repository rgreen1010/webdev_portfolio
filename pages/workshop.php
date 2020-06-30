
<?php
  $docroot=$_SERVER["DOCUMENT_ROOT"];
  $sroot="/site1";
  $scripts="$sroot/scripts";
  $css="$sroot/css";
  $pages="$sroot/pages";
  $images="$sroot/images";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!--
    <script type="text/javascript" src="scripts/graph.js"></script>
  -->

    <script type="text/javascript" src='<?php echo "$scripts/graph.js"; ?>' ></script>
    <script type="text/javascript">
      
    </script>


    <title>Draft Portfolio SITE1</title>

    <link rel="stylesheet" href='<?php echo "$css/site-main.css"; ?>' />
    <link rel="icon" href='<?php echo "$images/favicon.ico"; ?>' />

    <script src='<?php echo "$scripts/site-main.js"; ?>'> </script>

    <!--Empty style mostly for small element development styling ease -->
    <style type="text/css">
    
    </style>

  </head>

 <!-- Page content -->

  <body>

    <h1>Draft Portfolio Site 1</h1>

  <?php

    //$docroot=$_SERVER["DOCUMENT_ROOT"];
    $pg = "Workshop";
    //$nav_file = '/var/www/html/site1/pages/nav.php';
    $nav_file = "$docroot" . "/site1/pages/nav.php";
    @$stat = include $nav_file;
      if (! $stat ) {
      echo " <div class='navbar_error'>";
      echo "Server Error - $nav_file : file does not exist";
        echo "</div>";
        }
      
    ?>

        <div class="ph c1" id="chart_des">
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
    </div>
    <!--Div that will hold the pie chart-->
    <div class="c1" id="chart_div"></div>

    <div class="ph c1">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="ph c2">
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
  <div class="ph c1">
      <?php
        include "$docroot$sroot/tst_msg.php";
       ?>
    </div>

  <div class="ph c2">
      <?php
        include "$docroot$sroot/tst_mesg.html";
       ?>
    </div>

  </body>
</html>