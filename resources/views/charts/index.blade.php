@extends('layouts.one_col')

@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div id="countHousesByCitiesChart" class="chart"></div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div id="countResourcesByQuantityChart" class="chart"></div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div id="ratioResourceByQuantityChart" class="chart"></div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div id="countCitiesByQuantityAndHousesSellChart" class="chart"></div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div id="countCitiesByQuantityAndHousesRentChart" class="chart"></div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div id="countCitiesByQuantityAndProjectsChart" class="chart"></div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div id="countCitiesByQuantityAndDesignsChart" class="chart"></div>
	</div>
</div>
@stop

@section('style')
	<style>
		.chart{border: 1px solid #31B0D5;}
	</style>
@stop

@section('jshead')

	<script src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://www.google.com/jsapi"></script>
	<script>
    google.charts.load('current', {'packages':['corechart', 'geochart']});
    google.charts.setOnLoadCallback(countHousesByCities);
    google.charts.setOnLoadCallback(countResourcesByQuantity);
    google.charts.setOnLoadCallback(ratioResourceByQuantity);
    google.charts.setOnLoadCallback(countCitiesByQuantityAndHousesSell);
    google.charts.setOnLoadCallback(countCitiesByQuantityAndHousesRent);
    google.charts.setOnLoadCallback(countCitiesByQuantityAndProjects);
    google.charts.setOnLoadCallback(countCitiesByQuantityAndDesigns);


    var colors = ['#3366CC', '#DC3912', '#FF9900', '#109618', '#990099', '#0099C6', '#DD4477', '#66AA00', '#B82E2E', '#316395'];
    var columnChartOptions = {
        bar: { groupWidth: '50%' },
        legend: {position: 'none'}
    };
    var PieChartOptions = {
        is3D: true
    }
    
    function countHousesByCities() {
        var countHousesByCities = <?php echo $countHousesByCities ?>;
        var data = [
            ['State', 'Value', {type:'string', role:'tooltip'}]
        ];
        countHousesByCities.forEach(function(element){
            var obj = {v:element.code, f:element.name};
            data.push([obj, element.aggregate, element.aggregate + ' ']);
        });
        var geochart = new google.visualization.GeoChart(document.getElementById('countHousesByCitiesChart'));
        geochart.draw(google.visualization.arrayToDataTable(data), {
            region: 'VN',
            displayMode: 'regions',
            resolution: 'provinces',
            datalessRegionColor: '#F8F8F8', // the color to assign to regions with no associated data.
        });
    };
    
    function countResourcesByQuantity() {
        var countResourcesByQuantity = <?php echo $countResourcesByQuantity ?>;
        var data = [
            ['Resource',	'Quantity',					{ role: 'style' }],
            ['NHÀ ĐẤT BÁN',	countResourcesByQuantity[0], colors[0]],
            ['CHO THUÊ',	countResourcesByQuantity[1], colors[1]],
            ['DỰ ÁN',		countResourcesByQuantity[2], colors[2]],
            ['DỊCH VỤ',		countResourcesByQuantity[3], colors[3]]
        ];
        
        var barchart = new google.visualization.ColumnChart(document.getElementById('countResourcesByQuantityChart'));
        barchart.draw(google.visualization.arrayToDataTable(data), columnChartOptions);
    }
    
    function ratioResourceByQuantity() {
        var ratioResourceByQuantity = <?php echo $ratioResourceByQuantity ?>;
        var data = [
            ['Resource',	'Quantity'],
            ['NHÀ ĐẤT BÁN',	ratioResourceByQuantity[0]],
            ['CHO THUÊ',	ratioResourceByQuantity[1]],
            ['DỰ ÁN',		ratioResourceByQuantity[2]],
            ['DỊCH VỤ',		ratioResourceByQuantity[3]]
        ];
        
        var piechart = new google.visualization.PieChart(document.getElementById('ratioResourceByQuantityChart'));
        piechart.draw(google.visualization.arrayToDataTable(data), PieChartOptions);
    }
    
    function countCitiesByQuantityAndHousesSell() {
        var data = [
            ['Resource', 'Quantity']
        ];
        var countCitiesByQuantityAndHousesSell = <?php echo $countCitiesByQuantityAndHousesSell ?>;
        countCitiesByQuantityAndHousesSell.forEach(function(element){
            data.push([element.name, element.aggregate]);
        });
        
        var barchart = new google.visualization.ColumnChart(document.getElementById('countCitiesByQuantityAndHousesSellChart'));
        barchart.draw(google.visualization.arrayToDataTable(data), columnChartOptions);
    }
    
    function countCitiesByQuantityAndHousesRent() {
        var data = [
            ['Resource', 'Quantity']
        ];
        var countCitiesByQuantityAndHousesRent = <?php echo $countCitiesByQuantityAndHousesRent ?>;
        countCitiesByQuantityAndHousesRent.forEach(function(element){
            data.push([element.name, element.aggregate]);
        });
        
        var barchart = new google.visualization.ColumnChart(document.getElementById('countCitiesByQuantityAndHousesRentChart'));
        barchart.draw(google.visualization.arrayToDataTable(data), columnChartOptions);
    }
    
    function countCitiesByQuantityAndProjects() {
        var data = [
            ['Resource', 'Quantity']
        ];
        var countCitiesByQuantityAndProjects = <?php echo $countCitiesByQuantityAndProjects ?>;
        countCitiesByQuantityAndProjects.forEach(function(element){
            data.push([element.name, element.aggregate]);
        });
        
        var barchart = new google.visualization.ColumnChart(document.getElementById('countCitiesByQuantityAndProjectsChart'));
        barchart.draw(google.visualization.arrayToDataTable(data), columnChartOptions);
    }

    function countCitiesByQuantityAndDesigns() {
        var data = [
            ['Resource', 'Quantity']
        ];
        var countCitiesByQuantityAndDesigns = <?php echo $countCitiesByQuantityAndDesigns ?>;
        countCitiesByQuantityAndDesigns.forEach(function(element){
            data.push([element.name, element.aggregate]);
        });
        
        var barchart = new google.visualization.ColumnChart(document.getElementById('countCitiesByQuantityAndDesignsChart'));
        barchart.draw(google.visualization.arrayToDataTable(data), columnChartOptions);
    }
    </script>
@stop