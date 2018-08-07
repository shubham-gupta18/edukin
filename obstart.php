<?php

function callback($buffer)
{
  // replace all the apples with oranges
  return (str_replace("apples", "oranges", $buffer));
}

ob_start("callback");


echo "<html>";
echo "<body>";
echo "<p>It's like comparing apples to oranges.</p>";
echo "</body>";
echo "</html>";
?>