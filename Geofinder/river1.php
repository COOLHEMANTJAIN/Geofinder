<?php
$host= "localhost";
   $dbname= "postgres";
     $user = 'postgres';
    $password = 'hemant';

//echo "hello";
$db = pg_connect( "host=$host dbname=$dbname user=$user password=$password	"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
    // echo "Opened database successfully\n";
   }
//$name='639';
//$riv='SIPRA';
    $riv = $_GET['Name'];
  //  echo $name  ;
$x="select  st_astext(geom) from ind_water_lines_dcw  where  nam='$riv'";
$y="select st_npoints(geom) from ind_water_lines_dcw where nam='$riv'";
$z=" select count(gid) from ind_water_lines_dcw where nam='$riv'";
//echo $x;
//echo $y;
 $queryz = pg_query($db,$z) ;
if (!$queryz) {
  echo "An error occurred";}

    if(pg_num_rows($queryz)>0)
    {
	$resultz = pg_fetch_array($queryz);
       // echo "<br/> LATITUDE : $resultz[0]   ";
      
    }	


    $query = pg_query($db,$x) ;
     //echo $x;	
$queryy = pg_query($db,$y) ;
     //echo $y;	
if (!$query) {}
  //echo "An error occurred";}
$i='0';
while ($data[$i] = pg_fetch_array($query)) {
 //echo $data[$i][0] ;//$i++;
//echo $i;
   $abc[$i]=$data[$i][0];
   //echo $abc[$i];
$i=$i+1;
}
    
if (!$queryy) {
  echo "An error occurred";}
$i='0';
while ($data2[$i] = pg_fetch_array($queryy)) {
    //echo $data2[$i][0] ;$i++;echo $i;
    $xyz[$i]=$data2[$i][0];
        
	//echo $xyz[$i];
//echo "<br/>";echo"$i";echo "<br/>";
 $i=$i+1;
}
    
   
for($j=0;$j<$resultz[0];$j=$j+1)
{
$num=$xyz[$j];
//echo $num;
//echo $xyz[$j];
//echo $j;
//echo "<br/>";
$num=$num-1;
//echo $num;
$datanew = explode(",",$abc[$j]);//echo "<br />hi     ";
//echo $datanew[0];
$i=1;
for($i=1;$i<$num;$i=$i+1)
{ //echo $i	;echo "hello    ";
//echo  $datanew[$i];
$next[$j][$i]=explode(" ",$datanew[$i]);
//echo $next[$j][$i][0];echo " <br/>   ";   
//echo $next[$j][$i][1];echo "<br/>";
}

}
//$i=0;

//$data = explode(",",$result[0]);
//echo $data[1];
//$new



  //  else if(array_key_exists('name',$_GET))
    //    echo "no match found" ;
     //echo "$result[0]"; 
?>


<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
//var x=new google.maps.LatLng(<?php echo $next[1][1];?>, <?php echo $next[1][0];?>);
//var stavanger=new google.maps.LatLng(<?php echo $next[2][1];?>, <?php echo $next[2][0];?>);
//var amsterdam=new google.maps.LatLng(<?php echo $next[3][1];?>, <?php echo $next[3][0];?>);
//var london=new google.maps.LatLng(<?php echo $next[$num-1][1];?>, <?php echo $next[$num-1][0];?>);
//var n ="<?php echo $num;?>";document.write(n);var flightPlanCoordinates=new Array();
//for (var i = 0; i < n-1; i++)
  //{  document.write("hello");}//flightPlanCoordinates[i]=new google.maps.LatLng("<?php echo $next[i+1][1];?>", "<?php echo $next[i+1][0];?>");
//document.write("<?php echo "hi";?>"); //	<?php echo $next[i+1][1];?>, <?php echo $next[i+1][0];?>	<?php $i=$i+1;?>			}
  var y= <?php echo json_encode($next); ?>;
  var a="<?php echo $resultz[0];?>";document.write(a);
//document.write(y[1][0]);
var n =<?php echo json_encode($xyz	); ?>;document.write(n);var flightPlanCoordinates=new Array();

for (var j = 0; j < a; j++)
{
flightPlanCoordinates[j] = new Array();
for (var i = 1; i < n[j]-1; i++)
  {  


flightPlanCoordinates[j][i-1]=new google.maps.LatLng( y[j][i][1],y[j][i][0]);
}
}
   
