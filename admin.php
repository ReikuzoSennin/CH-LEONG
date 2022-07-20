<?php 
    include('php/authenticate.php');

    if(!isset($_SESSION["user"])) {
        header('Location:login.php');
    }
    if(isset($_SESSION["user"]) && $_SESSION["user"]['USERTYPE'][0]!=="Admin") {
        header('Location:home.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="media/chleong.png">
    <script src="https://kit.fontawesome.com/0c2638ec91.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<script>
    function clear_form_elements(class_name) {
        jQuery("."+class_name).find(':input').each(function() {
            switch(this.type) {
                case 'password':
                case 'text':
                case 'textarea':
                case 'date':
                case 'number':
                case 'tel':
                case 'email':
                    if(this.classList.contains('keep-data')) {} 
                    else {
                        jQuery(this).val('');
                        break;
                    };
                case 'checkbox':
                case 'radio':
                    this.checked = false;
                    break;
                case 'select-one':
                case 'select-multiple':
                    jQuery(this).val('1');
                    break;
            }
        });
        //reset variant count
        (document.getElementById("container")).replaceChildren();
        //reset variant image
        (document.getElementsByClassName("variant-pic")[0]).src = "media/Site Files/default.jpg";
        //reset search
        var name = '%';
        $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "php/authenticate.php",
                //Data, that will be sent to "ajax.php".
                data: {searchquery: name},
                //If result found, this funtion will be called.
                success: function(html) {$("#display").html(html).show();}
        })
    }
    function addFields() {
        // Get the element where the inputs will be added to
        var container = document.getElementById("container");
        // Create an <input> element, set its type and name attributes
        var table = document.createElement("div");
        table.classList.add("table");
        container.appendChild(table);

        var imgcontainer = document.createElement("div");
        imgcontainer.classList.add("img-container");
        table.appendChild(imgcontainer);
        var label = document.createElement("label");
        imgcontainer.appendChild(label);
        var uploadinput = document.createElement("input");
        uploadinput.type = "file";
        uploadinput.accept = "image/gif, image/jpeg, image/jpg, image/png";
        uploadinput.name = 'variant-image[]';
        uploadinput.style = "display: none";
        uploadinput.classList.add("variant-image");
        label.appendChild(uploadinput);
        var img = document.createElement("img");
        img.id = "pic";
        img.src = "media/Site Files/default.jpg";
        img.classList.add("variant-pic");
        label.appendChild(img);

        var textcontainer = document.createElement("div");
        textcontainer.classList.add("text-container");
        table.appendChild(textcontainer);
        var text = document.createElement("input");
        text.type = 'text';
        text.placeholder = 'Variant Name';
        text.name = 'variant-name[]';
        text.classList.add('variant-name');
        text.required = true;
        textcontainer.appendChild(text);
        var response = document.createElement("div");
        response.id = 'uname_response';
        textcontainer.appendChild(response);
        var vid = document.createElement("input");
        vid.type = 'hidden';
        vid.classList.add('variant-id');
        vid.name = 'variant-id[]';
        textcontainer.appendChild(vid);

        var textcontainer2 = document.createElement("div");
        textcontainer2.classList.add("text-container","price");
        table.appendChild(textcontainer2);
        var text2 = document.createElement("input");
        text2.type = 'text';
        text2.pattern = '[0-9.,]+';
        text2.name = 'variant-price[]';
        text2.placeholder = '0';
        text2.classList.add('variant-price');
        text2.setAttribute("data-type", "number");
        text2.required = true;
        text2.maxlength = '6';
        text2.size = '6';
        textcontainer2.appendChild(text2);

        var deleteButton = document.createElement("button");
        deleteButton.classList.add("remove-btn", "delete-variant");
        deleteButton.name = "delete-variant";
        deleteButton.textContent = "✕";
        table.appendChild(deleteButton);
        // // Append a line break 
        // container.appendChild(document.createElement("br"));
    };
    // show the given page, hide the rest
    function show(elementID) {
        // find the requested page and alert if it's not found
        const ele = document.getElementById(elementID);
        if (!ele) {
            alert("no such element");
            return;
        }
        // get all pages, loop through them and hide them
        const pages = document.getElementsByClassName('content');
        for (let i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
        }
        // empty all pages input
        clear_form_elements('content');
        // then show the requested page
        ele.style.display = 'block';
        sessionStorage.setItem("previousTab", ele.id.replace(/[0-9]/g, ''));
        const boxes = document.querySelectorAll('.page');
        for (const box of boxes) {
            let onclick = box.getAttribute('onclick').toString();
            if(onclick.startsWith(ele.id.toString(), 6)) {
                $(boxes).removeClass('active');
                box.classList.add('active');
            }
        }
    }
    //save previous tab
    function recover() {
        var tab = sessionStorage.getItem("previousTab");
        if (!tab) {tab = 'Users';} //set default tab
        show(tab);
    }
    //live search
    $(document).ready(function() {
        //On pressing a key on "Search box" in "search.php" file. This function will be called.
        var name = '%';
        var ok = false;
        $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "php/authenticate.php",
                //Data, that will be sent to "ajax.php".
                data: {searchquery: name},
                //If result found, this funtion will be called.
                success: function(html) {$("#display").html(html).show();}
        })
        $("#searchquery").keyup(function() {
            //Assigning search box value to javascript variable named as "name".
            var name = $('#searchquery').val();
            //Validating, if "name" is empty.
            // if (name == "") {
            //     //Assigning empty value to "display" div in "search.php" file.
            //     $("#display").html("");
            // }
            // //If name is not empty.
            if (name == "") {name = '%';}//if empty show all
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "php/authenticate.php",
                //Data, that will be sent to "ajax.php".
                data: {searchquery: name},
                //If result found, this funtion will be called.
                success: function(html) {$("#display").html(html).show();}
            })
        })
        $("#product-name").keyup(function() {
            var uname = $(this).val().trim();
            if(uname != ''){
                var myresponse = $(this).siblings("#uname_response");
                $.ajax({
                    url: 'php/authenticate.php',
                    type: 'post',
                    data: {productName:uname},
                    //If result found, this funtion will be called.
                    success: function(html) {$(myresponse).html(html).show();}
                });
            }
        })
        // var sPath = window.location.pathname;
        // var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
        const boxes = document.querySelectorAll('.page');
        // const buttons = document.querySelectorAll('.addVariant-button');
        for (const box of boxes) {
            box.addEventListener('click', function handleClick() {
                $(boxes).removeClass('active');
                box.classList.add('active');
            });
        };
        //If the button is dynamically added then delegate
        $(document).on("click", ".delete-variant", function() {
            var test = $(this)[0];  
            var tr = test.parentNode;
            tr.parentNode.removeChild(tr);
        });
        $(document).on("change", ".variant-image", function(event) {
            var uname = $(this).val().trim();
            if(uname != ''){
                var image = $(this).siblings(".variant-pic");
	            image[0].src = URL.createObjectURL(event.target.files[0]);
            }
        });
        $(document).on('keydown', '.variant-price', function(e) {
            setTimeout(() => {
                let parts = $(this).val().split(".");
                let v = parts[0].replace(/\D/g, ""),
                dec = parts[1]
                let calc_num = Number((dec !== undefined ? v + "." + dec : v));
                // use this for numeric calculations
                console.log('number for calculations: ', calc_num);
                let n = new Intl.NumberFormat('en-EN').format(v);
                n = dec !== undefined ? n + "." + dec : n;
                $(this).val(n);
            })
        })
        $(document).on('click', '.edit-product', function() {
            var id = $(this).siblings(".product-id");
            var value= id.val().trim();
            if(value!= ''){
                $.ajax({
                    url: 'php/authenticate.php',
                    type: 'post',
                    data: {editProduct:value},
                    dataType: 'json',
                    success: function(data) {
                        document.getElementById("product-id").value = data[0];
                        document.getElementById("product-name").value = data[1];
                        document.getElementById("category-id").value = data[2];

                        product = document.getElementById("product-name");
                        product = $(product).siblings(".table");
                        product.find(".variant-pic")[0].src = data[3][3];
                        product.find(".variant-name")[0].value = data[3][1];
                        product.find(".variant-price")[0].value = data[3][2];
                        product.find(".variant-id")[0].value = data[3][0];
                        if(data.length>3) {
                            //add row for every variant, skip first variant
                            for(i=4; i<data.length; i++) {if(i>3){addFields();}}

                            container = document.getElementById("container");
                            table = $(container).children(".table");
                            for(i=4; i<data.length; i++) {
                                var k = i-4;
                                table.find(".variant-pic")[k].src = data[i][3];
                                table.find(".variant-name")[k].value = data[i][1];
                                table.find(".variant-price")[k].value = data[i][2];
                                table.find(".variant-id")[k].value = data[i][0];
                            }
                        }
                    }
                });
            }
        })
        $(document).on('change', '#pagination input', function() {
            var name = $('#searchquery').val();
            var page = $('input[name=page]:checked', '#pagination').val();
            if (name == "") {name = '%';}//if empty show all
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "php/authenticate.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    searchquery: name,
                    page: page
                },
                //If result found, this funtion will be called.
                success: function(html) {$("#display").html(html).show();}
            })
        })
        $(document).on('change', '#pagination2 input', function() {
            var name = $('#searchquery').val();
            var page = $('input[name=page]:checked', '#pagination2').val();
            if (name == "") {name = '%';}//if empty show all
            //AJAX is called.
            $.ajax({
                //AJAX type is "Post".
                type: "POST",
                //Data will be sent to "ajax.php".
                url: "php/authenticate.php",
                //Data, that will be sent to "ajax.php".
                data: {
                    searchquery: name,
                    page: page
                },
                //If result found, this funtion will be called.
                success: function(html) {$("#display").html(html).show();}
            })
        })
    });
