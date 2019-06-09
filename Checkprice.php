<?php
include(dirname(__FILE__).'/Customer.php');
$currentCustomer=new Customer();


global $wpdb;



if(!isset($wpdb))
{
    include_once('wp-config.php');
    include_once('./wp-includes/wp-db.php');
}


if(!empty($_POST)){

		$currentCustomer->hydrate(
			$_POST['group8'],
			$_POST['group9'],
			$_POST['group10'],
			$_POST['group11'],
			$_POST['group1'],
			$_POST['group2'],
			$_POST['group3'],
			$_POST['group4'],
			$_POST['group5'],
			$_POST['group6']
		);


		$currentCustomer->persist();

		$currentCustomer->retrieve($_POST['group9'],$_POST['group10'],$_POST['group11']);

		$currentCustomer->checkPrice();



		$currentCustomer->sendMail('admin.admin@admin.fr');

		echo "<script>M.toast({html:'Votre demande a bien été prise en compte, nous vous recontacterons!'});</script>"; 
	


};
?>