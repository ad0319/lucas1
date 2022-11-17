<?php
$allowedExts = array("pdf", "doc");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "application/docx")
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "fname".$_POST["fname"] . "<br>";
    echo "lname".$_POST["lname"] . "<br>";
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }

      echo PHP_EOL;
      echo PHP_EOL;
      echo PHP_EOL;

      if (file_exists("upload/" . $_FILES["files"]["name"]))
      {
      echo $_FILES["files"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["files"]["tmp_name"],
      "upload/" . $_FILES["files"]["name"]);
  echo "Stored in: " . "upload/" . $_FILES["files"]["name"];
      }
      
    }
  }
else
  {
  echo "Invalid file";
  }
?>