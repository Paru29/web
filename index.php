<!DOCTYPE html>
<html>
<head>
	<title>file </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script data-require="jquery@*" data-semver="2.1.1" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body  ng-app="myApp" ng-controller="myCtrl">

<style type="text/css">
	.name{
		color:red;
		text-decoration: none!important;
	}
	.name:hover{
		color:red!important;
	}
	.color{
		color:#7a7a7a;

	}
	.color:hover{
		color:red!important;
	}
	input[type="checkbox"] {
		border: #ff0000 1px solid;
    	background: #002dff;

	}
	::-webkit-scrollbar {
	  width: 10px;
	}
	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #888; 
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
	*,*::before,*::after {
	  box-sizing: border-box;
	}

</style>


<div class="container-fluid">
<div class="row">
<div class="col-lg-12 pt-2" >
	
	<div class="input-group input-group-sm mb-3">
  		<div class="pt-1 pr-2 color"><i class="fas fa-chevron-circle-left" style="font-size:20px;"	></i></div>
  		<div class="pt-1 pr-2 color" ><i class="fas fa-chevron-circle-right"  style="font-size:20px;"></i></div>
  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
	</div>
</div>
<div class="col-lg-3" style="background-color: #fafafa;">
<nav class="nav nav-pills flex-column"  ng-init="dir()" >
		<a href  class="nav-link color " style="color:#7a7a7a;text-decoration: none!important;"><i class="fas fa-chevron-down "></i> <i class="fas fa-folder" ></i> /</a>
	<nav class="nav nav-pills  flex-column" ng-repeat="x in dir">
		<a href  class="nav-link ml-3 my-0 color" style="text-decoration: none!important;"><i class="fas fa-angle-right"></i> <i class="fas fa-folder" style="margin-right:5px;"></i> {{x.name}}</a>
	</nav>
</nav>
</div>

<div class="col-lg-9" >
<div style="overflow: scroll;width: 100%;height: 100vh;">
<table class="table table " >
  <thead>
    <tr>
      <th scope="col" class="name"><input type="checkbox" ng-click='checkAll()'></th>
      <th scope="col">Name</th>
      <th scope="col">Size</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody ng-init="file()">
	<tr ng-repeat="x in dir" ng-right-click="ShowContextMenu()" context="context1">
      <th scope="row" class="name"><input type="checkbox" name="{{x.name}}>" ng-click="selectAll($parent.fileList)"></th>
	  <td ><a href class="name"><i class="fas fa-folder" style="margin-right:5px;"  ng-click="multipleSelect(x, $event)"></i>{{x.name}}</a></td>
      <td  ng-click="multipleSelect(x, $event)"></td>
      <td  ng-click="multipleSelect(x, $event)"></td>
    </tr>
	<tr ng-repeat="x in file" ng-right-click="ShowContextMenu()" context="context1"> 
      <th scope="row" class="name"><input type="checkbox" name="{{x.name}}>" ng-checked="checkall" ></th>
      <td class="name"><i class="fas fa-file" style="margin-right:5px;"></i> {{x.name}}</td>
      <td>{{x.size}}</td>
      <td>{{x.modify}}</td>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<ul id="context1" class="dropdown-menu" role='menu'> 
  <li><a ng-click="edit()">Edit</a></li>
  <li><a ng-click="link()">Link</a></li>
  <li><a ng-click="delete()">Delete</a></li>
  <li class="divider"></li>
  <li><a ng-click="properties()">Properties</a></li>
</ul>


<script type="text/javascript">
	var app = angular.module('myApp', []);
	app.controller('myCtrl', function($scope, $http) {
		$scope.dir = function(){
	  		$http.get("dir.php").then(function(response) {
		   		$scope.dir = response.data;
			});
	 	}
		$scope.file = function(){
	  		$http.get("file.php").then(function(response) {
				$scope.file = response.data;
			});
		}  	
	});
</script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>