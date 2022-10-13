<?php
try {
	include __DIR__ . '/../includes/autoload.php';
	
	$route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
	
	    //****************************JG  5/24/18 NEW line 8 - 30 ADAPTER ***********************************************	
	print ('index.php 5: REQUEST_URI = ' . $_SERVER['REQUEST_URI'] . '<br>');  // JG test
	print ('index.php: 9 ltrim route = ' . $route . '<br>');  // JG test
	
	
	   //5/22/18 JG NEW4l: adapter to the code b/c of the .htaccess is ignored by apache
	if ($route == ltrim($_SERVER['REQUEST_URI'],  '/') ) 
	    $route = '';  //JG  5/21/18 NEW replaces by ''	    
	else
		$route = $_SERVER['QUERY_STRING']; //5/22/18 JG NEW1l: give the query = remaining string
      
	//05-24-22 yxie NEW 4L for tracing
	print ('index.php 1: REQUEST_URI = ' . $_SERVER['REQUEST_URI'] . '<br>'); 
    print ('index.php 2: HTTP_HOST = ' . $_SERVER['HTTP_HOST'] . '<br>'); 
    print ('index.php 3: HTTP_REFERER = ' . $_SERVER['HTTP_REFERER'] . '<br>'); 
    print ('index.php 4: SCRIPT_FILENAME = ' . $_SERVER['SCRIPT_FILENAME'] . '<br>');
	print ('index.php: 18 route = ' . $route . '<br>');  // JG test
	
	  //5/22/18 JG NEW6l: adapter to the code b/c of the .htaccess is ignored by apache
	if (strlen(strtok($route, '?')) <  strlen($route))  // string has additional ?
	{ 
	$_GET['id'] = substr ($route, strlen(strtok($route, '?')) + 4, strlen($route)); //5/22/18 JG extract id
	    print ('index.php: 24 id = ' . $GET['id']. '<br>');  // test
	$route = strtok($route, '?'); //retrieve the string between ? ? - for e.g. index?joke/edit?id=12
	}
	
	//$route = substr ($_SERVER['REQUEST_URI'], (strlen($route) + 2 )); // JG give remaining string
	print ('index.php: 29 route = ' . $route . '<br>');  // JG test
    print ('index.php: 30 REQUEST_METHOD = ' . $_SERVER['REQUEST_METHOD']. '<br>');  // JG test
	//****************************END OF JG  5/24/18 NEW line 8 - 30 ***********************************************	
	$entryPoint = new \Ninja\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Ijdb\IjdbRoutes());
	$entryPoint->run();
}
catch (PDOException $e) {
	$title = 'An error has occurred';
	$output = 'Database error: ' . $e->getMessage() . ' in ' .
	$e->getFile() . ':' . $e->getLine();
	include  __DIR__ . '/../templates/layout.html.php';
}
