<head>
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css" />
    <link rel="stylesheet" id="mytheme-ptsanserif-css" href="http://fonts.googleapis.com/css?family=PT+Sans%3A400%2C700%2C400italic%2C700italic&amp;ver=4.7.5" type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js" type="text/javascript" async=""></script>
    <script>
                            /* You can add more configuration options to webfontloader by previously defining the WebFontConfig with your options */
                            if ( typeof WebFontConfig === "undefined" ) {
                                WebFontConfig = new Object();
                            }
                            WebFontConfig['google'] = {families: ['PT+Sans:300', 'Montserrat:400']};

                            (function() {
                                var wf = document.createElement( 'script' );
                                wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js';
                                wf.type = 'text/javascript';
                                wf.async = 'true';
                                var s = document.getElementsByTagName( 'script' )[0];
                                s.parentNode.insertBefore( wf, s );
                            })();
                        </script>
</head>
<?php

// Check if submit

if(!empty($_POST)) {

		// get vars
	function getimg($url) {         
	    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
	    $headers[] = 'Connection: Keep-Alive';         
	    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
	    $user_agent = 'php';         
	    $process = curl_init($url);         
	    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
	    curl_setopt($process, CURLOPT_HEADER, 0);         
	    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
	    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
	    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
	    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
	    $return = curl_exec($process);         
	    curl_close($process);         
	    return $return;     
	} 

	$name = $_POST['event_name'];
	$location = $_POST['event_location'];
	$date = $_POST['event_date'];
	$url = $_POST['event_url'];


	$files = glob('./tmp/'); // get all file names
	foreach($files as $file){ // iterate files
	  if(is_file($file))
	    unlink($file); // delete file
	}

	$imagename= basename($url);
	if(!file_exists('./tmp/'.$imagename)){ 
		$image = getimg($url); 

		file_put_contents('tmp/'.$imagename,$image);    
	}
	$time = $_POST['event_time'];

	//check if all fields are done

	// if($name && $location && $date && $url) {


	// Print image

		?>
		<style>
			body {
				background-color:#000;
				color:#FFF;
				font-family:"PT Sans", Helvetica, Arial, sans-serif;
				font-size:3em;
			}
		</style>
		<div style="width:100%; max-width:1000px; height:1000px; max-height:1000px; background-image:url('<?php echo 'tmp/'.$imagename; ?>'); font-family: 'Montserrat'; position: relative;" id="instagram">
			<div style="position: absolute; top:0; left:0; width:100%; height:1000px; overflow:hidden;">
				<img src="<?php echo 'tmp/'.$imagename; ?>" style="width:auto; height:1000px;" />
			</div>
			<div style="width:50%; margin:0 auto; position:relative; height:1000px;">
				<div style="width:100%; position:absolute; bottom:0; background-color:#F5CB5C;">
					<h1 style="font-family: 'Montserrat'; text-align: center; font-size: 48px; line-height: 54px; color: #FFF; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">
						<?php echo $name; ?>		
					</h1>
					<span style="float: left; width: 100%; color: #222; font-size: 24px; line-height: 32px; padding-bottom: 15px; margin-bottom: 15px; text-align: center;">
						<i class="fa fa-map-marker"></i>
						<?php echo $location; ?>
					</span>
					<div style="width:100%;">
						<div style="float: left; width: 100%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
							Starts:
						</div>
						<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
							<i class="fa fa-calendar-o" style="margin-right: 5px;"></i><?php echo $date; ?>
						</div>
						<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 25px; text-align: center;">
							<i class="fa fa-clock-o" style="margin-right: 5px;"></i><?php echo $time; ?>
						</div>
						<div style="float: left; width: 100%; color: #444; font-size: 16px; line-height: 22px; margin-bottom: 15px; text-align: center;">
							www.SeshSource.com
						</div>
					</div>
				</div>
			</div>
		</div>

    <script type="text/javascript" src="html2canvas.js"></script>
    <script type="text/javascript">
        html2canvas(document.getElementById('instagram')).then(function(canvas) {
            
            document.body.appendChild(canvas);
            document.getElementById('instagram').style.display = "none"; 
        });
    </script>
		<?php


	} else {


		// Print form for inputing
		# Event name / location / date / background image
		// TODO: if input failed above, add old info to input (if statements echoing vars in input tags)
		?>
		<style>
			body {
				background-color:#000;
				color:#FFF;
				font-family:"PT Sans", Helvetica, Arial, sans-serif;
				font-size:1.5em;
			}

			form {
				width:1000px;
				margin:1em auto;
			}

			input, label {
				width:100%;
				display:block;
			}

			label {
				width:100%;
				text-transform: uppercase;
			}

			input {
				padding:1em;
			}

			button[type='submit'] {
				width:100%;
				background:#F5CB5C;
				color:#222;
				font-size:1.5em;
				text-transform: uppercase;
				font-family:'Montserrat', Arial, sans-serif;
				border:0;
			}

			button[type='submit']:hover, button[type='submit']:focus {

				background:#ceab4a;
				cursor: pointer;
			}

			#links {
				font-size:0.65em;
				color:#AAA;
			}
		</style>
		<form name="event" action="#" method="post">
			<label for="event_name">Event Name: </label>
			<input type="text" name="event_name" placeholder="420 Sesh" /><br />

			<label for="event_name">Event Location: </label>
			<input type="text" name="event_location" placeholder="Downtown Los Angeles" /><br />

			<label for="event_name">Event Date: </label>
			<input type="text" name="event_date" placeholder="4/20/2017" /><br />

			<label for="event_name">Event Time: </label>
			<input type="text" name="event_time" placeholder="7:30" /><br />

			<label for="event_name">Background Image (URL): </label>
			<span id="links">http://seshsource.com/wp-content/uploads/2017/04/pexels-photo-341858.jpeg</span>
			<input type="text" name="event_url" placeholder="http://images.google.com/something.jpg" /><br />
			<button type="submit">Submit</button>
		</form>


		<?php



	// } // end check for input
} //end submit check
?>
