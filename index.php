
<html>
<head>
<meta content="" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ,user-scalable=no">
<title>Feedback Form</title>
    <style>
		@import url('https://fonts.googleapis.com/css?family=Droid+Sans');
        body {
            margin: 0;
            padding: 0;
            border: 0;
            background-color: #7986cb;
            font-family: "Droid Sans", sans-serif;
            font-size: 1em;
        }

        #form {
            display: block;
            position: fixed;
            width: 80vw;
            margin: 10vh auto;
            padding: 20px;
            top:4vh;
            left: 10vw;
            box-sizing: border-box;
            background-color: rgba(34, 56, 67, 0.9);
            color: white;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
        }

        .input {
            display: block;
            width: 98%;
            padding: 15px;
            box-sizing: border-box;
            border: none;
            outline: none;
            background-color: transparent;
            color: white;
            margin: 3px auto;
            font-family: "Droid Sans", sans-serif;
            transition: .25s;
            /*box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);*/
			border-bottom:1px solid rgba(200,200,200,0.3);
        }
		.input:focus{
			border-bottom:1px solid rgba(200,200,200,1);
		}
		
        .button {
            padding: 7px 15px;
            border: none;
            outline: none;
            background-color: #2196F3;
            color: white;
            cursor: pointer;
            margin: 10px;
            font-family: "Droid Sans", sans-serif;
            transition: .25s;
            border-radius: 2px;
            text-transform: uppercase;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2)
        }

        input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
            background-color: rgba(0, 0, 0, 0.7) !important;
            color: rgb(255, 255, 255) !important;

        }

        @keyframes fromTop {
            from {
                margin-top: -50vh;
            }
            to {
                margin-top: inherit;
            }
        }

        #notification {
            padding: 20px;
            background-color: #d9a3a3;
            color: white;
            display: none;
            max-width: 400px;
            margin: 20px auto;
            transition: 0.3s;
            animation: fromTop 0.2s ease-in;
        }
		.welcome_msg{
			display:block;
			width:100%;
			padding:5vh;
			box-sizing:border-box;
			font-family:inherit;
			font-size:1.2em;
			font-weight:600;
			color:#efefef;
			background-color:rgba(0,0,0,0.12);
		}
		@media(max-width:700px){
			#form {
				display: block;
				position: fixed;
				width: 100vw;
				margin:0;
				padding: 20px;
				top:0;
				left:0;
				height:100vh;
				box-sizing: border-box;
				background-color: rgba(34, 56, 67, 0.9);
				color: white;
			}

		}

    </style>
</head>
<body>

<div id="notification">

</div>
<!--?php
 if(!isset($_COOKIE[crc32('vis')])){
	setcookie(crc32('vis'),0,time() + (86400 * 30),"/");
	echo "<h3 class='welcome_msg'>Hello new Visitor</h3>";
 }else{
	echo "<h3 class='welcome_msg'>Hello Again</h3>";
 }
?-->

<!--<form id="form" action="resp.php" method="post">-->
<div id="form">

    <input class="input" type="text" name="name" id="name" placeholder="name" autocomplete="off"/><br>
    <input class="input" type="email" name="mail" id="mail" placeholder="mail" autocomplete="off"/><br>
    <textarea class="input" placeholder="your feedback" name="feed" id="feed" style="resize: none;min-height:30vh;"></textarea><br>
    <button class="button" type="submit" id="submitBtn">submit</button>
    <span style="clear: both;display: block"></span>

</div>
<!--</form>-->


<script src="main.js" type="text/javascript"></script>
</body>


</html>

