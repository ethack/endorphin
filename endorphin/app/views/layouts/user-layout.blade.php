<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Endorphin</title>

	[[ HTML::style('css/bootstrap.css') ]]
    [[ HTML::style('css/theme.css') ]]

    [[ HTML::style('css/endorphin-user-layout.css') ]]

	<link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.4/mapbox.css' rel='stylesheet' />

	<script type="text/javascript">
		window.endorphinConfig = {
			mapbox: {
				accessToken: "[[ Config::get('endorphin.mapbox.accessToken') ]]",
				mapId: "[[ Config::get('endorphin.mapbox.mapId') ]]"
			}
		};
	</script>
</head>
  <body ng-app="endorphin">

	@yield("content")

	[[ HTML::script('js/jquery.min.js') ]]
	[[ HTML::script('js/angular.min.js') ]]
	[[ HTML::script('js/angular-resource.min.js') ]]
	[[ HTML::script('js/angular-route.min.js') ]]

	[[ HTML::script('js/collapse.min.js') ]]

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	[[ HTML::script('js/ie10-viewport-bug-workaround.js') ]]

	<script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.4/mapbox.js'></script>

	[[ HTML::script('js/endorphin.min.js') ]]
	[[ HTML::script('js/endorphin-map.min.js') ]]

</body>
</html>
