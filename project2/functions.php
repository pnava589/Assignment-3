<?php



function displayLinks($result){


//$sql = "select c.CountryName,c.ISO from Countries c inner join ImageDetails i on i.CountryCodeISO = c.ISO group by c.CountryName";
//$result = $pdo -> query($sql);

    
    foreach($result as $row)
    {
        echo '<div class="col-md-3">';
        echo  '<div><a href="single-country.php?id='.$row['ISO'].'">'. $row["CountryName"].'</a></div>';
        echo '</div>';
    }
    
}

/* -------------------------------BROWSE COUNTRIES FUNCTION(S) -----------------------------------------------*/

function displaySingleCountry($nation,$pdo)
{
    
                    
       $sql = 'select CountryName,Capital,Area,Population,CurrencyName,CountryDescription from Countries where ISO ="'.$nation.'"';  
       $statement = $pdo->prepare($sql);
       $statement->bindvalue(":code",$country);
       $statement->execute();
       
       if(!empty($nation)||$statement->rowCount()>0)
             {
                  return $statement;
             }
       
       else
             {
                  redirect();    
             }

        
}


function displayCountryImages($result)
{
    
  
   while($row = $result->fetch())
       {
           
           echo '<div class="col-md-1">';
           echo '<a href="single-image.php?id='.$row["ImageID"].'" class="img-responsive">';
           echo '<img class="img-responsive" src="images/square-medium/'.$row["Path"].'" alt="'.$row["title"].'">';
           echo '</a>';
           
           echo   '</div>';
           
           
       }
  
    
}

function getImagesbyCountry($country,$pdo)
{
     $sql = 'select i.Path, i.title, i.ImageID, c.CountryName from ImageDetails i inner join Countries c on c.ISO = i.CountryCodeISO where c.ISO = "'.$country.'"';
     $statement = $pdo->prepare($sql);
     $statement->bindvalue(":code",$country);
     $statement->execute();
     return $statement;
    
     
}

function getCountryName($code,$pdo) //this method was necessary to get only the ountry name without affecting the list of images
{
     $sql = 'select c.CountryName from ImageDetails i inner join Countries c on c.ISO = i.CountryCodeISO where c.ISO = "'.$country.'"';
    $statement = $pdo->prepare($sql);
    $statement->bindvalue(":code",$code);
    $statement->execute(); 
    return $statement;
}


/* ------------------------------------------SINGLE COUNTRY FUNCTION(S)---------------------------------------------------------- */


function displayUsers($result)
{
    
   
   foreach($result as $row)
    {
         echo '<div class="col-md-3">';
         $name = utf8_encode($row["Firstname"]);
         $LastName = utf8_encode($row["Lastname"]);
        echo '<div><a href=single-user.php?user='.$row["UserID"].'>'.$row["Firstname"].' '.$row["Lastname"].'</div>';
        echo '</div>';
    }
}

/* ------------------------------------------BROWSE USERS FUNCTION(S)---------------------------------------------------------- */






function getUserName($user,$pdo)
{
    $sql = 'select u.FirstName, u.LastName from ImageDetails i inner join Users u on i.UserID = u.UserID and u.UserID ="'.$user.'"';
    $statement = $pdo ->prepare($sql);
    $statement->bindvalue(":user",$user);
    $statement->execute(); 
    
    if(!empty($user) || $statement->rowCount()>0)
    {
        return $statement;
        
    }
    else 
    {
        redirect();
    }
    
}



function getCountriesbyUsers($pdo,$user)
{
    if(!empty($user))   
    
    {
    
    $sql = 'select i.Path, u.UserID, i.ImageID,u.FirstName, u.LastName from ImageDetails i inner join Users u on i.UserID = u.UserID and u.UserID ="'.$user.'"';
    $statement = $pdo -> prepare($sql);
    $statement->bindvalue(":user",$user);
    $statement->execute(); 
   
    if($statement->rowCount()>0)
    {
       return $statement;
    }
  
    else
        {
          redirect();
        }
    
        
    }
}




function userInfo($user,$pdo)
{
    
        $sql= 'select Firstname, Lastname, Address, City, Postal, Country, Phone, Email from Users where UserID ="'.$user.'"';
        $statement = $pdo->prepare($sql);
        $statement->bindvalue(":user",$user);
        $statement->execute(); 
        
   
    if($statement->rowCount()>0 || !empty($user))
         {
              return $statement;
         }
    
}

/* ------------------------------------------SINGLE USER FUNCTION(S)---------------------------------------------------------- */





function displayContinentsLeft($pdo)
{
    $sql = "select c.ContinentName, c.ContinentCode from Continents c inner join ImageDetails i on i.ContinentCode = c.ContinentCode group by i.ContinentCode";
    $result = $pdo->query($sql);
    
    while($row = $result->fetch())
         {
        echo '<li class="list-group-item">';
        echo '<a href = "browse-images.php?continent='.$row["ContinentCode"].'">'.$row["ContinentName"];
         echo '</a></li>';
         }  
}

