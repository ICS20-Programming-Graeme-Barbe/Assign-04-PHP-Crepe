<html lang="en-ca">
	<head>
		<!-- Meta Data -->
		<meta charset="utf-8" />
	    <meta name="description" content="Egg price" />
	    <meta name="keywords" content="immaculata, ics2o" />
	    <meta name="author" content="Graeme" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Favicon -->
	    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
	    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
	    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
	    <link rel="manifest" href="./fav_index/site.webmanifest" />
		<!-- Google MDL -->
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-deep_orange.min.css" />	
		<!-- Css style sheet -->
		<link rel="stylesheet"dfghj href="./css/style.css" />
		<title>Graeme's Diner</title>
	</head>
	<body>
		<!-- MDL Header -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	    	<header class="mdl-layout__header">
		        <div class="mdl-layout__header-row">
		        	<span class="mdl-layout-title">GRAEME'S DINER</span>
		        </div>
	    	</header>
		
			<!-- Title, Info and image -->
			<center><?php 
				echo "<center><h5>Welcome to Graeme's diner. Unfortunately the only thing we serve here is eggs. Please enter you order below and find out the cost.</h5>";
				echo '<img src=./images/Eggs.jpg width="15%">';
			?>
	
			<!-- Form for selections -->
			<form method = "post">   
				
				<!--  Drop down menu for how you would like your eggs -->
				<h5>How would you like your eggs cooked?</h5>
				<select name="eggs" id="eggs">
					<option value="">How would you like your eggs?</option>
					<option value = "sunnySideUp">Sunny Side Up</option>
					<option value = "overEasy">Over Easy</option>
					<option value = "Scrambled">Scrambled</option>
					<option value = "Omelette">Omelette</option>
				</select>
				<br>

				<!-- Drop down menu for number of eggs -->
				<br>
				<h5>How many eggs would you like?</h5>
				<select name="numberOfEggs" id="numberOfEggs">
					<option value="">Number of eggs</option>
					<option value = "two">2</option>
					<option value = "three">3</option>
					<option value = "four">4</option>
					<option value = "five">5</option>
				</select>
				<br>

				<!-- Checkbox for toppings -->
				<br>
				<h5>Would you like toppings with your eggs?</h5>
				<input type="checkbox" id="Bacon" name="toppings" value="Bacon">
				<label for="Bacon">Bacon</label>
				<input type="checkbox" id="Cheese" name="toppings" value="Cheese">
				<label for="Bacon">Cheese</label>
				<input type="checkbox" id="Spinach" name="toppings" value="Spinach">
				<label for="Spinach">Spinach</label>
				<input type="checkbox" id="redPepper" name="toppings" value="redPepper">
				<label for="redPepper">Red Pepper</label>
				<input type="checkbox" id="Ham" name="toppings" value="Ham">
				<label for="Ham">Ham</label>
				<br>

				<!-- Radio buttons for drink -->
				<br>
				<h5>Would you like a drink?</h5>
				<input type="radio" id="No" name="drink" value="No" checked>
				<label for="No">No</label>
				<input type="radio" id="Milkshake" name="drink" value="Milkshake">
				<label for="Milkshake">Milkshake</label>
				<input type="radio" id="Coffee" name="drink" value="Coffee">
				<label for="Coffee">Coffee</label>
				<input type="radio" id="Tea" name="drink" value="Tea">
				<label for="Tea">Tea (Black or Herbal)</label>
				<br>

				<!-- Button -->
				<br>
				<input type = "submit" name = "submit" value="Submit">
			</form>
			<br>
				
			<!-- Variables and Calculations -->
			<?php  
				if(isset($_POST['submit'])) {  
					//Constants
					define("HST", 0.13);
					define("TOPPING_COST", 2.99);
					define("SUNNY_SIDE_UP", 3.00);
					define("OVER_EASY", 3.00);
					define("SCRAMBLED", 3.99);
					define("OMELETTE", 4.50);
					define("TWO_EGGS", 3.00);
					define("THREE_EGGS", 4.50);
					define("FOUR_EGGS", 6.00);
					define("FIVE_EGGS", 7.50);
					define("NO_DRINK", 0);
					define("MILKSHAKE", 6.99);
					define("COFFEE", 2.50);
					define("TEA", 2.50);

					//Variables
					$typeOfEggs = $_POST['eggs'];
					$numberOfEggs = $_POST['numberOfEggs'];
					$drink = $_POST['drink'];
					$numToppings = 0;
					
					//Initializes variables
					$eggType;
					$numEggs;
					$drinkPrice;


					if(isset($_POST['Bacon'])) {
						$numToppings++;
					}

					if(isset($_POST['Cheese'])) {
						$numToppings++;
					}

					if(isset($_POST['Spinach'])) {
						$numToppings++;
					}
					
					if(isset($_POST['redPepper'])) {
						$numToppings++;
					}

					if(isset($_POST['Ham'])) {
						$numToppings++;
					}

					$costToppings = $numToppings * TOPPING_COST;
					
					if ($typeOfEgg != "") {
						if ($numberOfEggs != "") {
							
							//If statement for how you would like your eggs cooked
							if ($typeOfEggs == "sunnySideUp") {
								$eggType = SUNNY_SIDE_UP;
							} else if ($typeOfEggs == "overEasy") {
								$eggType = OVER_EASY;
							} else if ($typeOfEggs == "Scrambled") {
								$eggType = SCRAMBLED;
							} else {
								$eggType = OMELETTE;
							}

							//If statement for number of eggs
							if ($numberOfEggs == "two") {
								$numEggs = TWO_EGGS;
							} else if ($numberOfEggs == "three") {
								$numEggs = THREE_EGGS;
							} else if ($numberOfEggs == "four") {
								$numEggs = FOUR_EGGS;
							} else {
								$numEggs = FIVE_EGGS;
							}

							//If statement for drink
							if ($drink == "No") {
								$drinkPrice = NO_DRINK;
							} else if ($drink == "Milkshake") {
								$drinkPrice = MILKSHAKE;
							} else if ($drink == "Coffee") {
								$drinkPrice = COFFEE;
							} else {
								$drinkPrice = TEA;
							}

							//Calculations
							$subtotal = $eggType + $numEggs + $costToppings + $drinkPrice;
							$tax = $subtotal * $HST;
							$total = $subtotal + $tax;

							//Displays subtotal, tax, total
							echo "<br><h5>Your subtotal is $" . $subtotal;
							echo "<br><h5>Your tax is $" . $tax;
							echo "<br><h5>Your total is $" . $total;
							
						} else {
							echo "<br><p>Please select how many eggs you would like.";
						}
					} else {
						echo "<br><p>Please select how you would like your eggs cooked.";
					}
					
				}
			?>
		</div>
	</body>
</html>