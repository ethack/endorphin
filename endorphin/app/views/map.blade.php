@extends("layouts/user-layout")
@section("content")

<div id="map"></div>

<div class="container" ng-controller="endorphinMapController">
	<div class="navbar navbar-default navbar-map" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">[[Lang::get('keywords.toggle_navigation')]]</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand navbar-logo-brand" href="#">
					<img class="navbar-logo img-responsive" src="/images/logo.png">
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="[[ URL::route("/") ]]">[[Lang::get('keywords.map')]]</a></li>
					<li><a href="[[ URL::route("user/logout") ]]">[[Lang::get('keywords.sign_out')]]</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</div>

</div>

@stop