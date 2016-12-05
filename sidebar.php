<?php
	if( is_page() ) {
		dynamic_sidebar('sidebar-page');
	} elseif( is_single() ) {
		dynamic_sidebar('sidebar-post');
	} else {
		dynamic_sidebar('sidebar');
	}

	?>
