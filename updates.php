<div id="updates">
	<div id="ticker_btn"><a href="http://feeds.feedburner.com/Vivacity2010" onclick="toggleUpdates();"></a></div>
	<div id="ticker">
    	<div class="dmarquee">
        <div><div id="ticker_inner" style="overflow:hidden; height:30px">
    	<?php
	    $xml = simplexml_load_file('updates/feeds.xml') or die ("Loading of Updates Failed");
		foreach($xml->channel->item as $u)
		{
			echo "<span class=\"updateTitle\">".$u->title."</span><span class=\"updateDesc\"><a href=\"".$u->link."\">".$u->description."</a></span>\n";	
		}
		?>
        </div></div>
		</div>
    </div>
</div>