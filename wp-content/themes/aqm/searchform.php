<div class="search block">
	<form method="GET" id="searchform" action="<?php echo home_url( '/' ) ?>" role="search">
		<input type="text" name="s" placeholder="Поиск" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
		<input type="submit" value="">
	</form>
</div>