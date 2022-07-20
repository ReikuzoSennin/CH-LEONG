<?php
if(!session_id()) {
	session_start();
}

// // connect to database
// $con = oci_connect('localhost', 'root', '', 'chleong');
// if (oci_connect_errno()){
//     echo "Failed to connect to MySQL: " . oci_connect_error();
//     die();
// }

// Create connection to Oracle
$con = oci_connect("chleong", "system", "localhost/xe", "AL32UTF8");

if (!$con) {
    $m = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// variable declaration
$errors = array(); 

// REGISTER USER
if (isset($_POST['register'])) {
	// call these variables with the global keyword to make them available in function
	global $errors;

    // defined below to escape form values
	$email = $_POST['email'];
	$password = $_POST['password'];

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
        $result = oci_parse($con, "SELECT * FROM users WHERE userEmail='$email'");
        oci_execute($result);
        $nrows = oci_fetch_all($result, $res);
        if($nrows == 0)  {
            $username = strstr($email, '@', true);
            $password = md5($password);//encrypt the password before saving in the database
            $sql = "INSERT INTO users (username, userPass, userEmail) VALUES('$username', '$password', '$email')";
            $result = oci_parse($con, $sql);
            oci_execute($result);

            // get id of the created user
            $sql = "SELECT * FROM users WHERE userEmail='$email' AND userPass='$password'";
		    $results = oci_parse($con, $sql);
            oci_execute($results);
            $nrows = oci_fetch_all($results, $res);
            $logged_in_user = $res;

            $_SESSION['user'] = $logged_in_user; // put logged in user in session
            $_SESSION['success']  = "You are now logged in";

			//Each user gets a cart
            $sql = "INSERT INTO cart (userID) VALUES('".$_SESSION['user']['USERID'][0]."')";
			$results = oci_parse($con, $sql);
            oci_execute($results);
            header('location: index.php');	
        } else {
            array_push($errors, "Email already registered!");
            $_SESSION['email'] = "Email already registered!";
        }			
	}
}

// LOGIN USER
if (isset($_POST['login'])) {
    global $errors;

	// grab form values
	$email = $_POST['email'];
	$password = $_POST['password'];

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
        $sql = "SELECT * FROM users WHERE USEREMAIL='".$email."' AND USERPASS='".$password."'";
		$results = oci_parse($con, $sql);
        oci_execute($results);
        $nrows = oci_fetch_all($results, $res);
		if ($nrows == 1) { // user found
			$logged_in_user = $res;
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
            if ($logged_in_user['USERTYPE'][0] == 'Admin') {
                echo '<script>window.location.href="admin.php";</script>';
                // header('location: admin.php');
            } else {
                echo '<script>window.location.href="index.php";</script>';
                // header('location: index.php');
            }
		} else {
			array_push($errors, "Wrong email or password");
            $_SESSION['email'] = "Double check your email and try again.";
            $_SESSION['password'] = "Wrong email or password";
		}
	}
}

if (isset($_POST['rename'])) {
	global $errors;

	$username = $_POST['username'];
	if (empty($username)) {
		array_push($errors, "Username cannot be blank");
        $_SESSION['username'] = "Username cannot be blank";
	}

	if(count($errors) == 0) {
        $sql = "UPDATE users SET username='$username' WHERE userID=".$_SESSION['user']['USERID'][0];
		$result = oci_parse($con, $sql);
		oci_execute($result);
        $_SESSION['user']['USERNAME'][0] = $username;
	}
}

if (isset($_POST['pass-change'])) {
	global $errors;

	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	if (empty($password1)) {
		array_push($errors, "New password cannot be blank");
        $_SESSION['password1'] = "New password cannot be blank";
	} else if (empty($password2) || $password1<>$password2) {
		array_push($errors, "Passwords does not match");
        $_SESSION['password2'] = "Passwords does not match";
	}

	if(count($errors) == 0) {
		$password = md5($password1);
        $sql = "UPDATE users SET userPass='$password' WHERE userID=".$_SESSION['user']['USERID'][0];
		$result = oci_parse($con, $sql);
        oci_execute($result);
        $_SESSION['user']['USERPASS'][0] = $password;
	}
}

