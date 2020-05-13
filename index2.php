<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pagination li {
            display:inline-block;
            padding:5px;
            }
    </style>
</head>
<body>
    <h1>list</h1>
    <?php

    $xmlfile = file_get_contents('sample2.xml');
    $ob= simplexml_load_string($xmlfile);
    $json  = json_encode($ob);
	$configData = json_decode($json, true);
    //print_r($configData);
    ?>

    <div id="test-list">
        <input type="text" class="search" />
        <button class="sort" data-sort="cat">
            Sort by catagory
          </button>
          <button class="sort" data-sort="city">
            Sort by city
          </button>
        <ul class="list">
          <!-- <li><p class="name">Guybrush Threepwood</p><p class="age">30</p></li> -->
          <?php 
          $jobs = $configData;  

          //print_r($jobs['jobs']['job']);

          foreach($jobs['jobs']['job'] as $key => $value) {  
            echo "<li><h3 class='title'> " . $value['title'] ."</h3>";
            echo "<p class='cat'> Job Category: " . $value['job_category'] . " </p>";
            echo "<p class='city'> City:" . $value['city'] . " </p>";
            echo "<p class='company'> Company: " . $value['company'] . " </p></li>";  
        }
          
          ?>
          
        </ul>
        <ul class="pagination"></ul>
      </div>

    <script src="js/list.js"></script>
    <script>
        var monkeyList = new List('test-list', {
        valueNames: ['title','cat','city','company'],
        page: 3,
        pagination: true
        });
    </script>
</body>
</html>