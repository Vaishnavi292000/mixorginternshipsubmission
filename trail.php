
<?php
$dir = "../MixOrg Submission/images/";
$count=0;
$file=" ";
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false ){
    	if($file!='.' && $file != '..')
    	{
    		$count++;
    	}
    	
    }
    closedir($dh);
  }
}
?>
<!DOCTYPE html>
<html>
<head>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	  <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	.btn {
	  background-color: DodgerBlue;
	  border: none;
	  color: white;
	  padding: 12px 16px;
	  font-size: 16px;
	  cursor: pointer;
	}

	/* Darker background on mouse-over */
	.btn:hover {
	  background-color: RoyalBlue;
	}

	input[type=text], select {
	  width: 50%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit] {
	  width: 100%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	input[type=submit]:hover {
	  background-color: #45a049;
	}

	div {
	  border-radius: 5px;
	  background-color: #f2f2f2;
	  padding: 20px;
	}
	</style>
	<script>
		function changeimage(clickedid) {
			// body...
			var txt;
			if( typeof changeimage.counter == 'undefined' ) {
		        changeimage.counter = 2;
		    }
		    var len= <?php echo $count; ?>;
		    if(changeimage.counter<=len)
		    {
		    	document.getElementById('myImage').src='images/'+changeimage.counter+'.jpeg';
		    	if(clickedid=='submit')
		    	{
		    		str='images/'+(changeimage.counter-1)+'.jpeg';
		    		txt=document.getElementById("imgtext").value;
			    	changeimage.counter++;
			     	var xmlhttp = new XMLHttpRequest();
				    xmlhttp.onreadystatechange = function() {
				      if (this.readyState == 4 && this.status == 200) {
				        //document.getElementById("imgname").value = this.responseText;
				        if (this.responseText=="1") {
				        	 document.getElementById("imgtext").value='';
				       		 document.getElementById("success").style.visibility="visible";
				       		 setTimeout(function(){
							    document.getElementById("success").style.visibility="hidden";
							}, 5000);
				        }
				        else
				        {
				        	document.getElementById("unsuccess").style.visibility="visible";
				        	setTimeout(function(){
							    document.getElementById("unsuccess").style.visibility="hidden";
							}, 5000);
				        }
				       
				      }
				    };
				    xmlhttp.open("GET","imgsub.php?q="+str+"&txt="+txt,true);
				    xmlhttp.send();
		    	}
		    }
		    else
		    {
		    	document.getElementById("unsuccess").style.visibility="visible";
		    }
		}
		
	</script>

</head>
<body>
<center>
<h2>Welcome to this page</h2>

<p>You have to write the text in the image and click on submit for next image.</p>

<p>If you don't want this image you can skip that image.</p>


<img id="myImage" src="images/1.jpeg" style="width:300px; height: 300px">
<br>
<br>
<form>
<label for="fname">Image Text</label>
    <input type="text" id="imgtext" name="imgtext" placeholder="Enter the text in the image">
<br>
<button class="btn" type="button" onclick="changeimage(this.id)" id="skip"> <i class="fa fa-angle-double-right"></i> Skip</button>
<span></span>
<button class="btn" type="button" onclick="changeimage(this.id)" id="submit" name="submit"><i class="fa fa-arrow-right"></i> Submit</button>
<br><br>
</form>

<br>

<span id="success" style="visibility: hidden">Your text submitted successfully.</span><br>
<span id="unsuccess" style="visibility: hidden">No images left.</span><br>

</center>

</body>
</html>
