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
   this.start = 0;
   
   this.query(args.join(" "));
  }

  this.query = function(A) {
    var serviceUrl = "<?php echo $service->url; ?>";
	ajaxquery(serviceUrl+"?&callback=searchers_"+this.name+".render&c="+encodeURIComponent(A));
  }

  this.render = function(context, results){
  	if (iscontext(context)) {
  		output.innerHTML+=results;
		input.style.display="block";
		focusinput();
		window.scrollBy(0,122500)
	}
  }
}
register_searcher("bashoola");