</script>
<body onload="recover()">
    <section class="sidebar">
        <div id="profile-pic">
            <form action="" method="post" enctype="multipart/form-data">
            <label>
            <input type="file" accept="image/gif, image/jpeg, image/jpg, image/png" name="fileToUpload" style="display: none;" onchange="document.getElementById('upload-user').click();">
            <?php
            $file_name = $_SESSION['user']['USERID'][0];
            $destination = "media/users/";
            $extensions = array('.jpg', '.png', '.jpeg', '.gif');
            $src = "media/users/default.png";
            foreach ($extensions as $ext) {
                if (file_exists($destination.$file_name.$ext)) {
                    $src = $destination.$file_name.$ext;
                    break;
                } 
            }
            echo "<img id='pic' src='".$src."'>";
            echo "</label>";
            echo "<input type='hidden' name='userID' value='".$_SESSION['user']['USERID'][0]."'>";
            ?>
            <input type="submit" style="display: none;" id="upload-user" name="upload-user">
            </form>
        </div>
        <?php echo "<br><p id='username'>".(isset($_SESSION['user']) ? $_SESSION['user']['USERNAME'][0] : "")."</p>" ?>
        <div class="admin">
            <a href="#" onclick="show('Profile');" class="page">Profile</a>
            <a href="php/logout.php">Logout</a>
        </div>
        <a href="#"  onclick="show('Users');" class="page active"><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Users</a>
        <a href="#" onclick="show('Inventory');" class="page"><i class="fa-solid fa-boxes-stacked"></i></i>&nbsp;&nbsp;Inventory</a>
        <!-- <a href="#" onclick="show('Orders');" class="page"><i class="fa-solid fa-truck"></i>&nbsp;&nbsp;Orders</a> -->
    </section>
    <section class="content" id="Users">
        <h1>Users</h1>
        <p>Manage Registered Users.</p>
        <div class="info">
            <h2>Manage Users</h2>
            <p>View and manage a list of users that have registered.</p>
            <hr><br>
            <?php
                $sql = "SELECT * FROM users WHERE userType='Admin' ORDER BY dateRegistered";
                $results = oci_parse($con, $sql);
                oci_execute($results);
                echo "<h3>Admins</h3>";
                echo "<div class='user-list'>";
                while ($admin= oci_fetch_array($results)) {
                    echo "<div class='profile'>";
                        $src = $destination."default.png";
                        foreach (glob($destination.$admin['USERID'].".*") as $userpic) {
                            $src = $userpic;
                        }
                        echo "<img id='profile-pic' src='".$src."'>";
                        echo "<div class='profile-info'>";
                        echo "<a class='fa-solid fa-envelope icon text-end' href='mailto:".$admin['USEREMAIL']."' target='_blank'></a>";
                        echo "<h4>".$admin['USERNAME']."</h4>";
                        echo "<p>".$admin['USEREMAIL']."</p>";
                        echo "<p>Date Joined: ".$admin['DATEREGISTERED']."</p>";
                    echo "</div></div>";
                }
                echo "</div>";
                $sql = "SELECT * FROM users WHERE userType='Customer' ORDER BY dateRegistered";
                $results = oci_parse($con, $sql);
                oci_execute($results);
                echo "<h3>Customers</h3>";
                echo "<div class='user-list'>";
                while ($cust= oci_fetch_array($results)) {
                    echo "<form method='post'>";
                    echo "<div class='profile'>";
                        $src = $destination."default.png";
                        foreach (glob($destination.$cust['USERID'].".*") as $userpic) {
                            $src = $userpic;
                        }
                        echo "<img id='profile-pic' src='".$src."'>";
                        echo "<div class='profile-info'>";
                            echo "<button name='delete-user' class='icon-button text-end'>";
                            echo "<i class='fa-solid fa-trash-can icon' name='delete-user'></i></button>";
                            echo "<h4>".$cust['USERNAME']."</h4>";
                            echo "<p>".$cust['USEREMAIL']."</p>";
                            echo "<p>Date Joined: ".$cust['DATEREGISTERED']."</p>";
                            echo "<input type='hidden' value='".$cust['USERID']."' name='user-id'>";
                    echo "</div></form></div>";
                }
                echo "</div>";
            ?>
        </div>
    </section>
    <section class="content" id="Inventory">
        <h1>Inventory</h1>
        <p>Manage Product Inventory.</p>
        <div class="info">
            <h2>Manage Inventory</h2>
            <p>Manage Current Products or Create a New Product.</p>
            <hr><br>
            <form action="" method="post" class="inline">
                <input type="text" name="searchquery" id="searchquery" value="" class="inline" onkeydown="return (event.keyCode!=13);"/>
            </form>
            <input type="button" value="Add new product" onclick="show('Inventory2');" id="addProduct-button" class="inline" style="float:right">
            <div class='products-list' id='product'>
                <div id='display'></div>
            </div>
        </div>
    </section>
    <section class="content" id="Inventory2">
        <h1>Product</h1>
        <p>Create or edit a product.</p>
        <div class="info">
            <h2>Edit/Create Product</h2>
            <p>Edit a Product or Create a New Product.</p>
            <hr><br>
            <div class='products-list' id='product'>
                <?php
                    echo "<form method='post' enctype='multipart/form-data'>";
                        echo "<input type='text' placeholder='Product Name' name='product-name' id='product-name' required>";
                        echo "<input type='hidden' id='product-id' name='product-id'>";
                        echo "<div id='uname_response'></div>";
                        echo "<div class='text-end'>";
                            echo "<label for='category-name'>Category:</label>";
                            echo "<select name='category-id' id='category-id'>";
                            $sql = "SELECT * FROM CATEGORY
                            WHERE CATEGORYID IN
                            (
                                SELECT CATEGORYID FROM
                                (
                                    SELECT CATEGORYID, row_number() over (partition by CATEGORYNAME order by CATEGORYNAME asc) rn
                                    FROM CATEGORY
                                    ORDER BY CATEGORYID
                                )WHERE RN=1
                            )ORDER BY CATEGORYID";
                            $category = oci_parse($con, $sql);
                            oci_execute($category);
                            while($row = oci_fetch_array($category)) {
                                echo "<option value='".$row['CATEGORYID']."'>".$row['CATEGORYNAME']."</option>";
                                $sql = "SELECT * FROM category WHERE categoryName='".$row['CATEGORYNAME']."' AND subCategoryName IS NOT NULL ORDER BY categoryID";
                                $subcategory = oci_parse($con, $sql);
                                oci_execute($subcategory);
                                while($row2 = oci_fetch_array($subcategory)) {
                                    echo "<option value='".$row2['CATEGORYID']."'>--".$row2['SUBCATEGORYNAME']."</option>";
                                }
                            }
                            echo "</select>";
                        echo "</div>";
                        echo "<div class='table'>";
                            echo "<div class='img-container'>";
                                echo "<label>";
                                    echo "<input type='file' accept='image/gif, image/jpeg, image/jpg, image/png' name='variant-image[]' style='display: none;' class='variant-image'>";
                                    echo "<img id='pic' src='media/Site Files/default.jpg' class='variant-pic'>";
                                echo "</label>";
                            echo "</div>";
                            echo "<div class='text-container'>";
                                echo "<input type='text' placeholder='Variant Name' name='variant-name[]' class='variant-name' required>";
                                echo "<input type='hidden' class='variant-id' name='variant-id[]'>";
                            echo "</div>";
                            echo "<div class='text-container price'>";
                                echo "<input type='text' placeholder='0' maxlength='6' size='6' pattern='[0-9.,]+' name='variant-price[]' class='variant-price' data-type='number' required>";
                            echo "</div>";
                            echo "<div style='padding:15px';></div>";
                        echo "</div>";
                        echo "<div id='container'></div>";
                        echo "<input type='button' value='Add another variant' onclick='addFields()' id='addVariant-button'>&nbsp;";
                        echo "<input type='submit' value='Submit Product' name='submitProduct'>";
                    echo "</form>";
                ?>
            </div>
    </section>
    <section class="content" id="Orders">

    </section>
    <section class="content" id="Profile">
        <h1>Profile</h1>
        <p>Manage Your Profile.</p>
        <div class="info">
            <h2>Manage Profile</h2>
            <p>Rename and change your password or view your email.</p>
            <hr><br>
            <div id="profile-details">
                <form action="" method="post">
                    <h1>Username</h1>
                    <input type="text" name="username" class="profile-form keep-data" placeholder="Username" <?php echo "value='".(isset($_SESSION['user']) ? $_SESSION['user']['USERNAME'][0] : "")."'"?> >
                    <?php echo "<br><p id='error'>".(isset($_SESSION['username']) ? $_SESSION['username'] : "")."</p>" ?><br>
                    <input type="hidden" name="rename">
                    <?php unset($_SESSION['username']); ?>
                </form><br>
                <h1>Email</h1>
                <?php echo "<p>".(isset($_SESSION['user']) ? $_SESSION['user']['USEREMAIL'][0] : "")."</p>"?><br><br>
                <form action="" method="post">
                    <h1>Password</h1>
                    <input type="password" name="password1" class="profile-form" placeholder="New Password" required>
                    <?php echo "<br><p id='error'>".(isset($_SESSION['password1']) ? $_SESSION['password1'] : "")."</p>" ?><br>
                    <input type="password" name="password2" class="profile-form" placeholder="Confirm New Password" required>
                    <?php echo "<br><p id='error'>".(isset($_SESSION['password2']) ? $_SESSION['password2'] : "")."</p>" ?><br>
                    <input type="submit" value="Change Password" name="pass-change" id="pass-change">
                    <?php unset($_SESSION['password1'],$_SESSION['password2']); ?>
                </form><br>
            </div>
        </div>
    </section>
</body>
</html>