function initialize()
{
var mapProp = {
  center:flightPlanCoordinates[0][0],
  zoom:6,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
for (var j = 0; j < a; j++)
{//var myTrip=[x,stavanger];
var flightPath=new google.maps.Polyline({
  path:flightPlanCoordinates[j],
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2
  });

flightPath.setMap(map);
}
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
</body>
</html>


















<!DOCTYPE html>
<html lang="en">
<head>
<title>Spatial Database - DBMS Project</title>
<meta charset="UTF-8">
<!--Style Sheet-->
<link rel="stylesheet" type="text/css" href="css/flexslider.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/sequence.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
<!--Special Styles-->
<link rel="stylesheet" type="text/css" href="css/style.css" title="default" media="screen">
<link rel="alternate stylesheet" type="text/css" href="css/elegant.css" title="elegant" media="screen">
<link rel="alternate stylesheet" type="text/css" href="css/modern.css" title="modern" media="screen">
<link rel="alternate stylesheet" type="text/css" href="css/colorfull.css" title="colorfull" media="screen">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="css/responsitive.css" media="all">
<!--Google fonts-->
<link href='http://fonts.googleapis.com/css?family=Russo+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<!--Javascript-->
<script src="js/jquery-1.7.2.min.js"></script>
<!--[if lt IE9]>
<script src="js/html5.js"></script>
<script src="js/IE7.js"></script>
<![endif]-->
<!-- Load jQuery library -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<!-- Load custom js -->

	<Script type="text/javascript">
		$(document).ready(function(){

			$("#contactName").keyup(function(){
				
				var value = $("#contactName").val();
				
				$.ajax({
					type:"POST",
					url:"search2.php",
					data:"query="+value,
					success: function(result){

						console.log(result);
						$("#results").html(result);
					}
				});
			});
		});
	</script>
>
</head>
<body>
<header class="dark">
  <nav>
    <div id="logo">
      <h1><a href="index.html">Project</h1>
    </div>
    <div id="menu">
      <ul>   <li>  <a href="city.php" >City Citing</a> <a href="dist1.php">City path</a> <a href="rail2.php">Railway</a> <a href="river1.php">River</a> <a href="road.php">Roads</a><a href="state.php">State</a> </li>
      </ul>
    </div>
  </nav>
</header>
<!--<div id="switcher"> <a class="switch-button open"></a>
  <div class="content">
    <ul class="headercolor">
      <span>Header color</span>
      <li class="red"><a href="#light">Light</a></li>
      <li class="blue"><a href="#dark">Dark</a></li>
    </ul>
    <ul class="theme">
      <span>Theme</span>
      <li><a href="#" rel="default" class="styleswitch">default</a></li>
      <li><a href="#" rel="elegant" class="styleswitch">elegant</a></li>
      <li><a href="#" rel="modern" class="styleswitch">modern</a></li>
      <li><a href="#" rel="colorfull" class="styleswitch">colorfull</a></li>
    </ul>
  </div>
</div>-->
<section id="contact" class="container dark second">
  <div class="content">
    <div class="title icon-phone">
      <h1>River <span>Map the flow </span></h1>
       </div>
    <div class="full">
      <div id="contact-form">
        <form id="contact-us" action="river1.php" >
          <div class="column-half">
            <div class="formblock" class="UPPERCASE">
              <input type="text" name="Name" id="contactName" value="" class="txt requiredField" autocomplete="off" placeholder="Name:">
            </div>
            
            <div id="results">
		</div>
           
            <button name="submit" type="submit" class="subbutton" value="submit"></button>
<br /><br /><br /><br /><br />
      
          </div>
          <div class="column-half last">
         
            <p>When we enter River Name and Tributary Id, they together from a Search key which used to map the latitudes and longitudes which are sent to google maps API and it then displays the flow of the river . 
</p>
          </div>

<div id="googleMap" style="width:500px;height:380px;"></div>
        </form>
      </div>
    </div>
  </div>
</section>
<footer>
  <section class="footer">
</footer>
<!--Javascript-->

<script src="js/jquery.flexslider-min.js"></script>
<script src="js/sequence.jquery-min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/quicksand.js"></script>
<script src="js/jquery.masonery.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/gmaps.js"></script>
<script src="js/jquery.accordion.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/styleswitch.js"></script>
<script src="js/custom.js"></script>
<!--Sequence slider-->
<script>
var options = {
    autoPlay: true,
    nextButton: ".next",
    prevButton: ".prev",
    preloader: "#sequence-preloader",
    prependPreloader: false,
    prependPreloadingComplete: "#sequence-preloader, #slideshow",
    animateStartingFrameIn: true,
    transitionThreshold: 500,
    nextButtonAlt: " ",
    prevButtonAlt: " ",
    afterPreload: function () {
        $(".prev, .next").fadeIn(500);
        if (!slideShow.transitionsSupported) {
            $("#slideshow").animate({
                "opacity": "1"
            }, 1000);
        }
    }
};
var slideShow = $("#slideshow").sequence(options).data("sequence");
if (!slideShow.transitionsSupported || slideShow.prefix == "-o-") {
    $("#slideshow").animate({
        "opacity": "1"
    }, 1000);
    slideShow.preloaderFallback();
}
</script>
<script>
new GMaps({
    div: '#map',
    lat: 44.79913,
    lng: 20.47662
});
</script>
<script>
if (typeof jQuery == 'undefined') {
    document.write(unescape("%3Cscript src='js/jquery.js'%3E%3C/script%3E"));
}
</script>
</body>
</html>





