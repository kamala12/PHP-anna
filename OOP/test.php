
<?php

require_once("text.php");
$sentence1 = new text("");
echo'<pre>';
    print_r($sentence1);
    $sentence1->setText("123");
    print_r($sentence1);
echo'</pre>';
$sentence2 = new text("asd");
echo'<pre>';
    print_r($sentence2);
echo'</pre>';
$sentence2->show();
echo '<hr/>';