if (isset($_POST['add-to-cart'])) {
	global $errors;

	if(!isset($_SESSION["user"])) {
        header('Location:login.php');
    } else {
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];

		if (empty($id)) {array_push($errors, "Item Id is invalid");}
		if (empty($quantity)) {array_push($errors, "Quantity is invalid");}

		if(count($errors) == 0) {
            $sql = "SELECT * FROM cart WHERE userID=".$_SESSION['user']['USERID'][0];
			$results = oci_parse($con, $sql);
			// if (oci_num_rows($results) == 0) {
			// 	oci_parse($con, "INSERT INTO cart (userID) VALUES('".$_SESSION['user']['userID']."')");
			// 	$results = oci_parse($con, "SELECT * FROM cart WHERE userID='".$_SESSION['user']['userID']."' LIMIT 1");
			// }
            oci_execute($results);
			$cart = oci_fetch_array($results);

            //if item exist already in cart
            $sql = "SELECT * FROM cart_items WHERE variantID=$id AND cartID=".$cart['CARTID'][0];
			$result = oci_parse($con, $sql);
			oci_execute($result);
            $nrows = oci_fetch_all($result, $res);
            if ($nrows == 1) {
				$quantity += $res['QUANTITY'][0];
                //if yes update
                $sql = "UPDATE cart_items SET quantity='$quantity' WHERE variantID='$id' AND cartID=".$cart['CARTID'][0];
                $results = oci_parse($con, $sql);
                oci_execute($results);
            } else {//if not insert
                $sql = "INSERT INTO cart_items (cartID, variantID, quantity) VALUES('".$cart['CARTID'][0]."', '$id', '$quantity')";
				$results = oci_parse($con, $sql);
                oci_execute($results);
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
					$results = oci_parse($con, "SELECT * FROM cart WHERE userID='".$_SESSION['user']['USERID'][0]."'");
					oci_execute($results);
                    $cart = oci_fetch_array($results);
					$results = oci_parse($con, "UPDATE cart_items SET quantity='$quantity' WHERE variantID='$id' AND cartID='".$cart['CARTID'][0]."'");
                    oci_execute($results);
                }
			}
		}
	}
}

if(isset($_POST['remove-item'])) {
	$id = $_POST['remove-item'];
	$results = oci_parse($con, "DELETE FROM cart_items WHERE variantID='$id'");
    oci_execute($results);
}

