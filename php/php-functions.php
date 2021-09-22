<?php
#Revision History
# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021          Created function page and created some functions
#Urum bone aso(1831133)           Feb. 21, 2021           modified footer function and created and also created form funtion
#Urum bone aso(1831133)           Feb. 26,2021        update my review his  to match what is request by the teacher                                                      add comments to identify my functions.
#URUM BONE ASO(1831133)           FEB 28,2021           STARTED TO CREATE VALIDATION RECIEVE FUNCTION
#URUM BONE ASO(1831133)           march 9,2021           created function to generate table
#URUM BONE ASO(1831133)           march 9,2021           modified header
##URUM BONE ASO(1831133)           march 9,2021         created function to add and  multiply,  created array to add infor, convert to jason and add to file purcchases.txt

#URUM BONE ASO(1831133)           march 10,2021      fix functiond to diplay tabel and validation
#URUM BONE ASO(1831133)           march 11/12/13,2021      did all the final miss parts of the project
$debug = true;
#funtion errors 
function manageError($errorNumber,$errormessage,$errorFile,$errorLine)
{
    global $debug;
   
    if($debug)
    {
//         echo"An error has occured, we are notied and working on it ";
    echo " An error occured in the file $errorFile at line $errorLine:".
            "Error number $errorNumber:$errormessage";
    }
   
        $logInfor= " An error occured in the file $errorFile at line $errorLine:".
        "Error number $errorNumber:$errormessage";
        file_put_contents(FILE_ERRORLOG,$logInfor."\r\n", FILE_APPEND) or die("cannot open the file");
    die();
    
}
//function manageException($errorObject)
//{​​​​​
//
//
// 
////
////                echo " An error occured in the file " . $errorObject->getFile() . "at line " .
////                $errorObject->GetLine() . " " . $errorObject->getMessage();
//
//                 $fileHandle = fopen("errorLogExpetion.txt","a") or die("killing PHP");
//                fwrite($fileHandle, " An error occured in the file " . $errorObject->getFile() . "at line " .
//                $errorObject->GetLine() . " " . $errorObject->getMessage() . "\r\n");
//                 fclose($fileHandle);
//
//}​​​​​

## funtion manageexceptions($e)
function manageException($errorObject)
{
    
   $logInfor = "An error occured in the file " .$errorObject->getFile(). "at line ".
            $errorObject->Getline()." ". $errorObject->getMessage();
    file_put_contents(FILE_ERRORLOG_EXCEPTION,$logInfor."\r\n", FILE_APPEND) or die("cannot open the file");
    
//    die();
}


        set_error_handler("manageError");
        set_exception_handler("manageException");


require_once FILES_CONSTANTS_FUNCTIONS;
createSendHeader();
header('Expires: Thu, 01 Dec 1994 14:00:00 GMT');
header('Cache-Control: no-cache');
header('Pragma: no-cache');

# funtion to generate the header
function createPageHeader($pagetitle){
  ?><!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device.width,initial.scale=1.0">
                    <link rel="stylesheet" type="text/css" href="<?php echo(FILES_CSS_STYLES); ?>">
                   <title><?php echo $pagetitle; ?></title>                  
                </head>
                <body class="<?php getprintFromUrl() ?>">                  
    <?php      
}

#fiunction to generate the footer
function createPageFooter(){ 
  ?>
         <footer>          
            <?php
             copyRightInfo();
            ?>      
            </body>
          </footer>            
            </html>
    <?php
}


#function to generate copyright on footer
function copyRightInfo(){    
     $mydate = new DateTime("now");
     echo "Copyright &copy; Urum Bone Aso ".$mydate->format("Y");   
}

# function to generate the navigation menu
function creatNav(){
//    createLog();
    ?>
         <nav class="topNav">
             <?php createLog() ?>         
              
             <a href=" <?php echo FILE_HOME_PAGE?>">Home</a>
             <a href=" <?php echo FILE_BUYING_PAGE?>">Buying</a>
             <a href="<?php echo FILE_ORDER_PAGE?> " >Orders</a>
             <a href="<?php echo FILES_DATA_CHEATSHEET?> " >My Cheat Sheet</a>
            </nav>        
     <?php   
}

