<head>
  <link href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
</head>
<script>
  $( function() {
    var min = <?php echo (isset($_GET['min'])) ? json_encode($_GET['min']) : 0; ?>,
    max = <?php echo (isset($_GET['max'])) ? json_encode($_GET['max']) : 10; ?>;
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 999,
      values: [ min, max ],
      slide: function( event, ui ) {
        if(ui.values[ 0 ] +19 >= ui.values[ 1 ]){ return false; }
        $( "#amount" ).val( "RM" + ui.values[ 0 ] + " - RM" + ui.values[ 1 ] );
      },
      change: function( event, ui ) {
        $('#min').val(ui.values[ 0 ]);
        $('#max').val(ui.values[ 1 ]);
        $("#priceform").submit();
      }
    });
    $( "#amount" ).val( "RM" + $( "#slider-range" ).slider( "values", 0 ) +
      " - RM" + $( "#slider-range" ).slider( "values", 1 ) );
  });
</script>
<form action="" id="priceform" method="get">
  <input type="hidden" name="filter" value="price">
  <input type="hidden" id="min" name="min" value="0">
  <input type="hidden" id="max" name="max" value="999">
<p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
  <div id="slider-range"></div>
</form>