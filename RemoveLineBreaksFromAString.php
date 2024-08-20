<?php
$text = "Software engineering is a discipline for solving business
problems by designing and developing software-based
systems. As with any engineering activity, a software engineer
starts with problem definition and applies tools of the trade to
obtain a problem solution. However, unlike any other
engineering, software engineering seems to require great
emphasis on methodology or method for managing the
development process, in addition to great skill with tools and
techniques.
";
echo $text;
$text = str_replace("<br>", "", $text);
echo $text;
