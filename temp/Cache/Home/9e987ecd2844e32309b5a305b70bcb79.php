<?php if (!defined('THINK_PATH')) exit();?><html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body><div align="center">
	<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player" width="720" height="405">
		<param name="movie" value="<?php echo ($tplpath); ?>pl.swf" />
		<param name="allowfullscreen" value="true" />
		<param name="allowscriptaccess" value="always" />
        <param name="flashvars" value="file=<?php echo ($webpath); ?><?php echo ($trailer); ?>&image=<?php echo ($picurl); ?>"/>
		<embed
			type="application/x-shockwave-flash"
			id="player2"
			name="player2"
			src="<?php echo ($tplpath); ?>pl.swf" 
			width="720" 
			height="405"
			allowscriptaccess="always" 
			allowfullscreen="true"
			flashvars="file=<?php echo ($webpath); ?><?php echo ($trailer); ?>&image=<?php echo ($picurl); ?>" 
		/>
    </object>
</div>    
</body>
</html>