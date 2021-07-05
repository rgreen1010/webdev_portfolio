
<!--
    $pg is a site global variable, it is required here to designate the current page as active 
    It is set in the top of main portion of each pages php section

    This file is included into other pages via a php include call

 -->

    <div class="navbar">
      <a <?php if($pg =="Home"){ echo "class='active'";}  echo " href= ${sroot}/index.php"; ?> >Home</a> 
      <a <?php if($pg =="Workshop"){ echo "class='active'";}  echo " href= ${pages}/workshop.php"; ?> >Workshop</a>
      <a <?php if($pg =="Resume"){ echo "class='active'";}  echo " href= ${pages}/resume.php"; ?> >Resume</a>
      <a <?php if($pg =="Network"){ echo "class='active'";}  echo " href= ${pages}/network.php"; ?> >Network</a> 
      <a <?php if($pg =="Devel"){ echo "class='active'";}  echo " href= ${pages}/devel.php"; ?> >Development</a>
      <a <?php if($pg =="Contact"){ echo "class='active'";}  echo " href= ${pages}/contact.php"; ?> >Contact</a>  
      <a <?php if($pg =="Members"){ echo "class='active'";}  echo " href= ${pages}/members.php"; ?> >Members</a> 
    </div>
      
