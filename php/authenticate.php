<?php
if(!session_id()) {
	session_start();
}

// connect to database
$con = mysqli_connect('localhost', 'root', '', 'chleong');
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

// variable declaration
$errors = array(); 

// REGISTER USER
if (isset($_POST['register'])) {
	// call these variables with the global keyword to make them available in function
	global $con, $errors;

    // defined below to escape form values
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	// form validation: ensure that the form is correctly filled
	if (empty($email)) { 
		array_push($errors, "Email cannot be blank");
        $_SESSION['email'] = "Email cannot be blank";
	}
	if (empty($password)) { 
		array_push($errors, "Make sure you enter a password.");
        $_SESSION['password'] = "Make sure you enter a password.";
	}
  
	// register user if there are no errors in the form
	if (count($errors) == 0) {
        // first check user from the database
        $result = mysqli_query($con, "SELECT * FROM users WHERE userEmail='$email' LIMIT 1");
        if(mysqli_num_rows($result) == 0)  {
            $username = strstr($email, '@', true);
            $password = md5($password);//encrypt the password before saving in the database
            mysqli_query($con, "INSERT INTO users (username, userPass, userEmail) VALUES('$username', '$password', '$email')");

            // get id of the created user
		    $results = mysqli_query($con, "SELECT * FROM users WHERE userEmail='$email' AND userPass='$password' LIMIT 1");
            $logged_in_user = mysqli_fetch_assoc($results);

            $_SESSION['user'] = $logged_in_user; // put logged in user in session
            $_SESSION['success']  = "You are now logged in";

			//Each user gets a cart
			mysqli_query($con, "INSERT INTO cart (userID) VALUES('".$_SESSION['user']['userID']."')");
            header('location: index.php');	
        } else {
            array_push($errors, "Email already registered!");
            $_SESSION['email'] = "Email already registered!";
        }			
	}
}

// LOGIN USER
if (isset($_POST['login'])) {
    global $con, $errors;

	// grab form values
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email cannot be blank");
        $_SESSION['email'] = "Email cannot be blank";
	}
	if (empty($password)) {
		array_push($errors, "Make sure you enter a password.");
        $_SESSION['password'] = "Make sure you enter a password.";
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);
		$results = mysqli_query($con, "SELECT * FROM users WHERE userEmail='$email' AND userPass='$password' LIMIT 1");

		if (mysqli_num_rows($results) == 1) { // user found
			$logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');
		} else {
			array_push($errors, "Wrong email or password");
            $_SESSION['email'] = "Double check your email and try again.";
            $_SESSION['password'] = "Wrong email or password";
		}
	}
}

if (isset($_POST['rename'])) {
	global $con, $errors;

	$username = mysqli_real_escape_string($con, $_POST['username']);
	if (empty($username)) {
		array_push($errors, "Username cannot be blank");
        $_SESSION['username'] = "Username cannot be blank";
	}

	if(count($errors) == 0) {
		mysqli_query($con, "UPDATE users SET username='$username' WHERE userEmail='".$_SESSION['user']['userEmail']."'");
		$_SESSION['user']['username'] = $username;
	}
}

if (isset($_POST['pass-change'])) {
	global $con, $errors;

	$password1 = mysqli_real_escape_string($con, $_POST['password1']);
	$password2 = mysqli_real_escape_string($con, $_POST['password2']);
	if (empty($password1)) {
		array_push($errors, "New password cannot be blank");
        $_SESSION['password1'] = "New password cannot be blank";
	} else if (empty($password2) || $password1<>$password2) {
		array_push($errors, "Passwords does not match");
        $_SESSION['password2'] = "Passwords does not match";
	}

	if(count($errors) == 0) {
		$password = md5($password1);
		mysqli_query($con, "UPDATE users SET userPass='$password' WHERE userEmail='".$_SESSION['user']['userEmail']."'");
		$_SESSION['user']['userPass'] = $password;
	}
}

if (isset($_POST['add-to-cart'])) {
	global $con, $errors;

	if(!isset($_SESSION["user"])) {
        header('Location:login.php');
    } else {
		$id = mysqli_real_escape_string($con, $_POST['id']);
		$quantity = mysqli_real_escape_string($con, $_POST['quantity']);

		if (empty($id)) {array_push($errors, "New password cannot be blank");}
		if (empty($quantity)) {array_push($errors, "Passwords does not match");}

		if(count($errors) == 0) {
			$results = mysqli_query($con, "SELECT * FROM cart WHERE userID='".$_SESSION['user']['userID']."' LIMIT 1");
			// if (mysqli_num_rows($results) == 0) {
			// 	mysqli_query($con, "INSERT INTO cart (userID) VALUES('".$_SESSION['user']['userID']."')");
			// 	$results = mysqli_query($con, "SELECT * FROM cart WHERE userID='".$_SESSION['user']['userID']."' LIMIT 1");
			// }
			$cart = mysqli_fetch_array($results);

			$result = mysqli_query($con, "SELECT * FROM cart_items WHERE variantID='$id' AND cartID='".$cart['cartID']."' LIMIT 1");
			if (mysqli_num_rows($result) == 1) {
				$product = mysqli_fetch_array($result);
				$quantity += $product['quantity'];
				mysqli_query($con, "UPDATE cart_items SET quantity='$quantity' WHERE variantID='$id' AND cartID='".$cart['cartID']."'");
			} else {
				mysqli_query($con, "INSERT INTO cart_items (cartID, variantID, quantity) VALUES('".$cart['cartID']."', '$id', '$quantity')");
			}
		}
	}
}

if (isset($_POST['quantity-change'])) {
	$id_array = $_POST['id'];
	$quantity_array = $_POST['quantity'];

	foreach($id_array as $index => $id) {
		foreach($quantity_array as $index2 => $quantity) {
			if($index==$index2) {
				if ($quantity<1 || $quantity>99) {array_push($errors, "Invalid Quantity");}
				if (empty($quantity)) {array_push($errors, "Quantity Cant be empty");}
				if(count($errors) == 0) {
					$results = mysqli_query($con, "SELECT * FROM cart WHERE userID='".$_SESSION['user']['userID']."' LIMIT 1");
					$cart = mysqli_fetch_array($results);
					mysqli_query($con, "UPDATE cart_items SET quantity='$quantity' WHERE variantID='$id' AND cartID='".$cart['cartID']."'");
				}
			}
		}
	}
}

if(isset($_POST['remove-item'])) {
	$id = mysqli_real_escape_string($con, $_POST['remove-item']);
	mysqli_query($con, "DELETE FROM cart_items WHERE variantID='$id'");
}
?>