<?php
    require "../lib/localresource.php";

    $url  = "http://". $_SERVER['SERVER_NAME'] ."/". $_SERVER['REQUEST_URI'];
    $file = $_SERVER['SCRIPT_FILENAME'];

    $here = new LocalResource($url, $file);
	$service = $here->base()->get('/../');

?>
function search_bashoola(){
  this.name = "bashoola";
  this.aliases = new Array("bashoola","bash", "sh");
  this.mode = true;
  this.help = "execute bash commands";

  this.call = function(args){
   var serviceUrl = "<?php echo $service->url; ?>";
   this.start = 0;
   
   ajaxquery(serviceUrl+"?c="+args.join("+"));
  }

  this.next = function(){
  }

  this.render = function(context, results, status, details, unused){
      if(results && results.results != "") this.hasmore = true;
     else this.hasmore = false;


    this.renderResult(context, results, status, details, unused);
  }


}
register_searcher("bashoola","web");
