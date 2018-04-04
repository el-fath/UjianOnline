<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Drop placeholder</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
  html>body #sortable li { height: 1.5em; line-height: 1.2em; }
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
  </style>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/jquery-ui/jquery-ui.min.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#sortable" ).disableSelection();
  } );
  </script>
</head>
<body>
 
<ul id="sortable">
  <li class="ui-state-default">Item 1</li>
  <li class="ui-state-default">Item 2</li>
  <li class="ui-state-default">Item 3</li>
  <li class="ui-state-default">Item 4</li>
<!--   <li class="ui-state-default">Item 5</li>
  <li class="ui-state-default">Item 6</li>
  <li class="ui-state-default">Item 7</li> -->
</ul>
<br>
<?php
$kalimat1 = "Sed vitae sapien sodales ligula tincidunt facilisis nec gravida nunc";
$kalimat2 = "Sed vitae sapien sodales ligula tincidunt facilisis nec gravida nunc";
similar_text($kalimat1, $kalimat2, $persen);
echo 'Kemiripan '.$persen.' %';
?>
<br>
<?php
# kesamaan kata
$word1 = "menolong";
$word2 = "tolong";
$match = similar_text($word1, $word2,$percent);
$percent = round($percent, 2);
echo "<br/>$match huruf sama antara '$word1' dan '$word2' persentase kemiripan $percent %\n";
?>
<br>
<?php
echo strpos("Hallo PHP!", "PHP");
?>
</body>
</html>