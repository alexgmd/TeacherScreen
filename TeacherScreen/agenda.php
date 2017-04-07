<?php
	include("fonctions.inc.php");
	$prof = $_GET['prof'];
	$ical   = new ICal($prof.'.ics');
	$inter = $liste_intervenants[$prof];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<!-- FOR CALENDAR ELEMENTS -->
		<link href='css/fullcalendar.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='js/moment.min.js'></script>
		<script src='js/jquery.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/fr.js'></script>

		<!-- IMPORT STYLESHEET -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://fonts.googleapis.com/css?family=Lato:300i,400" rel="stylesheet">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<link rel="stylesheet" href="css/salle.css">
		<link href="css/bootstrap.css" rel="stylesheet">


        <!-- CALENDAR -->
		<script>
		<?php

		$events = $ical->events();
		?>
		$(document).ready(function() {

				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay',
						dayNames: ['Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday', 'Saturday'],
					},
					hiddenDays: [0],
					locale:'fr',
					buttonText: {
					    today:    'today',
					    month:    'month',
					    week:     'week',
					    day:      'day'
					},
					titleFormat:'D MMM YYYY',
					defaultView:'agendaWeek',
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					slotLabelFormat:'H:mm',
					allDaySlot:false,
					minTime:'07:00:00',
					maxTime:'21:00:00',
					eventStartEditable:false,
					eventDurationEditable:false,


						events: [
                <?php
                    foreach ($events as $event) {
                        $startyear = substr($event['DTSTART'],0,4);
                        $startmonth = substr($event['DTSTART'],4,2);
                        $startday = substr($event['DTSTART'],6,2);
                        $starthour = substr($event['DTSTART'],9,2);
                        $startmin = substr($event['DTSTART'],11,2);
                        $start = $startyear.'-'.$startmonth.'-'.$startday. 'T'.$starthour.':'.$startmin.':00';

                        $endyear = substr($event['DTEND'],0,4);
                        $endmonth = substr($event['DTEND'],4,2);
                        $endday = substr($event['DTEND'],6,2);
                        $endhour = substr($event['DTEND'],9,2);
                        $endmin = substr($event['DTEND'],11,2);
                        $end = $endyear.'-'.$endmonth.'-'.$endday. 'T'.$endhour.':'.$endmin.':00';


                        echo "{";
												echo "title:\"".$event['TITLE']."\",\n";
												echo "start:\"".$start."\",\n";
                        echo "start:\"".$start."\",\n";
                        echo "end:\"".$end."\"\n";
                        echo "},\n";
											}
				?>
					],
				 timeFormat: 'H:mm'


				});

			});
		</script>
	</head>

	<body style="color:white;">
		<!-- NAVIGATION -->
		<div id="agenda">
			<div class="demo-layout-transparent mdl-layout mdl-js-layout">
			  <header class="mdl-layout__header mdl-layout__header--transparent">
			    <div class="mdl-layout__header-row">
			      <!-- Title -->
			      <span class="mdl-layout-title">TeacherScreen</span>
			      <!-- Add spacer, to align navigation to the right -->
			      <div class="mdl-layout-spacer"></div>
			      <!-- Navigation -->
			      <nav class="mdl-navigation">
			        <a href="index.php" class="mdl-navigation__link">Accueil</a>
			        <a href="salle.php" class="mdl-navigation__link">L405</a>
			        <a href="about.php" class="mdl-navigation__link">About</a>
			      </nav>
			    </div>
			  </header>
			  <div class="mdl-layout__drawer">
			    <span class="mdl-layout-title">TeacherScreen</span>
			    <nav class="mdl-navigation">
			      <a href="home.php" class="mdl-navigation__link">Accueil</a>
			      <a href="salle.php" class="mdl-navigation__link">L405</a>
			      <a href="about.php" class="mdl-navigation__link">About</a>
			    </nav>
			  </div>
			</div>
		</div>

		<!-- PAGE CONTENT -->
		<div class="page-content">
			<div>
				<h1 align="center">Agenda de <?php echo $inter['nom']?></h1>
				<button class="bouton" style="background-color:#3a87ad;">
					<a href="./rdv.php?prof=<?=$prof?>" style="color:white;" >
						<span style="background-color:#3a87ad;">Prendre rendez-vous</span>
					</a>
				</button>
			</div>

			<div class="info">
				<div class="mdl-card__supporting-text">Statut:
				<?php
	               if (!isset($inter['ical_key'])) { ?>
	              <font color="grey"><b>Indisponible</b></font>
	                <?php
	                  } else {
	                     $occupe = etat_occupation_intervenant($inter);
	                    if($occupe == 'Disponible') { ?>
	                  <font color="green"><b><?php echo $occupe ?></b></font>
	                <?php } else { ?>
	                  <font color="#FF2B2B"><b><?php echo $occupe ?></b></font>
	                <?php }
	            } ?>
	            </div>
	            <div class="mdl-card__supporting-text">
								<?php display_msg($inter['email']) ?>
	            </div>
			</div>
			<div id='calendar'></div>
		</div>

	</body>
</html>
