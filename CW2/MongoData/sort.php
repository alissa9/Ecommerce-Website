<?php
    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    require __DIR__ . '../../../vendor/autoload.php';

    $mongoClient = (new MongoDB\Client);

    $db = $mongoClient->CarScape;

    $sort = $_POST['sort'];
    if($sort == 'htl' ) {
 
        $filter =[];
        $options = ['sort' =>['price' => -1]];

    } else if ($sort == 'lth'){
        $filter =[];
        $options = ['sort' =>['price' => 1]];
   
   
    }  else if ($sort == 'az'){
        $filter =[];
        $options = ['sort' =>['make' => 1]];
    }
    
    else if ($sort == 'za'){
        $filter =[];
        $options = ['sort' =>['make' => -1]];
    }
    

    $cursor = $db->cars->find($filter, $options);
    
    foreach ($cursor as $Cars) {
                                                                                             
        echo'
        
            <div class="grid-item"><img class="CarPic" src="'.$Cars["image_url"].'" 
            alt=""><p>'.$Cars["make"].'</p>    <p>'.$Cars["model"].'</p> <p> £'.$Cars["price"].'</p>   
            <input id="addtocart"  type="button" onclick="addToCart()" value="Add to cart "/> </div> ';
    
    }