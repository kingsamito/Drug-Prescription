
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>chat</title>
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/chatbox.css">
</head>

<body>
  <div class="contact-us">
    <div class="header">
      <h1>My ChatBox</h1>
    </div>

    <?php
            session_start();
                if(!isset($_SESSION['email'])){
        ?>
    <form method="post" action="register.php">
      <label>Name</label>
      <input name="customerName" required="" type="text" />
      <label>Email</label>
      <input name="customerEmail" required="" type="email" />
      <label for="customerPhone">To</label>
      <div class="input-field">
        <i class="fa fa-user-md"></i>
        <select name="" id="" required>
          <option value="#">Select</option>
          <option value="doctor">Doctor</option>
          <option value="pharmacy">Pharmacy</option>
        </select>
      </div>


      <h3>
        Please provide all the information about your issue you can.
      </h3>
      <button id="customerOrder">SUBMIT</button>
      
    </form>
    <?php
        exit;
        }
    
    ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>

	function submitchat(){
		if(form1.msg.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var msg = form1.msg.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('chatlogs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?msg='+msg, true); //open and send http request
		xmlhttp.send();
	}
	$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
		});
		
	</script>
</head>
<body>
	<?php
	if($_SESSION['email'] === "doc@gmail.com"){

		$_SESSION['who'] = $_GET['patient'];
	}
	?>
<h3><a href="logout.php">End Chat</a></h3>
<h2>Howdy, <?php echo $_SESSION['user']; ?></h2>
	<div id="chatlogs">
    	LOADING CHATLOGS, PLEASE WAIT...
    </div>
<form name="form1">
	</br> <textarea name="msg" placeholder="Your message here..." style="width:590px; height:30px;"></textarea>
	<a href="#" onClick="submitchat()" class="button">Send</a></br></br>
</form>
    </div>
</div>
</body>
</html>