#function to send the network hearder
function createSendHeader(){    
    header(HEADER_INFOR);
}

#function to create the logo
function createLog(){   
    echo"<img src= '".FILE_LOGO. "'>";   
}

function  createForm(){ 
global $errorProdCode;
global $errorCusFname;
global $errorCusLname;
global $errorCusCity;
global $errorComments;
global $errorPrice;
global $errorQuantity;  

global $prodCode;
global $cusFname;
global $cusLname;
global $cusCity;
global $comments;
global $price;
global $quantity; 
    ?>
            <form class = "myForm"   action="<?php echo FILE_BUYING_PAGE ?>" method="POST">
                <p>
                    <label><h1>Place Your Order</h1></label><br>
                    
                    <label class="stared"><b>Product Code: </label><br>
                    <input type="text" name="prodCode"  value="<?php echo $prodCode?>" ><span class="spanColor"><?php echo $errorProdCode?></span><br>
                    
                    <label class="stared" >Customer First Name: </label><br>
                    <input type="text" name="firstName" value="<?php echo $cusFname?>" ><span class="spanColor"><?php echo $errorCusFname?></span><br>
                    
                    <label class="stared" >Customer Last Name: </label><br>
                    <input type="text" name="lastName" value="<?php echo $cusLname?>" ><span class="spanColor"><?php echo $errorCusLname?></span><br>
                    
                    <label class="stared">Customer City: </label><br>
                    <input type="text" name="city"  value="<?php echo $cusCity?>" ><span class="spanColor"><?php echo $errorCusCity?></span><br>
                    
                    <label>Comments: </label><br>
                    <textarea name="comments"value="<?php echo $comments?>" ></textarea><br><span class="spanColor"><?php echo $errorComments?></span><br>
                    
                    <label class="stared">Price : </label><br>
                    <input type="" name="price" value="<?php echo $price?>" ><span class="spanColor"><?php echo $errorPrice?></span><br>
                    
                    <label class="stared">Quantity: </label><br>
                    <input type="" name="quantity" value="<?php echo $quantity?>"><span class="spanColor"><?php echo $errorQuantity?></span><br>
                </p>
                
                <input type = "submit" value = "Save" name = "save">      
            </form> 
            
            
    <?php   
}

