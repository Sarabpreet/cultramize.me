<?php 
if($_GET['country'] && $_GET['ft'])
{
require 'lessc.inc.php';
$country=$_GET['country'];
$filetype=$_GET['ft'];

$less=new lessc;
$less->checkedCompile("input.less", "output.css");


switch($country) {

case 'in':echo india();break;
case 'us':echo us();break;
case 'ja':echo japan();break;
case 'ch':echo china();break;
case 'br':echo brazil();break;
default : echo " Invalid country<br>";
}
switch ($filetype) {

	case 'zip': zip();break;
	case 'less':less();break;
	case 'css':css();break;
	default: echo " Sorry, wrong file type<br>";
}


}
else {

header("location: ../index.php");
die();

}


function india() {

$input_file=fopen("input.less","w");
$text="@primary:blue;\n body{background:@primary;}";
fwrite($input_file,$text);
fclose($input_file);
echo "India";

$less=new lessc;
$less->checkedCompile("input.less","output.css");
createzip();

}

function china() {

	echo "china";
}

function japan() {

	echo "japan";
}

function us() {

	echo "United States";
}
function brazil() {

	echo "Brazil";
}



function less() {

echo " less";

}


function zip() {

echo " Zip";

header("location: ../download.php");
}

function css() {
echo " css";

}


function createzip() {



//Don't forget to remove the trailing slash
 
$the_folder = 'my folder';
$zip_file_name = 'archive.zip';
 
$za = new ZipArchive;
 
$res = $za->open($zip_file_name, ZipArchive::CREATE);
 
if($res === TRUE) {
$za->addDir($the_folder, basename($the_folder));
$za->close();
}
else
echo 'Could not create a zip archive';




// $rootPath = realpath('my folder');
// $zip = new ZipArchive;
// $zip->open('file.zip', ZipArchive::CREATE);

// // Initialize empty "delete list"
// $filesToDelete = array();

// // Create recursive directory iterator
// $files = new RecursiveIteratorIterator(
//     new RecursiveDirectoryIterator($rootPath),
//     RecursiveIteratorIterator::LEAVES_ONLY
// );

// foreach ($files as $name => $file) {
//     // Get real path for current file
//     $filePath = $file->getRealPath();

//     // Add current file to archive
//     $zip->addFile($filePath);

//     // Add current file to "delete list" (if need)
//     if ($file->getFilename() != 'important.txt') 
//     {
//         $filesToDelete[] = $filePath;
//     }
// }

// // Zip archive will be created only after closing object
// $zip->close();




}
?>
