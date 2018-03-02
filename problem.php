<?php
	$problemcount = 1;
	#$test= scandir("/usr/share/nginx/html/problem/test/");
	#$pwnable = scandir("/usr/share/nginx/html/problem/pwnable/");
	$web= scandir("/usr/share/nginx/html/problem/web/");
	$crypto= scandir("/usr/share/nginx/html/problem/crypto/");
	$network= scandir("/usr/share/nginx/html/problem/network/");
	$for= scandir("/usr/share/nginx/html/problem/for/");

	$test = [
		'test.html',
		'revengeshellcode.html'
	];
	$pwnable = [
		'easy_bof.html',
		'shell_code.html',
		'rewrite_address.html',
		'get_shell.html',
		'crackme.html'
	];

	$web = [
		'sqli.html',
		'sqlirevenge.html'
	];

	$crypto = [
		'rsa.html',
		'venividivici.html'
	];
	$network = [
		'easypcap.html',
		'downloadfile.html',
		'basic.html',
	];

	$for = [
		'steghide.html'
	];

	$rev = [
		'android1.html',
	];

	

	echo <<<EOD
	<ul class="dropdown-menu">
    <li>Test</li>
    <li role="separator" class="divider"></li>
EOD;
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
    echo '<li role="separator" class="divider"></li>';
	echo '<li>Crypto</li>';
    echo '<li role="separator" class="divider"></li>';
	foreach($crypto as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/crypto/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
  echo '<li role="separator" class="divider"></li>';
	echo '<li>Network</li>';
  echo '<li role="separator" class="divider"></li>';
	foreach($network as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/network/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
  echo '<li role="separator" class="divider"></li>';
	echo '<li>Forensic</li>';
  echo '<li role="separator" class="divider"></li>';
	foreach($for as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/for/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
  echo '<li role="separator" class="divider"></li>';
	echo '<li>Reversing</li>';
  echo '<li role="separator" class="divider"></li>';
	foreach($rev as $file) {
		if (strpos($file,'html') !== false){
			echo '<li><a href="/problem/rev/'.$file.'">'.(string)$problemcount.'. '.substr($file,0,-5).'</a></li>';
			$problemcount++;
		}
	}
    echo <<<EOD
    </ul>
    </li>

EOD;
	
?>
