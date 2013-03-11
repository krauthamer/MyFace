<?php
session_start();
	include("config.php");
	if(!isset($_SESSION['username'])){
    	header("Location: login.php");
	}
?>

	<!DOCTYPE html>
	<html>
	<head>
	<meta http-equiv="Cache-Control" content="max-age=0">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
	<meta http-equiv="Pragma" content="no-cache">
	<meta name="viewport" content="width=device-width" />
	<style type="text/css">

body {
	display:block;position:absolute;
	color:#3c3c3c;
	font-family: sans-serif;
	font-size:12px;
	background:#f5f5f5;
	width:320px;
	max-height: 498px;
}

h1 {
	font-size:0px;
	line-height: 0px;
	margin:0px 0px 0px 0px;
}
h2 {
	font-family: sans-serif;
	font-size:2px;
	line-height: 3px;
	margin:10px 10px 10px 10px;
}
a:link, a:visited {
	text-decoration: none;
	font-family: sans-serif;
	color:#3c3c3c;
	border: 2px solid #b3b3b3;
	border-radius: 15px;
	background: #fcfcfc;
	width:36px;
	height:16px;
	padding:5px 10px 5px 10px;
	margin:5px;
}
.no-touch a:hover, a:active {
	color:#3c3c3c;
	background:#92e8ff;
}
[id^="example9-"] {
	font-family: sans-serif;
	color:#3c3c3c;
	//background: #fcfcfc;
	//border: 2px solid #b3b3b3;
	border-radius: 50px;
	//
	text-decoration: none;
	width:450px;
	height:150px;
	padding:10px 0px 5px 15px;
	margin:10px;
	font-size:20px;
}
#example9-click-prev, #example9-click-next {
	text-decoration: none;
	display:block;
	position:relative;
	float:left;
	width:36px;
	height:16px;
	font-size:12px;
	padding:0px 0px 5px 10px;
	margin:5px;
}

[id^="example9-"] {
	display:block;
	position:absolute;
	width:75px;
	height:55px;
}

.no-touch [id^="example9-"]:hover, [id^="example9-"].active {
	background:#92e8ff;
}

/* scrolls */
#example9-click-scrollOut {
	color:#3c3c3c;
	background: #fcfcfc;
	
	top:244px;
	display:block;
	position:relative;
	float:left;
	width:370px;
	height:19px;
	background:#e2e2e2;
	margin:0px 10px;padding:0px;
	border:0px solid #3c3c3c;
}

#example9-click-scrollIn {
	color:#3c3c3c;
	border:2px solid #b3b3b3;
	background: #fcfcfc;
	display:block;
	position:absolute;
	width:60px;
	height:15px;
	background:#fcfcfc;
	margin:0px;padding:0px;
}
.no-touch #example9-click-scrollIn:hover, #example9-click-scrollIn.active {
	background:#92e8ff;
}

/* drags */
#example9-click-dragOut {
	border-radius:20px;
	overflow:hidden;
	float:left;
	width:490px;
	height:190px;
	left:0px;
	margin:0px;padding:0px;
	border:2px solid #e2e2e2;
}
#example9-click-dragIn {
	display:block;
	position:absolute;
	width:1200px;
	height:190px;
	margin:0px;padding:0px;
}
#example9-click-prev, #example9-click-next {
	top:210;
}
#mycounter {
	text-decoration: none;
	display:block;
	position:relative;
	float:left;
	font-size:12px;
	padding:5px 0px 5px 10px;
	margin:6px 0px;
}

#example9-click-dragOut {
	opacity:0;filter:alpha(opacity=0);border-radius:0px;
	width:520px;
	height:210px;
}
#example9-click-dragIn {
	opacity:0;filter:alpha(opacity=0);border-radius:0px;
	height:210px;
}

	</style>
	<link rel="stylesheet"  href="css/custom.css" />

	<script src="js/mg.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.transform.min.js" type="text/javascript"></script>
	<script src="js/jquery.bez.min.js" type="text/javascript"></script>
	<script src="js/jquery.mobile-1.2.0.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">



	<script type="text/javascript">
		// bezier animations
		var bez = $.bez([.19,1,.22,1]);
		var bezcss = ".19,1,.22,1";
	</script>

	</head>
	<body> 
	
	<header>
		<div data-role="header">
			<a href="index.php" rel="external">Home</a> <br>
			<center><h2><font face="Helvetica" font size="5">Photo Archive</font></h2></center>
		</div>
	</header>

	<div style="display:block;position:relative; overflow:hidden" data-role="page">
	<div id="example9-click-dragOut"><div id="example9-click-dragIn"></div></div>
	
	<?php
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$result = mysql_query("select * from photos where user='$_SESSION[username]'");
		$i = 1;
		while(($row = mysql_fetch_array($result)) && ($i<13))
 		{	?>
 			<div id="example9-item-<?=$i?>">
			<center><img src = "<?=$row['photo'] ?>" style="max-width:75px;" /><font size="1"> <?=$row['question'] ?></font></center>
			</div>	
 			<?php $i++;
 		}
	?>
	
	<div style="clear:both;"></div>
	<div id="example9-click-prev"></div>
	<div id="example9-click-scrollOut"><div id="example9-click-scrollIn"></div></div>
	<div id="example9-click-next"></div>
	</div>
	
	<div style="clear:both;height:200px;"></div>

	<script type="text/javascript">

