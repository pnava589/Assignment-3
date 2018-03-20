<?php
    session_start();
    include("functions.php");
    
if(isset($_GET['action'])){    
    if($_GET['action']=="rmPost"){
        removeFromFav("post", $_GET['pId']);
    }
    else if ($_GET['action']=="rmImg") {
        removeFromFav("image", $_GET['imgId']);
    }
}
else if(isset($_GET['type'])){
    //call add to fav function with type, title, path and id
    if($_GET['type']=="image"){    
        addToFav("image", $_GET['imgTitle'], $_GET['imgPath'], $_GET['imgId']);
    }
    else if($_GET['type']=="post"){
        addToFav("post", $_GET['pstTitle'], $_GET['pstPath'], $_GET['pstId']);
    }
}
else if(isset($_GET['rmAll'])){
    removeAllFav();   
}

    echo ($_SESSION['favImages']);
    header("Location: ".$_SERVER['HTTP_REFERER']);

?>