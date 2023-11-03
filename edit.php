<?php
include"./database.php";
$id=$_GET['id'];
$sql="SELECT * FROM `notes` WHERE id=$id";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$title=$row["title"];
$description=$row["description"];

if(isset($_POST["submit"])){
    $title=$_POST["title"];
    $description=$_POST["description"];
    $sql="UPDATE `notes` SET id=$id,title='$title',description='$description' where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo"Updated successfully";
        header("location:./index.php");
    }
    else{
        echo"No";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<div class="w-full max-w-xs container m-auto">
  <p class="font-semibold text-lg pt-20 text-center">Edit Note</p>
  <form class="mt-20 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
      <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
              Title
          </label>
          <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="title" type="text" name="title" value=<?php echo $title; ?>
              >
      </div>
      <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
              Description
          </label>
          <textarea rows="5"
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
              id="description" type="text" name="description"
            >
            <?php
            echo
            $description
            ?>
              </textarea>
      </div>
      <div class="flex items-center justify-between">
          <button
              class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit" name="submit">
              Update
          </button>
      </div>
  </form>
</div>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>