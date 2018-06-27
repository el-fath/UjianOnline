<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Drop placeholder</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->

  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  </style>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script src="<?php echo base_url();?>assets/js/jquery-2.2.2.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/jquery/dist/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bower/jquery-ui/jquery-ui.min.js"></script>
  <script>
  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
  </script>
   <style>
         #sortable-5, #sortable-6,#sortable-7 { 
            list-style-type: none; margin: 0; padding: 0;
            width: 20%;float:left }
         #sortable-5 li, #sortable-6 li,#sortable-7 li { 
            margin: 0 3px 3px 3px; padding: 0.4em; 
            padding-left: 1.5em; font-size: 17px; height: 16px; }
         .default {
            background: #cedc98;
            border: 1px solid #DDDDDD;
            color: #333333;
         }
      </style>
      
      <script>
         $(function() {
            $( "#sortable-5, #sortable-6" ).sortable({
               connectWith: "#sortable-5, #sortable-6"
            });
            $( "#sortable-7").sortable({
               connectWith: "#sortable-5",
               dropOnEmpty: false
            });
         });
      </script>
</head>
<body>
  <h2>
  <?php echo($kel); ?>
  </h2>
<ul id = "sortable-5"><h3>List 1</h3>
   <li class = "default">A</li>
   <li class = "default">B</li>
   <li class = "default">C</li>
   <li class = "default">D</li>
</ul>
<ul id = "sortable-6"><h3>List 2</h3>
   <li class = "default">a</li>
   <li class = "default">b</li>
   <li class = "default">c</li>
   <li class = "default">d</li>
</ul>
<ul id = "sortable-7"><h3>List 3</h3>
   <li class = "default">e</li>
   <li class = "default">f</li>
   <li class = "default">g</li>
   <li class = "default">h</li>
</ul>

<ul id="sortable1">
  <li class="ui-state-default">Item 1</li>
  <li class="ui-state-default">Item 2</li>
  <li class="ui-state-default">Item 3</li>
  <li class="ui-state-default">Item 4</li>
  <li class="ui-state-default">Item 5</li>
</ul>
<ul id="sortable1">
<img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
<img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
<img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
<img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
<img src="<?php echo base_url(); ?>assets/assets-user/img/arrow.png" alt="Good News from Indonesia" style="height: 35px; width: 140px">
</ul>
<ul id="sortable2">
  <li class="ui-state-highlight">Item 1</li>
  <li class="ui-state-highlight">Item 2</li>
  <li class="ui-state-highlight">Item 3</li>
  <li class="ui-state-highlight">Item 4</li>
  <li class="ui-state-highlight">Item 5</li>
</ul>
<br>
<?php
$kalimat1 = "ligula tincidunt facilisis nec gravida nunc Sed vitae sapien sodales";
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
<br>
<?php 
$a = 'How are you?';
if (strpos($a, 'are') !== false) {
  echo 'true';
}
?>
<br>
<?php 
$one = array('grape' => '0.40','apple' => '1.20','banana' => '1.80','lemon' => '10.43');
$two = array('grape' => '0.40','apple' => '1.20','banana' => '1.80','lemon' => '10.43');
// $two = array('grappe' => '1.20','kiwi' => '7.54','banaana' => '3.20','aubergine' => '2.32');

$result = array();
foreach ( $one as $key => $value ) {
  foreach ( $two as $twoKey => $twoValue ) {
    similar_text($key, $twoKey, $percent);
    if ($percent > 80) {
    // print_r($percent);
    $result[$key] = array($value,$twoValue);
    }
    // echo(round($percent, 1));
  }
}
echo"<pre>";
var_dump($result);
echo"<br>";
?>
<br>
<?php
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
print_r($arr);
// $jon = json_encode($arr);
$jon = implode($arr);
echo($jon);
// print_r(json_decode($jon));
?>
<br>
<?php 
echo $list = "2,1,4,3";
echo"<br>";
$k = explode(',', $list);
$h = implode($k);
print_r($k);
echo($h);  
 ?>
</body>
</html>