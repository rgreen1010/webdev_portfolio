

    
<?php 
  /*
   *  $pageId is a site global variable, it is required here to designate 
   *   the current page as active_navtab 
   *
   *   It is set in the top of main portion of each pages php section
   *
   *   This file is included into other pages via a php include call
   *
   */

  //unset($pageId); // tester
  $active = "active_navtab";
  /*
   * $pageId being set means a system failure somewhere. Set the pointer
   *      and make the background pop visually, but allow
   *      the user to continue/recover if possible
   */
  if(!isset($pageId)) { 
      $pageId = "Home";
      $active = "broken_active_navtab";
  }

  //var_dump("NAV ==>  pageId: ", $pageId);

  echo '<nav class="navbar monospace-font">';
  
  $pageList = array("Home", "Workshop", "Resume", "Network", "Devel", "Members", "Contact", "About");
  $activeTab = strtolower($pageId);
  foreach ($pageList as $page) {
    echo "<a ";

    if($page == $pageId) {
        echo 'class="' . $active . '"';
    }

    $fixedPage = strtolower($page);
    switch ($fixedPage) { // special cases
        case "home":
          echo " href= ${sroot}/index.php ";
          break;

        case "resume":
        case "devel":
        case "network":
        case "members":  // test
          echo " href= ${pages}/$fixedPage-f.php ";
          break;

        default:
          echo " href= ${pages}/$fixedPage.php ";
          break;
      
    }

    echo " > " . $page . "</a>\n";
  } 


  echo "</nav> \n";   

?>   
    
