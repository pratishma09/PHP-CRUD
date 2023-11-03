<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Taking App</title>
</head>

<body>
    <?php include "./navbar.php" ?>
    <?php include "./database.php" ?>

    <?php
    if (isset($_POST["add"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $sql = "INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$description')";
        $res = mysqli_query($conn, $sql);
    }
    ?>
    <div class="w-full max-w-xs container mx-auto">
        <form class="mt-20 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title" type="text" placeholder="Title" name="title">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea rows="5"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="description" type="text" name="description">
                    </textarea>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" name="add">
                    Add
                </button>
            </div>
        </form>
    </div>
    <div class="container flex flex-col items-center">
        <div class="py-5">
            <p class="font-semibold text-xl">Your notes</p>
        </div>
        <?php
        $sql = "SELECT * FROM `notes`";
        $res = mysqli_query($conn, $sql);
        $empty = true;
        while ($fetch = mysqli_fetch_assoc($res)) {
            $empty = false;
            echo '
            <div class="flex flex-col justify-around w-1/2 rounded-2xl py-2">
            <div>
                <p class="font-medium">' . $fetch["title"] . '</p>
                <p class="font-light">' . $fetch["description"] . '</p>
            </div>
            <div class="flex flex-row py-2">
                <a href="./edit.php?id=' . $fetch["id"] . '"class="flex edit flex-row bg-green-500 mr-5 text-white rounded-lg p-2" id="edit" type="button">
                    <p>Edit</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                
                <a href="./delete.php?id=' . $fetch["id"] . '" class="flex edit flex-row bg-red-500 text-white rounded-lg p-2" id="edit">
                    <p>Delete</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    </a>
                
            </div>
        </div>
            ';
        }
        if ($empty) {
            echo '
            <div>
                <p class="font-medium">Message:</p>
                <p class="font-light">No notes are available.</p>
            </div>
            ';
        }
        ?>

    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>