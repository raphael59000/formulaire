<?php

//errors 

if($_POST) {

	$errors = array();

//firstname
	if (empty($_POST['firstname'])) {
		$errors['emptyfirstname'] = "Merci de saisir votre nom.";
	}
	if (strlen($_POST['firstname']) < 2 || strlen($_POST['firstname']) > 32) {
		$errors['firstnamesize'] = "Votre nom doit contenir au minimum 2 lettres et au maximum 32.";
	}
//lastname
	if (empty($_POST['lastname'])) {
		$errors['emptylastname'] = "Merci de saisir votre prénom.";
	}
	if (strlen($_POST['lastname']) < 2 || strlen($_POST['lastname']) > 32) {
		$errors['lastnamesize'] = "Votre prénom doit contenir au minimum 2 lettres et au maximum 32.";
	}
//phone
	if (!preg_match ("#^0[1-9]([-. ]?[0-9]{2}){4}$#", $_POST['tel'])) {
		$errors['phonecheck'] = "Le numéro de téléphone n est pas valide";
	}
//email
	if (!preg_match( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['email'])) {
		$errors['emailcheck'] = "L'adresse eMail n'est pas valide.";
	}
//message
	if (empty($_POST['message'])) {
		$errors['emptymessage'] = "Merci de laisser un message.";
	}
	if (strlen($_POST['message']) > 256) {
		$errors['messagesize'] = "Le message ne doit pas excéder 256 caractères.";
	}
//list
	if (empty($_POST['list'])) {
		$errors ['emptylist'] = "Veuillez Selectionner un style de musique.";
	}
	elseif (count($errors) == 0) {
		echo "<center><h1>Bravo !</h1></center>";
		echo$_POST["firstname"] = " ";
		echo$_POST["lastname"] = " ";
		echo$_POST["email"] = " ";
		echo$_POST["tel"] = " ";
		echo$_POST["message"] = " ";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>

<form method="post" action="">
<!-- Firstname -->
    <label for="firstname">Prénom:</label>
    <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" placeholder="<?php if(isset($_POST['firstname'])) echo "ex: François"; ?>">
    <p><?php if(isset($errors['emptyfirstname'])) echo $errors['emptyfirstname']; ?></p>
    <p><?php if(isset($errors['firstnamesize'])) echo $errors['firstnamesize']; ?></p>

<!-- Lastname -->
    <label for="lastname">Nom:</label>
    <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>"placeholder="<?php if(isset($_POST['lastname'])) echo "ex: Duval"; ?>">
    <p><?php if(isset($errors['emptylastname'])) echo $errors['emptylastname']; ?></p>
    <p><?php if(isset($errors['lastnamesize'])) echo $errors['lastnamesize']; ?></p>

<!-- Phone -->
    <label for="tel">Telephone</label>
    <input type="tel" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>" placeholder="<?php if(isset($_POST['tel'])) echo "ex: 0600000000"; ?>">
    <p><?php if(isset($errors['phonecheck'])) echo $errors['phonecheck']; ?></p>
    
<!-- Email -->
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="<?php if(isset($_POST['email'])) echo "ex: francoisduval@gmail.com"; ?>">
    <p><?php if(isset($errors['emailcheck'])) echo $errors['emailcheck']; ?></p>

<!-- List -->
	<label>Style de musique</label>
    <select name="list">
	    <option value="rock">Rock</option>
	    <option value="blues">Blues</option>
	    <option value="jazz">Jazz</option>
	    <option value="punk">Punk</option>
	    <option value="grind">Grind</option>
    	<p><?php if(isset($errors['emptylist'])) echo $errors['emptylist']; ?></p>
  	</select>

  </br>
</br>

<!-- Message -->
	<label for="message">Message</label>
    <textarea name="message" value="<?php if(isset($_POST['message'])) echo $_POST['message']; ?>" placeholder="<?php if(isset($_POST['message'])) echo "ex: Bonjour à tous !"; ?>"></textarea>
    <p><?php if(isset($errors['emptymessage'])) echo $errors['emptymessage']; ?></p>
    <p><?php if(isset($errors['messagesize'])) echo $errors['messagesize']; ?></p>

<!-- Submit button -->
    <input type="submit" value="Envoyer">
 
  </form>

</body>
</html>


