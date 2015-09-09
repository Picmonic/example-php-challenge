

<div ng-app="app" ng-controller="Main as main">

<table>
  <thead>
    <tr>
      <th width="50">Index</th>
      <th width="200">Author</th>
      <th>Table Header</th>      
    </tr>
   </thead>

   <tbody>
	<tr ng-repeat="commit in gitdata track by $index" 
		ng-show="$index<25" 
		ng-class='main.endsWithNumber(commit.sha) ? "success" : "error"'>
 		<td>{{ $index }} </td>
 		<td> {{ commit.author.login }}</td>
 		<td>{{ commit.sha }} </td>
	</tr>
	</tbody>
</table>
</section>
