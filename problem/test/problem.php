<?php
	$problemcount = 1;
	$test= scandir("/usr/share/nginx/html/problem/test/");
	$pwnable = scandir("/usr/share/nginx/html/problem/pwnable/");
	$web= scandir("/usr/share/nginx/html/problem/web/");

	echo '<ul class="dropdown-menu">';
    echo '<li>Test</li>';
    echo '<li role="separator" class="divider"></li>';
	foreach($test as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/test/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
    echo '<li role="separator" class="divider"></li>';
	echo '<li>Pwnable</li>';
    echo '<li role="separator" class="divider"></li>';

	foreach($pwnable as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/pwnable/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
    echo '<li role="separator" class="divider"></li>';
	echo '<li>Web</li>';
    echo '<li role="separator" class="divider"></li>';
	foreach($web as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/web/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
    echo <<<EOD
	<li role="separator" class="divider"></li>
	<li>Cypher</li>
    <li role="separator" class="divider"></li>
    <li><a href="#">comming soon</a></li>
    </ul>
    </li>

EOD;
	
?>
