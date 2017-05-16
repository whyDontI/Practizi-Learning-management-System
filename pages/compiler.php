<!DOCTYPE html>
<html>
<head>
	<title>compiler</title>
</head>

<style type="text/css">
#my-div
{
    width    : 1000px;
    height   : 600px;
    overflow : hidden;
    position : relative;
    border: 5px solid red;
}

#my-iframe
{
    position : absolute;
    top      : -100px;
    left     : -200px;
    width    : 1280px;
    height   : 1200px;
}
</style>
<body>
<!-- <iframe id="iframe" src="https://www.jdoodle.com/php-online-editor" width="500" height="500"></iframe> 
	 <iframe src="http://codepad.org/ci1rrd97" width="500" height="500"></iframe> -->

	<div id="my-div">
		<iframe id="my-iframe" width="100%" height="100%" src="https://www.jdoodle.com/php-online-editor" ></iframe>
	</div>

	
	<script type="text/javascript">
		var myDiv = document.getElementById('my-div');
		myDiv.onload = function(){
		    myIframe.contentWindow.scrollBy(0, 1000);
		};
	</script>

</body>
</html>