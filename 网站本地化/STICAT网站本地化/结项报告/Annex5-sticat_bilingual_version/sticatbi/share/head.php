<!-- 
	1.css样式网站https://techbrood.com/?q=css3
	2.hover样式大全
	3.转化为ico		http://www.bitbug.net/
 -->

<?php

include "connection/lock.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>STI CAT</title>
  <link rel="shortcut icon" href="img/iconcat.ico" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="css/addons/datatables.min.css">
  <link rel="stylesheet" href="css/addons/datatables-select.min.css">
  <link rel="stylesheet" type="text/css" href="https://ianlunn.github.io/Hover/css/hover.css">
  <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/jeditable.js/2.0.13/jquery.jeditable.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  
  <style>

.loading-container {
	width: 600px;
	height: 300px;
	padding: 50px;
	margin: 0px auto;
	border-radius: 10px;
	background: rgba(255,255,255,0.6);
	border: 1px solid #eee;
}

.loading-container .loading-bar {
	margin-bottom: 40px;
}
.loading-bar {
	/* width: 400px; */
	margin: 0px auto;
	height: 30px;
	border-radius: 50px;
	background-color: #DCDCDC;
	padding: 4px 5px;
	box-shadow: inset 3px 0px 10px rgba(0,0,0,0.1);
}

.amount {
	/* we haven't included the colour yet, we'll get to that later. */
	height: 30px;
	border-radius: 5px;
	white-space: nowrap;
	overflow: hidden;
	margin-top: -9px;
}

.lines {
	/* the lines overflow the container. This creates a continuous flow of the background */
	width: 200%;
	/* We use a SVG file as the background */
	background: url('css/lines.svg') repeat-x;
	height: 120%;
	text-align: center;
	margin-top: -35px;
	/* Any overflow is hidden */
	overflow: hidden;
	border-radius: 50px;
	/* Implement the animations, we'll get to that later */
	-webkit-animation: moveBars 1s linear infinite;
	-moz-animation: moveBars 1s linear infinite;
	-ms-animation: moveBars 1s linear infinite;
	-o-animation: moveBars 1s linear infinite;
	animation: moveBars 1s linear infinite;
	font-weight: bold;
	color: #fff;
	color: 1px;
	font-size: 18px;
	text-shadow: 0px 0px 10px rgba(0,0,0,0.3);
}

.loaded {
	text-align: center;
	font-family: Helvetica, sans-serif;
	font-weight: bold;
	position: relative;
	top: 9px;
	font-size: 15px;
	text-shadow: 0px 0px 10px rgba(0,0,0,0.2);
	color: #fff;
	z-index: 9999;
}

.green {
	background-color: #8ac320;
	box-shadow: inset 0px 4px 40px rgba(255,255,255,0.2), 0 10px 10px -5px #79aa1e , 0 7px 0 #628c14;
}

.blue {
	background-color: #20b9c3;
	box-shadow: inset 0px 4px 40px rgba(255,255,255,0.2), 0 10px 10px -5px #1e8aaa, 0 7px 0 #13768c;
}

.red {
	background-color: #dc6565;
	box-shadow: inset 0px 4px 40px rgba(255,255,255,0.2), 0 10px 10px -5px #d23333, 0 7px 0 #8c1212;
}

/* ANIMATIONS */
@keyframes moveBars { 100% { margin-left: -180px; } }
@-webkit-keyframes moveBars { 100% { margin-left: -180px; } }
@-moz-keyframes moveBars { 100% { margin-left: -180px; } }
@-ms-keyframes moveBars { 100% { margin-left: -180px; } }
@-o-keyframes moveBars { 100% { margin-left: -180px; } }

/* ------- IGNORE */

#header {
	width: 100%;
	margin: 0px auto;
}

#header #center {
	text-align: center;
}

#header h1 span {
	color: #000;
	display: block;
	font-size: 50px;
}

#header p {
	font-family: 'Georgia', serif;
}
#header h1 {
	color: #892dbf;
	font: bold 40px 'Bree Serif', serif;
}

#travel {
	padding: 10px;
	background: rgba(0,0,0,0.6);
	border-bottom: 2px solid rgba(0,0,0,0.2);
	font-variant: normal;
	margin-bottom: 40px;
	text-decoration: none;
}

#travel a {
	font-family: 'Georgia', serif;
	text-decoration: none;
	border-bottom: 1px solid #f9f9f9;
	color: #f9f9f9;
}

.cyan-lighter-hover {
    color: #0f0f0f;
    -webkit-transition: .4s;
    transition: .4s; }
.cyan-lighter-hover:hover {
    -webkit-transition: .4s;
    transition: .4s;
    color: #00bcd4; }
  
  </style>
</head>

<body>