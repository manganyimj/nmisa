<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSIR - BoardRoom Booking</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
 </head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
           
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>BoardRoom Booking</h1>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Boardroom</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose Boardroom</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Building 2</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Building 3</option>
						  <option style="color:#008000;" value="#008000">&#9724; Building 5</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Building 9</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Building 10</option>
						  <option style="color:#669933;" value="#669933">&#9724; Building 11</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Building 12</option>
						  <option style="color:#000;" value="#000">&#9724; Building 14</option>
						  <option style="color:#C0C0C0;" value="#C0C0C0">&#9724; Building 17</option>
						  <option style="color:#993399;" value="#993399">&#9724; Building 18</option>
						  <option style="color:#008080;" value="#008080">&#9724; Building 19</option>
						  <option style="color:#DAA520;" value="#DAA520">&#9724; Building 20</option>
						  <option style="color:#708090;" value="#708090">&#9724; Building 22</option>
						  <option style="color:#87CEFA;" value="#87CEFA">&#9724; Building 23</option>
						  <option style="color:#7B68EE;" value="#7B68EE">&#9724; Building 33</option>
						  <option style="color:#FFDAB9;" value="#FFDAB9">&#9724; Building 34</option>
						  <option style="color:#FF3366;" value="#FF3366">&#9724; Building 35</option>
						  <option style="color:#66CCCC;" value="#66CCCC">&#9724; Building 37</option>
						  <option style="color:#00CC33;" value="#00CC33">&#9724; Building 39</option>
						  <option style="color:#FFCCCC;" value="#FFCCCC">&#9724; Building 41</option>
						  <option style="color:#33CCCC;" value="#33CCCC">&#9724; Building 44</option>
						  <option style="color:#CCCCCC;" value="#FF3366">&#9724; Building 45</option>
						  <option style="color:#99FFCC;" value="#99FFCC">&#9724; Building 46</option>
						  <option style="color:#33CCFF;" value="#33CCFF">&#9724; Building 46</option>						  
						</select>
					</div>
				  </div>
				   <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-2">
					 <input id="meeting" type="date" value=""/>
                     </script>
					</div>
				  </div><div class="form-group">
					<label for="start" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-2">
					 <input id="meeting" type="date" value=""/>
                     </script>
					</div>
				  </div>  
				 				  
				 <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-2">
					 <input id="meeting" type="time" value=""/>
                     </script>
					</div>
				  </div><div class="form-group">
					<label for="start" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-2">
					 <input id="meeting" type="time" value=""/>
                     </script>
					</div>
				  </div>  
				 			
			  </div>
			  
			  <input type="date">


			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Boardroom</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						   <option value="">Choose Boardroom</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Building 2</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Building 3</option>
						  <option style="color:#008000;" value="#008000">&#9724; Building 5</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Building 9</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Building 10</option>
						  <option style="color:#669933;" value="#669933">&#9724; Building 11</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Building 12</option>
						  <option style="color:#000;" value="#000">&#9724; Building 14</option>
						  <option style="color:#C0C0C0;" value="#C0C0C0">&#9724; Building 17</option>
						  <option style="color:#993399;" value="#993399">&#9724; Building 18</option>
						  <option style="color:#008080;" value="#008080">&#9724; Building 19</option>
						  <option style="color:#DAA520;" value="#DAA520">&#9724; Building 20</option>
						  <option style="color:#708090;" value="#708090">&#9724; Building 22</option>
						  <option style="color:#87CEFA;" value="#87CEFA">&#9724; Building 23</option>
						  <option style="color:#7B68EE;" value="#7B68EE">&#9724; Building 33</option>
						  <option style="color:#FFDAB9;" value="#FFDAB9">&#9724; Building 34</option>
						  <option style="color:#FF3366;" value="#FF3366">&#9724; Building 35</option>
						  <option style="color:#66CCCC;" value="#66CCCC">&#9724; Building 37</option>
						  <option style="color:#00CC33;" value="#00CC33">&#9724; Building 39</option>
						  <option style="color:#FFCCCC;" value="#FFCCCC">&#9724; Building 41</option>
						  <option style="color:#33CCCC;" value="#33CCCC">&#9724; Building 44</option>
						  <option style="color:#CCCCCC;" value="#FF3366">&#9724; Building 45</option>
						  <option style="color:#99FFCC;" value="#99FFCC">&#9724; Building 46</option>
						  <option style="color:#33CCFF;" value="#33CCFF">&#9724; Building 46</option>
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '2016-01-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});

</script>

</body>

</html>
