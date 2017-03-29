<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 3/29/2017
 * Time: 7:53 AM
 */
?>
<html>
<head><title>Text Feedback saver</title>
    <style>
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
            top:20vh;
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
            background-color: #333;
            color: white;
            margin: 3px auto;
            font-family: "Droid Sans", sans-serif;
            transition: .25s;
            border-radius: 2px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
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

    </style>
</head>
<body>

<div id="notification">

</div>

<!--<form id="form" action="resp.php" method="post">-->
<div id="form">

    <input class="input" type="text" name="name" id="name" placeholder="name" autocomplete="off"/><br>
    <input class="input" type="email" name="mail" id="mail" placeholder="mail" autocomplete="off"/><br>
    <textarea class="input" placeholder="your feedback" name="feed" id="feed" style="resize: none"></textarea><br>
    <button class="button" type="submit" id="submitBtn">submit</button>
    <span style="clear: both;display: block"></span>

</div>
<!--</form>-->


<script src="main.js" type="text/javascript"></script>
</body>


</html>