function mime2ext($mime) {
    $mime_map = [
        'video/3gpp2'                                                               => '3g2',
        'video/3gp'                                                                 => '3gp',
        'video/3gpp'                                                                => '3gp',
        'application/x-compressed'                                                  => '7zip',
        'audio/x-acc'                                                               => 'aac',
        'audio/ac3'                                                                 => 'ac3',
        'application/postscript'                                                    => 'ai',
        'audio/x-aiff'                                                              => 'aif',
        'audio/aiff'                                                                => 'aif',
        'audio/x-au'                                                                => 'au',
        'video/x-msvideo'                                                           => 'avi',
        'video/msvideo'                                                             => 'avi',
        'video/avi'                                                                 => 'avi',
        'application/x-troff-msvideo'                                               => 'avi',
        'application/macbinary'                                                     => 'bin',
        'application/mac-binary'                                                    => 'bin',
        'application/x-binary'                                                      => 'bin',
        'application/x-macbinary'                                                   => 'bin',
        'image/bmp'                                                                 => 'bmp',
        'image/x-bmp'                                                               => 'bmp',
        'image/x-bitmap'                                                            => 'bmp',
        'image/x-xbitmap'                                                           => 'bmp',
        'image/x-win-bitmap'                                                        => 'bmp',
        'image/x-windows-bmp'                                                       => 'bmp',
        'image/ms-bmp'                                                              => 'bmp',
        'image/x-ms-bmp'                                                            => 'bmp',
        'application/bmp'                                                           => 'bmp',
        'application/x-bmp'                                                         => 'bmp',
        'application/x-win-bitmap'                                                  => 'bmp',
        'application/cdr'                                                           => 'cdr',
        'application/coreldraw'                                                     => 'cdr',
        'application/x-cdr'                                                         => 'cdr',
        'application/x-coreldraw'                                                   => 'cdr',
        'image/cdr'                                                                 => 'cdr',
        'image/x-cdr'                                                               => 'cdr',
        'zz-application/zz-winassoc-cdr'                                            => 'cdr',
        'application/mac-compactpro'                                                => 'cpt',
        'application/pkix-crl'                                                      => 'crl',
        'application/pkcs-crl'                                                      => 'crl',
        'application/x-x509-ca-cert'                                                => 'crt',
        'application/pkix-cert'                                                     => 'crt',
        'text/css'                                                                  => 'css',
        'text/x-comma-separated-values'                                             => 'csv',
        'text/comma-separated-values'                                               => 'csv',
        'application/vnd.msexcel'                                                   => 'csv',
        'application/x-director'                                                    => 'dcr',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
        'application/x-dvi'                                                         => 'dvi',
        'message/rfc822'                                                            => 'eml',
        'application/x-msdownload'                                                  => 'exe',
        'video/x-f4v'                                                               => 'f4v',
        'audio/x-flac'                                                              => 'flac',
        'video/x-flv'                                                               => 'flv',
        'image/gif'                                                                 => 'gif',
        'application/gpg-keys'                                                      => 'gpg',
        'application/x-gtar'                                                        => 'gtar',
        'application/x-gzip'                                                        => 'gzip',
        'application/mac-binhex40'                                                  => 'hqx',
        'application/mac-binhex'                                                    => 'hqx',
        'application/x-binhex40'                                                    => 'hqx',
        'application/x-mac-binhex40'                                                => 'hqx',
        'text/html'                                                                 => 'html',
        'image/x-icon'                                                              => 'ico',
        'image/x-ico'                                                               => 'ico',
        'image/vnd.microsoft.icon'                                                  => 'ico',
        'text/calendar'                                                             => 'ics',
        'application/java-archive'                                                  => 'jar',
        'application/x-java-application'                                            => 'jar',
        'application/x-jar'                                                         => 'jar',
        'image/jp2'                                                                 => 'jp2',
        'video/mj2'                                                                 => 'jp2',
        'image/jpx'                                                                 => 'jp2',
        'image/jpm'                                                                 => 'jp2',
        'image/jpeg'                                                                => 'jpeg',
        'image/pjpeg'                                                               => 'jpeg',
        'application/x-javascript'                                                  => 'js',
        'application/json'                                                          => 'json',
        'text/json'                                                                 => 'json',
        'application/vnd.google-earth.kml+xml'                                      => 'kml',
        'application/vnd.google-earth.kmz'                                          => 'kmz',
        'text/x-log'                                                                => 'log',
        'audio/x-m4a'                                                               => 'm4a',
        'audio/mp4'                                                                 => 'm4a',
        'application/vnd.mpegurl'                                                   => 'm4u',
        'audio/midi'                                                                => 'mid',
        'application/vnd.mif'                                                       => 'mif',
        'video/quicktime'                                                           => 'mov',
        'video/x-sgi-movie'                                                         => 'movie',
        'audio/mpeg'                                                                => 'mp3',
        'audio/mpg'                                                                 => 'mp3',
        'audio/mpeg3'                                                               => 'mp3',
        'audio/mp3'                                                                 => 'mp3',
        'video/mp4'                                                                 => 'mp4',
        'video/mpeg'                                                                => 'mpeg',
        'application/oda'                                                           => 'oda',
        'audio/ogg'                                                                 => 'ogg',
        'video/ogg'                                                                 => 'ogg',
        'application/ogg'                                                           => 'ogg',
        'font/otf'                                                                  => 'otf',
        'application/x-pkcs10'                                                      => 'p10',
        'application/pkcs10'                                                        => 'p10',
        'application/x-pkcs12'                                                      => 'p12',
        'application/x-pkcs7-signature'                                             => 'p7a',
        'application/pkcs7-mime'                                                    => 'p7c',
        'application/x-pkcs7-mime'                                                  => 'p7c',
        'application/x-pkcs7-certreqresp'                                           => 'p7r',
        'application/pkcs7-signature'                                               => 'p7s',
        'application/pdf'                                                           => 'pdf',
        'application/octet-stream'                                                  => 'pdf',
        'application/x-x509-user-cert'                                              => 'pem',
        'application/x-pem-file'                                                    => 'pem',
        'application/pgp'                                                           => 'pgp',
        'application/x-httpd-php'                                                   => 'php',
        'application/php'                                                           => 'php',
        'application/x-php'                                                         => 'php',
        'text/php'                                                                  => 'php',
        'text/x-php'                                                                => 'php',
        'application/x-httpd-php-source'                                            => 'php',
        'image/png'                                                                 => 'png',
        'image/x-png'                                                               => 'png',
        'application/powerpoint'                                                    => 'ppt',
        'application/vnd.ms-powerpoint'                                             => 'ppt',
        'application/vnd.ms-office'                                                 => 'ppt',
        'application/msword'                                                        => 'doc',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/x-photoshop'                                                   => 'psd',
        'image/vnd.adobe.photoshop'                                                 => 'psd',
        'audio/x-realaudio'                                                         => 'ra',
        'audio/x-pn-realaudio'                                                      => 'ram',
        'application/x-rar'                                                         => 'rar',
        'application/rar'                                                           => 'rar',
        'application/x-rar-compressed'                                              => 'rar',
        'audio/x-pn-realaudio-plugin'                                               => 'rpm',
        'application/x-pkcs7'                                                       => 'rsa',
        'text/rtf'                                                                  => 'rtf',
        'text/richtext'                                                             => 'rtx',
        'video/vnd.rn-realvideo'                                                    => 'rv',
        'application/x-stuffit'                                                     => 'sit',
        'application/smil'                                                          => 'smil',
        'text/srt'                                                                  => 'srt',
        'image/svg+xml'                                                             => 'svg',
        'application/x-shockwave-flash'                                             => 'swf',
        'application/x-tar'                                                         => 'tar',
        'application/x-gzip-compressed'                                             => 'tgz',
        'image/tiff'                                                                => 'tiff',
        'font/ttf'                                                                  => 'ttf',
        'text/plain'                                                                => 'txt',
        'text/x-vcard'                                                              => 'vcf',
        'application/videolan'                                                      => 'vlc',
        'text/vtt'                                                                  => 'vtt',
        'audio/x-wav'                                                               => 'wav',
        'audio/wave'                                                                => 'wav',
        'audio/wav'                                                                 => 'wav',
        'application/wbxml'                                                         => 'wbxml',
        'video/webm'                                                                => 'webm',
        'image/webp'                                                                => 'webp',
        'audio/x-ms-wma'                                                            => 'wma',
        'application/wmlc'                                                          => 'wmlc',
        'video/x-ms-wmv'                                                            => 'wmv',
        'video/x-ms-asf'                                                            => 'wmv',
        'font/woff'                                                                 => 'woff',
        'font/woff2'                                                                => 'woff2',
        'application/xhtml+xml'                                                     => 'xhtml',
        'application/excel'                                                         => 'xl',
        'application/msexcel'                                                       => 'xls',
        'application/x-msexcel'                                                     => 'xls',
        'application/x-ms-excel'                                                    => 'xls',
        'application/x-excel'                                                       => 'xls',
        'application/x-dos_ms_excel'                                                => 'xls',
        'application/xls'                                                           => 'xls',
        'application/x-xls'                                                         => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
        'application/vnd.ms-excel'                                                  => 'xlsx',
        'application/xml'                                                           => 'xml',
        'text/xml'                                                                  => 'xml',
        'text/xsl'                                                                  => 'xsl',
        'application/xspf+xml'                                                      => 'xspf',
        'application/x-compress'                                                    => 'z',
        'application/x-zip'                                                         => 'zip',
        'application/zip'                                                           => 'zip',
        'application/x-zip-compressed'                                              => 'zip',
        'application/s-compressed'                                                  => 'zip',
        'multipart/x-zip'                                                           => 'zip',
        'text/x-scriptzsh'                                                          => 'zsh',
    ];

    return isset($mime_map[$mime]) ? $mime_map[$mime] : false;
}