var example9 = new Mg({
	reference:"example9",
	click:{
		activated:[6],
		cycle:true,
		interactive:true,
		multiLess:7, multiPlus:7,
		scrollWheel:true, dragWheel:true
	}
});
example9.click.onEvent = function(){
	var arr = this.multiActivated;
	var alpha = Math.PI*2/(arr.length);
	var xradius = 100;
	var yradius = 60;
	for (var i=0;i<arr.length;i++){
		var path = $("#"+this.reference+"-item-"+ arr[i]);
		if(arr[i]==this.activated){
			var depth = 0;
		} else {
			var depth = example9.mapDistanceReverse(this.multiPlus, i, arr.length, 0);
		}
		//
		var theta = alpha*(this.activated-arr[i]-depth/6)+1.6; // -depth/6 will give additional distance based on depth: it gives space for activated
		var x = xradius+Math.cos(theta)*xradius;
		var y = yradius+Math.sin(theta)*yradius;
		var w = h = y/4;
		var scale = 0.2+y/140;
		if(arr[i]==this.activated){scale = 2; y-=30;}
		path.clearQueue().stop().css("z-index", Math.round(y/10));
		if(perspective && transition){
			path.css(transition.css, transform.css+" 1.3s cubic-bezier("+bezcss+")");
			path.css(transform.css, "translate3d("+x+"px,"+y+"px,0) scale("+scale+")");
		}else{
			path.animate({transformJ:'translate('+x+','+y+') scale('+scale+')'},{queue:true, duration:1300, specialEasing: {transformJ:bez}});
		}
	}
	$("#"+this.reference+"-item-"+this.deactivated).removeClass("active");
	$("#"+this.reference+"-item-"+this.activated).addClass("active").css("z-index",100);
}

example9.click.scrollClick = function(){
	var path = $("#"+this.reference+"-click-scrollIn");
	path.addClass("active");
}
example9.click.scrollMove = function(){
	var path = $("#"+this.reference+"-click-scrollIn");
	if(perspective && transition){
		path.css(transition.css, transform.css+" 0s");
		path.css(transform.css, "translate3d("+this.scrollPosition+"px,0,0)");
	}else{
		path.clearQueue().stop().animate({left:this.scrollPosition},{queue:true, duration:0, specialEasing: {left:bez}});
	}
}
example9.click.scrollRelease = function(){
	var path = $("#"+this.reference+"-click-scrollIn");
	path.removeClass("active");
	if(perspective && transition){
		path.css(transition.css, transform.css+" 1.2s cubic-bezier("+bezcss+") 0s");
		path.css(transform.css, "translate3d("+this.scrollPosition+"px,0,0)");
	}else{
		path.clearQueue().stop().animate({left:this.scrollPosition},{queue:true, duration:300, specialEasing: {left:bez}});
	}
}
example9.click.dragMove = function(){
	var path = $("#"+this.reference+"-click-dragIn");
	if(perspective && transition){
		path.css(transition.css, transform.css+" 0s");
		path.css(transform.css, "translate3d("+this.dragPosition+"px,0,0)");
	}else{
		path.clearQueue().stop().animate({left:this.dragPosition},{queue:true, duration:0, specialEasing: {left:bez}});
	}
}
example9.click.dragRelease = function(){
	var path = $("#"+this.reference+"-click-dragIn");
	if(perspective && transition){
		path.css(transition.css, transform.css+" 1.2s cubic-bezier("+bezcss+") 0s");
		path.css(transform.css, "translate3d("+this.dragPosition+"px,0,0)");
	}else{
		path.clearQueue().stop().animate({left:this.dragPosition},{queue:true, duration:300, specialEasing: {left:bez}});
	}
}

example9.init();

</script>
</body>
</html>






