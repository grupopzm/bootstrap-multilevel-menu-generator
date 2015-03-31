<?php
	function generateMenu($menuStructor)
{
	//load xml file
	$menu = simplexml_load_file($menuStructor);
	echo '<nav class="navbar navbar-inverse navbar-custom">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">Your Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">';
	//loop through top level menu items
	foreach($menu->children() as $node0)
	{

		if(isset($node0->subitem1)){
        	
			echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$node0->name.'<span class="caret"></span></a>';
             echo '<ul class="dropdown-menu multi-level" role="menu">';
			
			//loop through child items
			foreach($node0->children() as $node1)
			{
				if(!empty($node1->name)){
				
					if(isset($node1->subitem2))
					{
						echo '<li class="dropdown-submenu">
              				<a tabindex="-1" href="#">'.$node1->name.'</a>';
						echo '<ul class="dropdown-menu">';
						
						foreach($node1->children() as $node2)
						{
							if(!empty($node2->name))
								echo '<li><a tabindex="-1" href="' . $node2->link . '">' . $node2->name . '</a></li>';
						}
						echo "</ul>";
					}
					else{
						echo '<li><a href="' . $node1->link . '">' . $node1->name . '</a></li>';
					}
				}
			}
		echo '</ul>
            </li>';
		}
		else {
			echo '<li><a href="' . $node0->link . '">'.$node0->name.'</a></li>';
		}
	}
	echo '</ul><!--/nav navbar -->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>';
}

?>