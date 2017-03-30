<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	
</head>
<body>
<style type="text/css">
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
            padding: 20px;
        	width: 80vw;
        	display: block;
        	margin: 5px auto;
            padding: 5vw;
            padding-top: 10vh;
            top:4vh;
            left: 10vw;
            border-radius: 3px;
            box-sizing: border-box;
            background-color: rgba(34, 56, 67, 0.9);
            color: white;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
        }
        #wrapper{
        	padding: 20px;
        	width: 80vw;
        	display: block;
        	margin: 5px auto;
        	border-radius: 3px;
            box-sizing: border-box;
            background-color: rgba(34, 56, 67, 0.9);
        	color: #fff;
        	transition: 0.4s;
        	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
        }
        #wrapper span{
        	display: block;
        	width: 100%;
        	margin: 0 auto;
        	padding: 7px;
        	border-radius: 3px;
            box-sizing: border-box;
            background-color: rgba(34, 56, 67, 0.9);
        	color: #fff;
        	transition: 0.4s;
        }
        input {
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
		input:focus{
			border-bottom:1px solid rgba(200,200,200,1);
		}
		
        button {
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
        #label{
        	display: block;
        	width: 100%;
        	color: #fff;
        	padding: 7px;
        	border-bottom:1px solid rgba(200,200,200,1);
        }


        @media(max-width:700px){
			#form {
				width: 100vw;
				margin:0;
				padding: 4vw;
				top:0;
				left:0;
				box-sizing: border-box;
				background-color: rgba(34, 56, 67, 0.9);
				color: white;
			}
			#wrapper{
				width: 100vw;
				padding: 0;
			}
			body{
				overflow-x: hidden;
			}
			tr td{
				width: 100%;
				display: block;
			}
		}
</style>

<style type="text/css">
	.spinner {
  margin: 100px auto 0;
  width: 70px;
  text-align: center;
  display: none;
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}

table {
    display: table;
    border-collapse: separate;
    border-spacing: 2px;
    border-color: transparent;
    box-sizing: border-box;
    width: 100%;
    padding: 0;
}
tbody{
	box-sizing: border-box;
    width: 100%;
    padding: 0;
}
tr{
	width: 100%;
    display: block;
    box-sizing: border-box;
    clear: both;
    padding: 0;
}
tr:nth-child(even){
	background-color:rgba(0,0,0,0.2); 
}
tr:nth-child(odd){
	background-color:rgba(0,0,0,0.3); 
}
tr td:nth-child(1){
	border-right: 1px solid #888;
}

tr td:nth-child(2){
	border-right: 1px solid #888;
}
td{
	width:33%;
	display: inline-block;
	padding: 7px;
	box-sizing: border-box;
	/*outline: 1px solid #eee; */
}

</style>

<div id="form">
<label id="label">Admin Page</label>
<input type="name" name="uname" id="uname" placeholder="user name" value="baniksudipta" />
<input type="password" name="password" placeholder="password" id="password" value="root">
<button id="adminSubmit">SUBMIT</button>
</div>

<div id="wrapper">
	<div class="spinner">
	  <div class="bounce1"></div>
	  <div class="bounce2"></div>
	  <div class="bounce3"></div>
	</div>
</div>
<script src="admin.js" type="text/javascript"></script>

</body>
</html>