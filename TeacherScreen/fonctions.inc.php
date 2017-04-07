<?php
	require 'class.iCalReader.php';
	ini_set('error_reporting',E_ALL); ini_set('display_errors','ON');

	$liste_intervenants = array(
			'Duhart' => array(
				'id' => 'Duhart',
				'nom' => 'Mr DUHART',
				'email' => 'duhart-devinci@gmail.com',
				'img' => 'img/duhart.jpg'
			),
			'Pineros' => array(
				'id' => 'Pineros',
				'nom' => 'Mme PINEROS',
				'email' => 'pineros-devinci@gmail.com',
				'img' => 'img/pineros.jpg'
			),
			'Dupuis' => array(
				'id' => 'Dupuis',
				'nom' => 'Mr DUPUIS',
				'email' => 'dupuis-devinci@gmail.com',
				'ical_key' => '41cdf2cd861bab46827a73fa847b50e6',
				'img' => 'img/dupuis.jpg'
			),
			'Guerard' => array(
				'id' => 'Guerard',
				'nom' => 'Mr GUERARD',
				'email' => 'guerard-devinci@gmail.com',
				'ical_key' => 'b5bc6fbdd923a78536b846b8b1f5afaf',
				'img' => 'img/guerard.jpg'
			),
			'Kallel' => array(
				'id' => 'Kallel',
				'nom' => 'Mr KALLEL',
				'email' => 'kallel-devinci@gmail.com',
				'ical_key' => '3988c7f88ebcb58c6ce932b957b6f332',
				'img' => 'img/kallel.jpg'
			),

			'Thai' => array(
				'id' => 'Thai',
				'nom' => 'Mme THAI',
				'email' => 'thai-devinci@gmail.com',
				'ical_key' => 'fdd1e361d5de6fbf55e11f9cb205145e',
				'img' => 'img/thai.jpg'
			)
		);

function etat_occupation_intervenant($intervenant) {
		$db = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');
		$retour = 'Disponible';
		$nom_fichier = $intervenant['id'].'.ics';

		if (!file_exists($nom_fichier)) {
			$url_cal = 'https://www.leonard-de-vinci.net/ical_intervenant/'.$intervenant['ical_key'];

			$ical = file_get_contents($url_cal);
			$fp = fopen($nom_fichier,"w");
			fwrite($fp,$ical);
			fclose($fp);

		}
		else {

			$req = $db->query('SELECT msg FROM membre WHERE email = "'.$intervenant['email'].'" ');
			while ($data = $req->fetch())
			{
				if($data['msg'] == 'Occupé'){
				$retour = 'Occupé';
			}  else {

			$ical   = new ICal($nom_fichier);
			$events = $ical->events();

			//$date_eng = strtotime(date('Y-m-d H:i'));
			$date_eng = strtotime('2017-03-17 12:00');

			// // SI passage en bdd on ne parcours pas l'ics mais uon requete la BDD
			//$req = "select * from aaaa where '2017-02-22 16:16' between start_int  AND end_int  ;";

			foreach ($events as $event) {

				$startyear = substr($event['DTSTART'],0,4);
				$startmonth = substr($event['DTSTART'],4,2);
				$startday = substr($event['DTSTART'],6,2);
				$starthour = substr($event['DTSTART'],9,2);
				$startmin = substr($event['DTSTART'],11,2);

				$start = $startday.'-'.$startmonth.'-'.$startyear. ' '.$starthour.':'.$startmin;

				$endyear = substr($event['DTEND'],0,4);
				$endmonth = substr($event['DTEND'],4,2);
				$endday = substr($event['DTEND'],6,2);
				$endhour = substr($event['DTEND'],9,2);
				$endmin = substr($event['DTEND'],11,2);

				$end = $endday.'-'.$endmonth.'-'.$endyear. ' '.$endhour.':'.$endmin;

				$start_int = strtotime($startyear.'-'.$startmonth.'-'.$startday. ' '.$starthour.':'.$startmin);

				$end_int = strtotime($endyear.'-'.$endmonth.'-'.$endday. ' '.$endhour.':'.$startmin);

				if ($date_eng>=$start_int && $date_eng<=$end_int) {
					$retour = 'Occupé';
					break;
				}
			}
		}
	}
	}
	return $retour;
}

function connexion($email, $mdp){

		try {
			$db = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');

			$req = $db->query('SELECT email, mdp FROM membre WHERE email = "'.$email.'" and mdp = "'.$mdp.'" ');

			while ($data = $req->fetch())
			{
				if($email == $data['email'] && $mdp == $data['mdp']){
					$connexion = true;
					return $connexion;
				} else {
					$connexion = false;
					return $connexion;
				}
			}

			$req->closeCursor();

		}
		catch (PDOException $e) {
        $fail = "Failed to get DB handle: " . $e->getMessage() . "\n";
				return $fail;
        }

	}

function save_msg ($msg, $email){

		$db = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');
		$db->exec('UPDATE membre SET msg = "'.$msg.'" WHERE email = "'.$email.'" ');

	}

function remove_msg($email){
		$db = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');
		$db->exec('UPDATE membre SET msg = "" WHERE email = "'.$email.'" ');
	}

function display_msg($email){

		$db = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');
		$req = $db->query('SELECT msg FROM membre WHERE email = "'.$email.'" ');

		while ($data = $req->fetch())
		{
			if($data['msg'] == '' || $data['msg'] == 'Occupé'){
				echo 'Aucun message';
			} else {
				echo $data['msg'];
			}
		}
	}
?>