#function to recieve post
function recievePostValidation(){
global $errorProdCode;
global $errorCusFname;
global $errorCusLname;
global $errorCusCity;
global $errorComments;
global $errorPrice;
global $errorQuantity;
#global variables
global $prodCode;
global $cusFname;
global $cusLname;
global $cusCity;
global $comments;
global $price;
global $quantity;
global $subTotal;
global $Taxes;
global $grandTotal;
global $array_Purchase;


    if(isset($_POST["save"]))
    {
            $prodCode = htmlspecialchars($_POST["prodCode"]);
            $cusFname =htmlspecialchars($_POST["firstName"]);
            $cusLname = htmlspecialchars($_POST["lastName"]);
            $cusCity= htmlspecialchars($_POST["city"]);
            $comments = htmlspecialchars($_POST["comments"]);
            $price = htmlspecialchars($_POST["price"]);
            $quantity= htmlspecialchars($_POST["quantity"]);
            
            
           $validated = true;
                #product code validation
            if($prodCode=="")
            {
                $errorProdCode = "Please enter a product Code";
                $validated = false;
            }
            else if(mb_strlen($prodCode)> PRODCODE_MAX_LENGTH)
            {
                    $errorProdCode = "The product code cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            else if( PRODCODE_FIRST_CHAR !=strtolower($prodCode[0]))
            {
                $errorProdCode = "the first letter of the product code must beign with a p";
                $validated = false;
            }

            
            
       
            #first name validathion
            if($cusFname=="")
            {
                $errorCusFname = "Please enter  first name";
                $validated = false;
            }
            else if(mb_strlen($cusFname)> CUSFNAME_MAX_LENGTH)
            {
                    $errorCusFname= "The first name  cannot contain more than".CUSFNAME_MAX_LENGTH." characters";
                    $validated = false;
            }
    
            
            #last name validation
            if($cusLname=="")
            {
                $errorCusLname = "Please enter last name";
                $validated = false;
            }
            else if(mb_strlen($cusLname)> CUSLNAME_MAX_LENGTH)
            {
                    $errorCusLname= "The last name  cannot contain more than".CUSLNAME_MAX_LENGTH." characters";
                    $validated = false;
            }

            
            #city validation 
            if($cusCity=="")
            {
                $errorCusCity = "Please enter  the city"; 
                $validated = false;
            }
            else if(mb_strlen($cusCity)> CITY_MAX_LENGTH)
            {
                    $errorCusCity= "The city cannot contain more than".CITY_MAX_LENGTH." characters";
                    $validated = false;
            }
            
            # comments validation
   
           if(mb_strlen($comments)> COMMENTS_MAX_LENGTH)
           {
                    $errorComments= "The comments  cannot contain more than".COMMENTS_MAX_LENGTH." characters";
                    $validated = false;
            }
            
            # validation for prce
            if ($price=="")
            {
           
                    $errorPrice= "Please enter the price";
                    $validated = false;
                    
            }else if(!is_numeric($price)){
                    $errorPrice= "Please enter the price";
                    $validated = false;
            }
            else if(($price < PRICE_MIN_AMOUNT || $price>PRICE_MAX_AMOUNT))
            {
                    $errorPrice= "The PRICE cannot be more than ".PRICE_MAX_AMOUNT." less than ".PRICE_MIN_AMOUNT;
                    $validated = false;
                   
            }
            
            # validation for quantity         
            if ($quantity=="")
            {          
                    $errorQuantity = "Please enter the quantity";  
                    $validated = false;
            }
            else if(!is_numeric($quantity)){
                    $errorQuantity = "Please enter the quantity";  
                    $validated = false;
            }
            else if($quantity < QUANTITY_MIN_NUMBER || $quantity > QUANTITY_MAX_NUMBER)
            {
                    $errorQuantity= "The quantity  cannot be more than ".QUANTITY_MAX_NUMBER." less than ".QUANTITY_MIN_NUMBER;
                    $validated = false;
            }
            else if((float)$quantity != (int)$quantity)
            {
                $errorQuantity = "the quantity  can not be a fraction";
                $validated = false;
            }
                    
                
                 #saving valided order information
            if($validated == true){
                #asgning subtotal, taxes and grandtotal
                $subTotal = calculateSubaTotalAndTaxes($price, $quantity); 
                $Taxes = calculateSubaTotalAndTaxes($subTotal,TAXRATE);
                $grandTotal = addSumTotal($subTotal,$Taxes);

                # creating array for purchases and adding the infors
                $array_Purchase = array();
                $array_Purchase["prodCode"]= $prodCode ;
                $array_Purchase["firstName"]= $cusFname ;
                $array_Purchase["lastName"]=$cusLname;
                $array_Purchase["city"]=$cusCity;
                $array_Purchase["comment"]=$comments;
                $array_Purchase["price"]=$price;
                $array_Purchase["quantity"]=$quantity;
                $array_Purchase["subTotal"]=$subTotal;
                $array_Purchase["taxes"]= $Taxes;
                $array_Purchase["grandTotal"]= $grandTotal;

         
                #converting array into jeson file
                $myOrder = json_encode($array_Purchase);

                # creating text file using file handle
                file_put_contents(FILE_PURCHASE,$myOrder."\r\n", FILE_APPEND) or die("cannot open the file"); 
                
                echo "<h3>Thank  you for shopping with us, your order has been saved.</h3>";
                
                
                $prodCode = "";
                $cusFname ="";
                $cusLname ="";
                $cusCity ="";
                $comments ="";
                $price ="";
                $quantity ="";
            }
               // header("location:".FILE_BUYING_PAGE);
                
            
    }    
}

# functon to display ads
function displayAds(){
     global $picArray;           
   # $picArray = array(FILE_PIC1,FILE_PIC2,FILE_PIC3,FILE_PIC4);
        $num = rand(0,3);
     #shuffle($picArray);
                  // echo"<img src= '".$picArray[$num]. "'>";
     ?>
            <img class="<?php echo enlargeAds($num, FILE_PIC1 ) ?>" src= "<?php echo $picArray[$num]?> ">
      <?php      
      
}

# function to change big Ads
function enlargeAds($num,$pic){
    global $picArray;
    if ($picArray[$num] == $pic){
        
        return "ads";
    }else{
        return "ads2";
    }
        
}

#function to create table
function displayTable(){   
    global $array_Allpurchess;
    global $count;
   
    ?>
            <table class ="table">
                    <tr>
                        <th>Product ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Comments</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                        <th>Taxes</th>
                        <th>Grand Total</th>

                    </tr>
                   <?php for($i = 0; $i<$count; $i++){?>
                   
                    <tr>
                        <td><?php echo $array_Allpurchess[$i]["prodCode"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["firstName"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["lastName"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["city"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["comment"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["price"]."$" ?></td>
                        <td><?php echo $array_Allpurchess[$i]["quantity"] ?></td>
                        
                        
                        <td class="<?php echo getColorFromUrl($array_Allpurchess[$i]["subTotal"]) ?>"><?php echo $array_Allpurchess[$i]["subTotal"]."$" ?></td>
                        <td><?php echo $array_Allpurchess[$i]["taxes"]."$"?></td>
                        <td><?php echo $array_Allpurchess[$i]["grandTotal"]."$" ?></td>
                       <?php ?>
                    </tr>
                   <?php } ?>
             
            </table>
            
    <?php
              
}

#function to multiply two number
function  calculateSubaTotalAndTaxes($num1, $num2){           
           return round(($num1 * $num2), 2);         
    }  
  
  #function to sum two numbers.
function  addSumTotal($num1, $num2){         
           return round(($num1 + $num2), 2);       
    } 
    
    
#function to read file
function readfileP(){
    global $array_Allpurchess;
    global  $count;
    $index=0;
        $array_Allpurchess = array();
        $jesonInforPurchase;
         
                
$fileHandle = fopen(FILE_PURCHASE, "r") or die("cannot open the file");
        
        ##$content = fread($fileHandle, filesize("jf.txt"));
        
        while (!feof($fileHandle)) 
        {
          $jesonInforPurchase = fgets($fileHandle);
          if($jesonInforPurchase!=""){
              
            $array_Allpurchess[$count] = json_decode($jesonInforPurchase, true);
          $count++; 
          }
        }
        
        fclose($fileHandle);
}
   





function diplayText($txt){
    ?>
    <marquee width="100%" direction="left" height="100px">
           <?php echo $txt; ?>
    </marquee><br><br>
    <?php
    
}

  #function to change color for subtotal
function subColorChange($num){
    if($num<100){
       $subColor = "changeColor1";
    }elseif($num < 1000 && $num>100){
        $subColor = "changeColor2";
    }else{
        $subColor = "changeColor3";
    }
    return $subColor;
}


 if(isset($_GET["color"])){
             $color = htmlspecialchars($_GET["color"]);
             
             if ($color!="red"&& $color !=blue){
			 
			 $color ="";
			 
			 }
         }
             if(isset($_GET["color"])){
             $color = htmlspecialchars($_GET["color"]);
             
             if ($color!="red"&& $color !=blue){
			 
			 $color ="";
			 
			 }
         }
            
#function to get colour from url
 function getColorFromUrl($num){
     global $color;
      if(isset($_GET["command"])){
             $command = htmlspecialchars($_GET["command"]);              
             if ($command== $color)
                {			 
			echo subColorChange($num);			 
                }else
                {
                    $command="";
                }
                
    } 
 } 
 
#funtion to get command background color change 
 function getprintFromUrl(){
     global $print;
      if(isset($_GET["command"])){
             $command = htmlspecialchars($_GET["command"]);              
             if ($command== $print)
                {			 
			echo $print;			 
                }else
                {
                    $command="body";
                }
                
    } 
 }    
 