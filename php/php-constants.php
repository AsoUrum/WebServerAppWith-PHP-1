<?php
#Revision History
# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021          create page to define all constants
#Urum bone aso(1831133)           Feb. 26,2021        update my review his  to match what is request by the teacher*/
#URUM BONE ASO(1831133)           FEB 28,2021           DEFINED CANSTANTS FOR VALIDATION LENGTH
#URUM BONE ASO(1831133)           mar 9,2021           defined constant for purchase.txt

#URUM BONE ASO(1831133)           march 11/12/13,2021      did all the final miss parts of the project





# declaration  of constanst 

//define("FOLDER_FUNCTIONS","php/");
//define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");

define("FILES_CONSTANTS_FUNCTIONS","php-constants.php");

define("FILES_PHP_FUNCTIONS",FOLDER_FUNCTIONS."php-functions.php");

define("FOLDER_STYLES","css/");
define("FILES_CSS_STYLES",FOLDER_STYLES."styles.css");

define("FOLDER_DATA","data/");
define("FILES_DATA_CHEATSHEET",FOLDER_DATA."cheatSheet.txt");

define("FILE_HOME_PAGE","index.php");
define("FILE_BUYING_PAGE","buying.php");
define("FILE_ORDER_PAGE","order.php");
define("HEADER_INFOR", "Content-Type: text/html; charset=UTF-8");

define("FOLDER_IMAGES","images/");
define("FILE_LOGO", FOLDER_IMAGES."logo.png");

define("FILE_PIC1", FOLDER_IMAGES."ads1.png");
define("FILE_PIC2", FOLDER_IMAGES."ads2.png");
define("FILE_PIC3", FOLDER_IMAGES."ads3.png");
define("FILE_PIC4", FOLDER_IMAGES."ads4.png");

define("FILE_PURCHASE","purchases.txt");
define("FILE_ERRORLOG","errorLog.txt");
define("FILE_ERRORLOG_EXCEPTION","errorLogExcept.txt");


# declaring global verables for form done on the 26/02/2021
$prodCode ="";
$cusFname ="";
$cusLname ="";
$cusCity="";
$comments ="";
$price =0;
$quantity =0;
$subTotal = 0;
$Taxes =0;
$grandTotal=0;

$color="color";
$print="print";
$picArray = array(FILE_PIC1,FILE_PIC2,FILE_PIC3,FILE_PIC4);

$errorProdCode ="";
$errorCusFname ="";
$errorCusLname ="";
$errorCusCity="";
$errorComments ="";
$errorPrice ="";
$errorQuantity="";
$array_Purchase;
$array_Allpurchess;
$count=0;
$text="Welcome to our web page where we offer you a \n"
        . "collection of our amzing product\n"
        . "we pride oursalve with a numeriou collect of choices to make\n";
define("PRODCODE_MAX_LENGTH", 12);
define("CUSFNAME_MAX_LENGTH", 20);
define("CUSLNAME_MAX_LENGTH", 20);
define("CITY_MAX_LENGTH", 8);
define("COMMENTS_MAX_LENGTH", 200);
define("PRICE_MAX_AMOUNT", 10000);
define("PRICE_MIN_AMOUNT", 1);
define("QUANTITY_MAX_NUMBER", 99);
define("QUANTITY_MIN_NUMBER", 1);
define("TAXRATE", 0.1205);
define("PRODCODE_FIRST_CHAR","p");
        
