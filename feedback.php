<?php include('php/authenticate.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | Ch Leong Enterprise Sdn Bhd</title>
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="icon" href="media/chleong.png">
</head>
<!-- Header -->
<?php include('header.php'); ?>
<script>
    $(document).ready(function(){
        $('input[name=rate]').change(function(){
            $('form').submit();
        });
    })
</script>
<body>
    <section id="space"></section>

    <section id="feedback">
        <div id="img-container"></div>
        <div id="white"></div>
        <div id="text-container">
            <h1>FEEDBACK</h1>
            <div class="rate">
                <form action="" method='get'>
                    <input type="radio" id="star5" name="rate" value="5" <?php echo ((isset($_GET['rate']) && $_GET['rate']==5) ? 'checked' : '') ?> />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" <?php echo ((isset($_GET['rate']) && $_GET['rate']==4) ? 'checked' : '') ?> />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" <?php echo ((isset($_GET['rate']) && $_GET['rate']==3) ? 'checked' : '') ?> />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" <?php echo ((isset($_GET['rate']) && $_GET['rate']==2) ? 'checked' : '') ?> />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" <?php echo ((isset($_GET['rate']) && $_GET['rate']==1) ? 'checked' : '') ?> />
                    <label for="star1" title="text">1 star</label>
                </form>
            </div>
        </div>
    </section>
    <section id="download">
        <div>
            <h1>Wanted To Become Our Customer?</h1><br><br>
            <p>Please download and fill up the<br>Application Form, then send it back to us!</p><br><br><br>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScSD8uSYPAqf1VAXpwYbnAIu3lVJ5c4gP7enYA4RxLKe_pjgQ/viewform" target="_blank">Go To Download Page</a>
        </div>
    </section>
</body>
<!-- Footer -->
<?php include('footer.php'); ?>
</html>