if(isset($_POST['upload-user'])) {
	$uploadOk = 1;

	if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
		// Notice how to grab MIME type.
		$mime_type = mime_content_type($_FILES['fileToUpload']['tmp_name']);
	
		// If you want to allow certain files
		$allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
		if (! in_array($mime_type, $allowed_file_types)) {
			// File type is NOT allowed.
			echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			// File size is NOT allowed.
			echo '<script>alert("Sorry, your file is too large.")</script>';
			$uploadOk = 0;
		}
		
		// Set up destination of the file
		$destination = 'media/users/';
		$name = $_POST['userID'];
		$ext = mime2ext($mime_type);
		$target_file = $destination.$name.".".$ext;

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script>alert("Sorry, your file was not uploaded.")</script>';
		// if everything is ok, try to upload file
		} else {
			//Check if file already exists
			if (file_exists($target_file)) {
			} else {
				//delete all previous files
				foreach (glob($destination.$name.".*") as $filename) {
					unlink($filename);
				}
			}
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				// File moved to the destination
				echo '<script>alert("The file "'.htmlspecialchars(basename($_FILES['fileToUpload']['name'])).'" has been uploaded.")</script>';
			} else {
				echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
			}
		}
	}
	// // Check if image file is a actual image or fake image
	// if(isset($_POST["submit"])) {
	// 	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	// 	if($check !== false) {
	// 		echo '<script>alert("File is an image - "'. $check["mime"] .'".")</script>';
	// 		$uploadOk = 1;
	// 	} else {
	// 		echo '<script>alert("File is not an image.")</script>';
	// 		$uploadOk = 0;
	// 	}
	// }
	// Check if file already exists
	// if (file_exists($target_file)) {
	// 	echo "Sorry, file already exists.";
	// 	$uploadOk = 0;
	// }
}

