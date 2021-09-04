
<!--
    $pg is a site global variable, it is required here to designate 
    the current page as active_navtab 
    It is set in the top of main portion of each pages php section

    This file is included into other pages via a php include call

 -->

    <nav class="navbar monospace-font">
      <?php 
        //unset($pg); // tester
        $active = "active_navtab";
        if(!isset($pg)) { 
            $pg = "Home";
            $active = "broken_active_navtab";
        }
      ?>
      <a <?php if(strtolower($pg) =="home"){ echo "class='$active'";}  echo " href= ${sroot}/index.php"; ?> >Home</a> 
      <a <?php if(strtolower($pg) =="workshop"){ echo "class='$active'";}  echo " href= ${pages}/workshop.php"; ?> >Workshop</a>
      <a <?php if(strtolower($pg) =="resume"){ echo "class='$active'";}  echo " href= ${pages}/resume.php"; ?> >Resume</a>
      <a <?php if(strtolower($pg) =="network"){ echo "class='$active'";}  echo " href= ${pages}/network.php"; ?> >Network</a> 
      <a <?php if(strtolower($pg) =="devel"){ echo "class='$active'";}  echo " href= ${pages}/devel.php"; ?> >Development</a>
      <a <?php if(strtolower($pg) =="contact"){ echo "class='$active'";}  echo " href= ${pages}/contact.php"; ?> >Contact</a>  
      <a <?php if(strtolower($pg) =="members"){ echo "class='$active'";}  echo " href= ${pages}/members.php"; ?> >Members</a> 
    </nav>
      