function displayCountriesLeft($pdo)
{
    $sql = "select c.CountryName, c.ISO from Countries c inner join ImageDetails i on i.CountryCodeISO = c.ISO group by c.CountryName";
    $result = $pdo->query($sql);
     while($row = $result->fetch())
         {
        echo '<li class="list-group-item">';
        echo '<a href = "single-country.php?code='.$row["ISO"].'">'.$row["CountryName"];
         echo '</a></li>';
         }
}


function showImage($pdo,$image)
{
        
        if(!empty($image))
        {
        $sql= 'select * from ImageDetails where ImageID = "'.$image.'"';
        $statement = $pdo->prepare($sql);
        $statement->bindvalue(":id",$user);
         $statement->execute(); 
        
        $picture = $statement->fetch();
         echo '<img class="img-responsive"' . 'src="images/medium/'. $picture["Path"].'"'. 'alt='.$picture['Title'].'>';
         echo '<p class="description">'. $picture['Description'].'</p>';
         echo '</div>';
        }
        
}

function showRightColumn($pdo,$id)    // right column on the single-image.php
{
    if(!empty($id))
    {
   
    $sql= 'SELECT c.AsciiName, i.ImageID,u.FirstName, u.LastName, coun.CountryName,coun.ISO, i.Title, u.UserID from Cities c, ImageDetails i, Users u, Countries coun where i.CityCode = c.CityCode and u.UserID = i.UserID and coun.ISO = i.CountryCodeISO and i.ImageID = '.$id;
    $result = $pdo->query($sql);
   
    while($row = $result->fetch())
    {
   
      }
    }
        
}
/* -----------------------------------SINGLE IMAGE FUNCTIONS--------------------------------------------- */

function ContinentsList()
{
    $sql = "select ContinentName from Continents";
    return $sql;
}

function getCountryList()
{
$sql = 'SELECT coun.CountryName, coun.ISO FROM Countries coun JOIN ImageDetails image ON coun.ISO = image.CountryCodeISO GROUP BY coun.ISO ORDER BY coun.CountryName';
return $sql; 
}

function getCityList()
{
    $sql = 'select cit.AsciiName, cit.CityCode from Cities cit inner join ImageDetails i on cit.CityCode = i.CityCode group by cit.AsciiName';
    return $sql;
}

function getImageList($sql)
{
  
return $sql;

}

/* -----------------------------------------MENU FUNCTIONS-------------------------- */


function setDbSearch($continent,$country,$city,$title,$connection)
{
  $db = new ImageDetailsGateway($connection);
   if(empty($continent)&&(empty($country))&&(empty($city))&&(empty($title)))
   {
       $sql= "select * from ImageDetails";
       $result = $db->getAll();
       
   }
   else if(!empty($continent))
   {
       $sql = 'SELECT Path, CountryCodeISO, ImageID, Title FROM ImageDetails WHERE ContinentCode = "'.$continent.'"';
        $result = $db->findParamByField(array('Path','CountryCodeISO','ImageID','Title'),$continent,'ContinentCode');
   }
   
   else if(!empty($country))
   {
       $sql = 'SELECT Path, CountryCodeISO, ImageID, Title FROM ImageDetails WHERE CountryCodeISO = "'.$country.'"';
       $result = $db->findParamByField(array('Path','CountryCodeISO','ImageID','Title'),$country,'CountryCodeISO');
   }
   
   else if(!empty($city))
   {
       
       $sql = 'SELECT Path, CountryCodeISO, ImageID, Title FROM ImageDetails WHERE CityCode = "'.$city.'"';
       $result = $db->findParamByField(array('Path', 'CountryCodeISO', 'ImageID', 'Title'),$city,'CityCode');
   }
   
   else if(!empty($title))
   {
       
        $sql = 'SELECT Path, ImageID, Title, Description, CityCode, CountryCodeISO, ContinentCode FROM ImageDetails WHERE Title LIKE"%'.$title.'%";"';
        $result = $db->findParamByLike(array('Path', 'ImageID', 'Title', 'Description', 'CityCode', 'CountryCodeISO', 'ContinentCode'),"%$title%",'Title');
       
   }
   $db=null;
   return $result;
   
    
}
function searchBox($connection,$search){
    $tit = $search;
    $db = new ImageDetailsGateway($connection);
    $result = $db->retrieveRecords("SELECT Path, ImageID, Title, Description, CityCode, CountryCodeISO, ContinentCode FROM ImageDetails WHERE Title OR Description LIKE :id", "%$tit%" );
    $db = null;
    return $result;
    
}

/* -----------------------------------FILTER FUNCTION------------------------------------ */



function redirect()
{
header("Location:error.php");
}


function queryStringExists($id){
  
   if ( !isset($id) || empty($id)){
       return false;
   }
   else{
       return true;
   }
}
function emptyset($result)
{
    if( count($result) == 0){
        return true;
    }
    else{
        return false;
    }
                
}
function printSmall($result, $link, $id)
{
    foreach($result as $key=>$row)
    {
        
        $num =$row["$id"];
        echo '<div class ="col-md-1">' ;
        echo '<a href = "' .$link.''.$num.'">';
        echo '<img src ="/project2/images/square-small/'.$row['Path'].'">';
        echo '</a>';
        echo '</div>';
    }
}




?>