if(isset($_POST['delete-user'])) {
	$id = $_POST['user-id'];
    $sql = "SELECT * FROM cart WHERE userID=".$id;
    $results = oci_parse($con, $sql);
    oci_execute($results);
    $cart = oci_fetch_array($results);

    $sql = "DELETE FROM cart_items WHERE cartID=".$cart['CARTID'];
    $result = oci_parse($con, $sql);
    oci_execute($result);
    $sql = "DELETE FROM cart WHERE userID=".$id;
    $result = oci_parse($con, $sql);
    oci_execute($result);
    $sql = "DELETE FROM users WHERE userID=".$id;
    $result = oci_parse($con, $sql);
    oci_execute($result);
    header('location: admin.php');	
}

if(isset($_POST['delete-product'])) {
    $id = $_POST['product-id'];
    $sql = "SELECT * FROM variants WHERE productID=".$id;
    $results = oci_parse($con, $sql);
    oci_execute($results);
    while($variant = oci_fetch_array($results)) {
        echo $variant['VARIANTID'];
        $sql = "DELETE FROM inventory WHERE variantID='".$variant['VARIANTID']."'";
        $result = oci_parse($con, $sql);
        oci_execute($result);
    }
    $sql = "DELETE FROM variants WHERE productID=".$id;
    $result = oci_parse($con, $sql);
    oci_execute($result);
    $sql = "DELETE FROM products WHERE productID=".$id;
    $result = oci_parse($con, $sql);
    oci_execute($result);
    header('location: admin.php');	
}
if(isset($_POST['searchquery'])) {
    $filter = $_POST['searchquery'];
    if(isset($_POST['page'])){$currentpage = $_POST['page'];}
    else{$currentpage = 1;}
    //get total of products
    $sql = "SELECT * FROM VARIANTS V 
    JOIN PRODUCTS P 
    USING (productid) 
    WHERE variantid IN 
    ( 
        SELECT variantid FROM 
        ( 
            SELECT variantid, row_number() over (order by variantid asc) rn FROM 
            (
                SELECT * FROM VARIANTS V 
                JOIN PRODUCTS P 
                USING (productid) 
                JOIN CATEGORY C 
                USING (categoryid) 
                WHERE variantid IN 
                ( 
                    SELECT variantID FROM 
                    ( 
                        SELECT variantID, row_number() over (partition by productid order by productid asc) rn2 FROM 
                        ( 
                            SELECT * FROM VARIANTS v 
                            JOIN PRODUCTS p 
                            USING (productid) 
                            ".(($filter=="%") ? "" : "WHERE UPPER(productname) LIKE UPPER('%".$filter."%')")."
                        ) 
                    ) WHERE rn2=1
                )
            )
        )
    )";
    $results = oci_parse($con, $sql);
    oci_execute($results);
    $products = oci_fetch_all($results, $res);;
    $page = ceil($products/20);
    //filter for every page
    $sql = "SELECT * FROM VARIANTS V 
    JOIN PRODUCTS P 
    USING (productid) 
    WHERE variantid IN 
    ( 
        SELECT variantid FROM 
        ( 
            SELECT variantid, row_number() over (order by variantid asc) rn FROM 
            (
                SELECT * FROM VARIANTS V 
                JOIN PRODUCTS P 
                USING (productid) 
                JOIN CATEGORY C 
                USING (categoryid) 
                WHERE variantid IN 
                ( 
                    SELECT variantID FROM 
                    ( 
                        SELECT variantID, row_number() over (partition by productid order by productid asc) rn2 FROM 
                        ( 
                            SELECT * FROM VARIANTS v 
                            JOIN PRODUCTS p 
                            USING (productid) 
                            ".(($filter=="%") ? "" : "WHERE UPPER(productname) LIKE UPPER('%".$filter."%')")."
                        ) 
                    ) WHERE rn2=1
                )
            )
        )WHERE rn BETWEEN ".(($currentpage<>1) ? (($currentpage-1)*20)+1 : '1')." AND ".(($currentpage<>1) ? ($currentpage*20)-1 : '20').") ORDER BY VARIANTID ASC";
    $results = oci_parse($con, $sql);
    oci_execute($results);
    echo "<form method='post' id='pagination'>";
    echo "<div class='page-container'>";
        for($i=1; $i<=$page; $i++) {echo "<input type='radio' name='page' class='pages' value='".$i."' id='".$i."' ".(($currentpage==$i) ? 'checked' : '')."><label for='".$i."' class='pagelabel'>".$i."</label>";}
    echo "</div>";
    echo "</form>";
    while ($product = oci_fetch_array($results)) {
        echo "<form method='post' class='table'>";
        echo "<div class='img-container inline'>";
            echo "<img src='".$product['VARIANTIMAGE']."'>";
        echo "</div>";
        echo "<div class='text-container inline product-name'>";
            echo "<p>".($product['PRODUCTNAME'])."</p>";
        echo "</div>";
        echo "<div class='pencil-container inline'>";
            echo "<i class='fa-solid fa-pencil icon edit-product' style='float:right;' onclick='show(\"Inventory2\");'></i>";
            echo "<input type='hidden' value='".$product['PRODUCTID']."' name='product-id' class='product-id'>";
        echo "</div>";
        echo "<div class='delete-container inline'>";
            echo "<button name='delete-product' class='remove-btn'>&#10005;</button>";
        echo "</div>";
        echo "</form>";
    }
    echo "<form method='post' id='pagination2'>";
    echo "<div class='page-container'>";
        for($i=1; $i<=$page; $i++) {echo "<input type='radio' name='page' class='pages' value='".$i."' id='".($i+$page)."' ".(($currentpage==$i) ? 'checked' : '')."><label for='".($i+$page)."' class='pagelabel'>".$i."</label>";}
    echo "</div>";
    echo "</form>";
}
if(isset($_POST['productName'])) {
    $filter = $_POST['productName'];
    $sql = "SELECT * FROM products WHERE productName='".$filter."'";
    $results = oci_parse($con, $sql);
    oci_execute($results);
    $nrows = oci_fetch_all($results, $res);
    if($nrows == 0) {
        echo "<span class='exists'>Available.</span>";
    } else {
        echo "<span class='not-exists'>Product Name Already in use.</span>";
    }
}
if(isset($_POST['submitProduct'])) {
	$uploadOk = 1;
    
    $productName = $_POST['product-name'];
    $id = $_POST['product-id'];
    $category = $_POST['category-id'];

    $id_array = $_POST['variant-id'];
    $variant_array = $_POST['variant-name'];
    $price_array = $_POST['variant-price'];
    $inventory_array = $_POST['variant-inventory'];

    if($id!="") {//IF EXISTING PRODUCT
        $sql = "SELECT * FROM products WHERE productID=".$id;
        $result = oci_parse($con, $sql);
        oci_execute($result);
        $product = oci_fetch_array($result);
        
        $sql = "UPDATE products SET
                productName = '".$productName."', 
                categoryID = ".$category."
                WHERE productID=".$product['PRODUCTID'];
        $result = oci_parse($con, $sql);
        oci_execute($result);
        $sql = "SELECT * FROM products
                WHERE productID=".$product['PRODUCTID'];
        $result = oci_parse($con, $sql);
        oci_execute($result);

        //delete unused variants
        $sql = "SELECT variantID FROM variants WHERE productID=".$id;
        $results = oci_parse($con, $sql);
        oci_execute($results);
        $variants = oci_fetch_all($results, $res);
        $variantArray = array();
        foreach($res as $TITLE => $array) {
            foreach($array as $i => $variant) {
                array_push($variantArray, $variant);
            }
        }
        foreach($variantArray as $i => $variant) {
            if(in_array($variant, $id_array)) {}
            else {
                $sql = "DELETE FROM inventory WHERE variantID=".$variant;
                $result = oci_parse($con, $sql);
                oci_execute($result);
                $sql = "DELETE FROM variants WHERE variantID=".$variant;
                $result = oci_parse($con, $sql);
                oci_execute($result);
            }
        }
        $product = oci_fetch_array($result);
    } else {//IF NEW PRODUCT
        $sql = "INSERT INTO products (productName, categoryID) 
                VALUES('$productName', $category)";
        $result = oci_parse($con, $sql);
        oci_execute($result);
        $sql = "SELECT * FROM products
                WHERE productName='".$productName."'";
        $result = oci_parse($con, $sql);
        oci_execute($result);
        $product = oci_fetch_array($result);
    }

    //delete unused image
    $sql = "SELECT variantImage FROM variants";
    $results = oci_parse($con, $sql);
    oci_execute($results);
    $images = oci_fetch_all($results, $res);
    $imageArray = array();
    foreach($res as $TITLE => $array) {
        foreach($array as $i => $image) {
            array_push($imageArray, $image);
        }
    }
    foreach (glob("media/Site Files/*") as $filename) {
        if(in_array($filename, $imageArray)) {}
        else { if($filename!="media/Site Files/default.jpg"){unlink($filename);}}
    }
    
    if($id!="") {
        //IF EXISTING PRODUCT
        foreach($id_array as $i => $variantId) {
            foreach($variant_array as $i2 => $variantName) {
                foreach($price_array as $i3 => $price) {
                    foreach($inventory_array as $i4 => $inventory) {
                        if($i===$i2 && $i2===$i3 && $i3==$i4) {
                            // if ($price<1) {array_push($errors, "Invalid Price");}
                            if (is_uploaded_file($_FILES['variant-image']['tmp_name'][$i])) {
                                // Notice how to grab MIME type.
                                $mime_type = mime_content_type($_FILES['variant-image']['tmp_name'][$i]);
                                // If you want to allow certain files
                                $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
                                if (! in_array($mime_type, $allowed_file_types)) {
                                    // File type is NOT allowed.
                                    echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
                                    $uploadOk = 0;
                                }
                                // Check file size
                                if ($_FILES["variant-image"]["size"][$i] > 500000) {
                                    // File size is NOT allowed.
                                    echo '<script>alert("Sorry, your file is too large.")</script>';
                                    $uploadOk = 0;
                                }
                                if (file_exists("media/Site Files/".$_FILES['variant-image']['name'][$i])) {
                                    echo '<script>alert("Sorry, your file name already exist.")</script>';
                                    $uploadOk = 0;
                                }
                            }
                            if ($uploadOk == 1) {
                                //if default, don't upload
                                if($_FILES['variant-image']['tmp_name'][$i]=="") {
                                    $_FILES['variant-image']['name'][$i]="default.jpg";
                                    $_FILES['variant-image']['type'][$i]="image/jpg";
                                }
                                $newFilePath = "media/Site Files/" . $_FILES['variant-image']['name'][$i];
                                //if new image, upload
                                if($_FILES['variant-image']['tmp_name'][$i]!=="") {
                                    move_uploaded_file($_FILES['variant-image']['tmp_name'][$i], $newFilePath);
                                }
                                
                                if($variantId!="") {//IF EXISTING VARIANT
                                    $sql = "SELECT * FROM variants WHERE variantID=".$variantId." AND productID=".$id;
                                    $result = oci_parse($con, $sql);
                                    oci_execute($result);
                                    $variant = oci_fetch_array($result);

                                    if($newFilePath==="media/Site Files/default.jpg"){//IF OLD IMAGE
                                        $sql = "UPDATE variants SET
                                        variantName='".$variantName."',
                                        variantPrice=".$price."
                                        WHERE variantID=".$variant['VARIANTID'];
                                        $result = oci_parse($con, $sql);
                                        oci_execute($result);
                                    }
                                    else {//IF NEW IMAGE
                                        $sql = "UPDATE variants SET
                                                variantName='".$variantName."',
                                                variantPrice=".$price.",
                                                variantImage='".$newFilePath."'
                                                WHERE variantID=".$variant['VARIANTID'];
                                        $result = oci_parse($con, $sql);
                                        oci_execute($result);
                                    }
                                    $sql = "UPDATE inventory SET
                                        productInventory='".$inventory."'
                                        WHERE variantID=".$variant['VARIANTID'];
                                    $result = oci_parse($con, $sql);
                                    oci_execute($result);
                                } else { //IF NEW VARIANT
                                    $sql = "INSERT INTO variants (variantName, variantPrice, variantImage, productID)
                                            VALUES('$variantName', '$price', '$newFilePath', '".$product['PRODUCTID']."')";
                                    $result = oci_parse($con, $sql);
                                    oci_execute($result);

                                    $sql = "SELECT * FROM variants
                                            WHERE variantName='".$variantName."'
                                            AND productID='".$product['PRODUCTID']."'";
                                    $result = oci_parse($con, $sql);
                                    oci_execute($result);
                                    $variant = oci_fetch_array($result);

                                    $sql = "INSERT INTO inventory (variantID, productInventory)
                                            VALUES('".$variant['VARIANTID']."', '".$inventory."')";
                                    $result = oci_parse($con, $sql);
                                    oci_execute($result);
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        //IF NEW PRODUCT
        foreach($variant_array as $i => $variantName) {
            foreach($price_array as $i2 => $price) {
                foreach($inventory_array as $i3 => $inventory) {
                    if($i===$i2 && $i2==$i3) {
                        // if ($price<1) {array_push($errors, "Invalid Price");}
                        if (is_uploaded_file($_FILES['variant-image']['tmp_name'][$i])) {
                            // Notice how to grab MIME type.
                            $mime_type = mime_content_type($_FILES['variant-image']['tmp_name'][$i]);
                            // If you want to allow certain files
                            $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
                            if (! in_array($mime_type, $allowed_file_types)) {
                                // File type is NOT allowed.
                                echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
                                $uploadOk = 0;
                            }
                            // Check file size
                            if ($_FILES["variant-image"]["size"][$i] > 500000) {
                                // File size is NOT allowed.
                                echo '<script>alert("Sorry, your file is too large.")</script>';
                                $uploadOk = 0;
                            }
                            if (file_exists("media/Site Files/".$_FILES['variant-image']['name'][$i])) {
                                echo '<script>alert("Sorry, your file name already exist.")</script>';
                                $uploadOk = 0;
                            }
                        }
                        if ($uploadOk == 1) {
                            //if default, don't upload
                            if($_FILES['variant-image']['tmp_name'][$i]=="") {
                                $_FILES['variant-image']['name'][$i]="default.jpg";
                                $_FILES['variant-image']['type'][$i]="image/jpg";
                            }
                            $newFilePath = "media/Site Files/" . $_FILES['variant-image']['name'][$i];
                            //if new image, upload
                            if($_FILES['variant-image']['tmp_name'][$i]!=="") {
                                move_uploaded_file($_FILES['variant-image']['tmp_name'][$i], $newFilePath);
                            }
                            $sql = "INSERT INTO variants (variantName, variantPrice, variantImage, productID)
                                    VALUES('$variantName', '$price', '$newFilePath', '".$product['PRODUCTID']."')";
                            $result = oci_parse($con, $sql);
                            oci_execute($result);

                            $sql = "SELECT * FROM variants
                                    WHERE variantName='".$variantName."'
                                    AND productID='".$product['PRODUCTID']."'";
                            $result = oci_parse($con, $sql);
                            oci_execute($result);
                            $variant = oci_fetch_array($result);

                            $sql = "INSERT INTO inventory (variantID, productInventory)
                                    VALUES('".$variant['VARIANTID']."', '".$inventory."')";
                            $result = oci_parse($con, $sql);
                            oci_execute($result);
                        }
                    }
                }
            }
        }
    }
    //delete unused image
    $sql = "SELECT variantImage FROM variants";
    $results = oci_parse($con, $sql);
    oci_execute($results);
    $images = oci_fetch_all($results, $res);
    $imageArray = array();
    foreach($res as $TITLE => $array) {
        foreach($array as $i => $image) {
            array_push($imageArray, $image);
        }
    }
    foreach (glob("media/Site Files/*") as $filename) {
        if(in_array($filename, $imageArray)) {}
        else { if($filename!="media/Site Files/default.jpg"){unlink($filename);}}
    }
}
if(isset($_POST['editProduct'])) {
    $id = $_POST['editProduct'];
    $sql = "SELECT * FROM products WHERE productID=".$id;
    $result = oci_parse($con, $sql);
    oci_execute($result);
    $product = oci_fetch_assoc($result);
    $product = array_values($product);
    $sql2 = "SELECT * FROM variants WHERE productID=".$product[0];
    $results = oci_parse($con, $sql2);
    oci_execute($results);
    while($variants = oci_fetch_assoc($results)) {
        $sql = "SELECT * FROM inventory WHERE variantID=".$variants['VARIANTID'];
        $result = oci_parse($con, $sql);
        oci_execute($result);
        $inventory = oci_fetch_assoc($result);
        $inventory = array_values($inventory);
        $variants = array_values($variants);
        array_push($variants, $inventory);

        array_push($product, $variants);
    }
    echo json_encode($product);
}
?>