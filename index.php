<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css" />
    <link rel="stylesheet" id="mytheme-ptsanserif-css" href="http://fonts.googleapis.com/css?family=PT+Sans%3A400%2C700%2C400italic%2C700italic&amp;ver=4.7.5" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans" rel="stylesheet">
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

	$name = filter_var(htmlspecialchars($_POST['event_name']), FILTER_SANITIZE_STRING);
	$location = filter_var(htmlspecialchars($_POST['event_location']), FILTER_SANITIZE_STRING);
	$date = filter_var(htmlspecialchars($_POST['event_date']), FILTER_SANITIZE_STRING);
	$url = 'http://seshsource.com/wp-content/uploads/2017/04/pexels-photo-341858.jpeg';
	$logo = $_POST['event_logo'];


	$files = glob('./tmp/'); // get all file names
	foreach($files as $file){ // iterate files
	  if(is_file($file))
	    unlink($file); // delete file
	}

	$featured_image_name= basename($url);
	$logo_image_name= basename($logo);

	if(!file_exists('./tmp/'.$featured_image_name)){
		$featured_image_url = getimg($url);

		file_put_contents('tmp/'.$featured_image_name,$featured_image_url);
	}

	if(!file_exists('./tmp/'.$logo_image_name)){
		$logo_image_url = getimg($logo);

		file_put_contents('tmp/'.$logo_image_name,$logo_image_url);
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
		<div style="width:1000px; max-width:1000px; height:1000px; max-height:1000px; background-image:url('<?php echo 'tmp/'.$featured_image_name; ?>'); font-family: 'Montserrat'; position: relative;" id="instagram" data-title="<?php echo $name; ?>">
			<div style="position: absolute; top:0; left:0; width:100%; height:1000px; overflow:hidden;">
				<img src="<?php echo 'tmp/'.$featured_image_name; ?>" style="width:auto; height:1000px;" />
			</div>
			<div style="width:50%; margin:0 auto; position:relative; height:1000px;">
				<div style="width:100%; position:absolute; top:0; background-color:#F5CB5C;">
					<h1 style="font-family: 'Montserrat'; text-align: center; font-size: 48px; line-height: 54px; color: #FFF; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">
						<?php echo $name; ?>
					</h1>
					<span style="float: left; width: 100%; color: #222; font-size: 24px; line-height: 32px; padding-bottom: 15px; margin-bottom: 5px; text-align: center;">
						<i class="fa fa-map-marker"></i>
						<?php echo $location; ?>
					</span>
					<div style="width:100%;">
						<div style="float: left; width: 100%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 10px; text-align: center;">
							Starts:
						</div>
						<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 15px; text-align: center;">
							<i class="fa fa-calendar-o" style="margin-right: 5px;"></i><?php echo $date; ?>
						</div>
						<div style="float: left; width: 50%; color: #444; font-size: 24px; line-height: 32px; margin-bottom: 25px; text-align: center;">
							<i class="fa fa-clock-o" style="margin-right: 5px;"></i><?php echo $time; ?>
						</div>
					</div>
				</div>

				<div style="width:100%; position:absolute; top:35%;">
					<img src="<?php echo 'tmp/'.$logo_image_name; ?>" style="width:100%; max-height:500px;" />
				</div>

				<div style="width:100%; position:absolute; bottom:0; background-color:#F5CB5C;">
						<div style="float: left; width: 100%; color: #444; font-size: 11px; line-height: 16px; margin: 15px 0 5px 0; text-align: center;">
							Find us on
						</div>
						<div style="float: left; width: 100%; color: #444; font-size: 24px; line-height: 28px; margin-bottom: 15px; text-align: center;">
							www.SeshSource.com
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="share">
			<a href=""
		</div>

    <script type="text/javascript" src="html2canvas.js"></script>
    <script type="text/javascript">

		var title = document.getElementById('instagram').dataset.title;

        html2canvas(document.getElementById('instagram')).then(function(canvas) {
			
			canvas.id = 'gfx';
            document.body.appendChild(canvas);
			var img  = document.getElementById('gfx').toDataURL("image/png");

            document.getElementById('instagram').style.display = "none";
            document.getElementById('gfx').style.display = "none";

            var link = document.createElement('a');
            link.href = img;            
            link.download = title;
            var img_html = document.createElement('img');
            img_html.src = img;
            img_html.style.width = '100%';
            link.appendChild(img_html);

            document.body.appendChild(link);
            link.click();
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
				width:100%;
        max-width:500px;
				margin:1em auto;
			}

			input, label {
				width:100%;
				display:block;
			}

			label {
				width:100%;
				text-transform: uppercase;
        color:#DDD;
        transition:color 0.375s;
			}

			input {
				padding:0.75em;
        background:#222;
        color:#FFF;
        border:2px solid #333;
        font-size:16px;
        transition:padding 0.375s, margin-top 0.375s;
			}

      input:focus {
        padding:1em;
        margin-top:3px;
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
      @media all (min-width:30em) {

      }
		</style>
		<div style="width:100%; display: block; text-align:center;">
			<a href="http://seshsource.com"><img src="http://seshsource.com/wp-content/uploads/2017/04/SESHSOURCE-Copy-3-w.png" style="margin:auto; text-align:center;"></a>
		</div>
		<h1 style="text-align:center;">Instagram Event Ad Generator</h1>
		<form name="event" action="#" method="post">
			<label for="event_name">Event Name:
			<input type="text" name="event_name" placeholder="420 Sesh" /></label><br />

			<label for="event_location">Event Location:
			<input type="text" name="event_location" placeholder="Downtown Los Angeles" /></label><br />

			<label for="event_date">Event Date:
			<input type="text" name="event_date" placeholder="4/20/2017" /></label><br />

			<label for="event_time">Event Time:
			<input type="text" name="event_time" placeholder="7:30" /></label><br />

			<label for="event_logo">Your Logo:
			<input type="text" name="event_logo" placeholder="http://yourbusiness.com/images/logo.jpg" /></label><br />

			<button type="submit">Submit</button>
		</form>


		<?php



	// } // end check for input
} //end submit check
?>
