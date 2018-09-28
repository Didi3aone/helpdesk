<?php 
	$this->load->model("Dynamic_model");

	$params = $this->Dynamic_model->set_model("tbl_complain","tc","ComplainId")->get_all_data(array(
		"select" => "
				COUNT(IF(tc.ComplainToId = 1, tc.ComplainId,null)) as keuangan,
				COUNT(IF(tc.ComplainToId = 2,tc.ComplainId,null)) as kemahasiswaan,
				MONTHNAME(tc.ComplainCreatedDate) as m",
		"conditions" => array(),
		"group_by"	 => array("MONTHNAME(tc.ComplainCreatedDate)")
	))['datas'];
?>
<script type="text/javascript">
	$(document).ready(function() {
	 	var data = <?= json_encode($params)?>;
	 	console.log(data);
		/* DO NOT REMOVE : GLOBAL FUNCTIONS!
		 *
		 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
		 *
		 * // activate tooltips
		 * $("[rel=tooltip]").tooltip();
		 *
		 * // activate popovers
		 * $("[rel=popover]").popover();
		 *
		 * // activate popovers with hover states
		 * $("[rel=popover-hover]").popover({ trigger: "hover" });
		 *
		 * // activate inline charts
		 * runAllCharts();
		 *
		 * // setup widgets
		 * setup_widgets_desktop();
		 *
		 * // run form elements
		 * runAllForms();
		 *
		 ********************************
		 *
		 * pageSetUp() is needed whenever you load a page.
		 * It initializes and checks for all basic elements of the page
		 * and makes rendering easier.
		 *
		 */
		
		 pageSetUp();
		 
		/*
		 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
		 * eg alert("my home function");
		 * 
		 * var pagefunction = function() {
		 *   ...
		 * }
		 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
		 * 
		 * TO LOAD A SCRIPT:
		 * var pagefunction = function (){ 
		 *  loadScript(".../plugin.js", run_after_loaded);	
		 * }
		 * 
		 * OR
		 * 
		 * loadScript(".../plugin.js", run_after_loaded);
		 */

		 // reference: http://www.chartjs.org/docs/

		// LINE CHART
		// ref: http://www.chartjs.org/docs/#line-chart-introduction
	    var lineOptions = {
		    ///Boolean - Whether grid lines are shown across the chart
		    scaleShowGridLines : true,
		    //String - Colour of the grid lines
		    scaleGridLineColor : "rgba(0,0,0,.05)",
		    //Number - Width of the grid lines
		    scaleGridLineWidth : 1,
		    //Boolean - Whether the line is curved between points
		    bezierCurve : true,
		    //Number - Tension of the bezier curve between points
		    bezierCurveTension : 0.4,
		    //Boolean - Whether to show a dot for each point
		    pointDot : true,
		    //Number - Radius of each point dot in pixels
		    pointDotRadius : 4,
		    //Number - Pixel width of point dot stroke
		    pointDotStrokeWidth : 1,
		    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		    pointHitDetectionRadius : 20,
		    //Boolean - Whether to show a stroke for datasets
		    datasetStroke : true,
		    //Number - Pixel width of dataset stroke
		    datasetStrokeWidth : 2,
		    //Boolean - Whether to fill the dataset with a colour
		    datasetFill : true,
		    //Boolean - Re-draw chart on page resize
	        responsive: true,
		    //String - A legend template
		    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
	    };
	    <?php 
	    	foreach( $params as $val ) 
	    	{ 
	    		$line = $val['m'];
	    		$data_k = $val['keuangan'];
	    		$data_u = $val['kemahasiswaan'];
	    	}
    	 ?>

			    var lineData = 
			    { 
			    	labels: ["<?php echo $line; ?>",","],
			        datasets: [
				        {
				            label: "My First dataset",
				            fillColor: "rgba(220,220,220,0.2)",
				            strokeColor: "rgba(220,220,220,1)",
				            pointColor: "rgba(220,220,220,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(220,220,220,1)",
				            data: [<?= $data_k.","; ?>]
				        },
				        {
				            label: "My Second dataset",
				            fillColor: "rgba(151,187,205,0.2)",
				            strokeColor: "rgba(151,187,205,1)",
				            pointColor: "rgba(151,187,205,1)",
				            pointStrokeColor: "#fff",
				            pointHighlightFill: "#fff",
				            pointHighlightStroke: "rgba(151,187,205,1)",
				            data: [<?= $data_u; ?>]
				        }
				    ]
			    };
			  //   <?php
		   //  } 
	    // ?>

	    // render chart
	    var ctx = document.getElementById("lineChart").getContext("2d");
	    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
	    // END LINE CHART
	});		
</script>