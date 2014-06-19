<?php
//get scores
$xml=("http://www.scorespro.com/rss2/live-soccer.xml");

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);
/*
//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</p>");
*/

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
$length=$x->length;

  echo '<div id="profile" class="container" style="margin-top:-100px;">';
for ($i=0; $i<$length; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  if (($pos = strpos($item_title, ":")) !== FALSE) { 
    $remove_colon = substr($item_title, $pos+1); 
  }
  
  if (($pos = strpos($remove_colon, ")")) !== FALSE) { 
    $remove_brace = substr($remove_colon, $pos+1); 
  }

$findme   = '(FIFA-GS)';
$pos = strpos($remove_colon, $findme);

if ($pos !== false) {

$coun_name = explode(" vs ", $remove_brace);
$goal_result = explode(":", $coun_name[1]);

	echo'
        <div class="span5"> <img style="width:25%; height:25%;" src="img/officalball.png">
		  <h1>'.$coun_name[0].' Vs '.$goal_result[0].'</h1>
		 <h1>Result:'.$goal_result[1].'</h1>
         		  
          <p style="color:#203748;">'.$item_desc.'</p>
          <a href="view-score.html?url='.$item_link.'" class="btn btn-3 btn-3a icon-cart3"><i class="icon-trophy"></i> View Score </a>
         
        </div><br/><br/><br/>
      ';
 }
}
echo '</div>';
/*
echo '<div id="work" class="container" style="padding:5px;">
        <h2>Lates Pictures</h2>';

//get pics
$xml=("http://www.fifa.com/worldcup/photo/rss.xml");

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;
  
  echo '
  		<h3>'.$item_title.'</h3>
  		<ul class="work-images">
          <li>
            <div style="background-image:none;background-color:#f04949;">'.$item_desc.'</div>
          </li>
        </ul>';

}

echo '</div>';
*/
?>