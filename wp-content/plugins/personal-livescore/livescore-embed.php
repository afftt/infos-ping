<?php
require_once '../../../wp-config.php';

$pl_refresh_interval = get_option('pl_refresh_interval');
$pl_refresh_interval = $pl_refresh_interval * 1000;

echo '<!doctype html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Livescore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="' . PL_PLUGIN_URL . '/css/style.css">
<link rel="stylesheet" href="' . PL_PLUGIN_URL . '/css/style-embed.css">
<script src="' . PL_PLUGIN_URL . '/js/jquery-1.11.1.min.js"></script>
<script>
jQuery(document).ready(function() {
    var rel = jQuery(".pl").attr("rel");
	jQuery("#online").load("' . PL_PLUGIN_URL . '/includes/pl-refresh.php?rel=" + rel);
	var refreshId = setInterval(function() {
		jQuery("#online").load("' . PL_PLUGIN_URL . '/includes/pl-refresh.php?randval=" + Math.random() + "&rel=" + rel);
	}, ' . $pl_refresh_interval . ');
});
</script>
</head>
<body>
<div id="online">' . __('Livescore is loading...', 'pl') . '</div>
</body>
</html>';
?>
