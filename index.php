<?php
echo 'hi rakhaa'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Phonebook Application</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>

<body>
    <div class="container">
        <h1>Welcome to Phonebook Application by Rakhaa Ismail</h1>
        <h1>Here is a simple phonebook application you can show, insert names and dispay</h1>
        <form method="post" name="form">
            <p>Your First Name: <input type="text" name="first_name" /></p>
            <p>Your Secound Name: <input type="text" name="last_name" /></p>
            <p>Your Phone Number: <input type="text" name="phone_number" /></p>
            <p><input name='Insert' type="submit" /></p>
        </form>

        <form method="get" name="Display_Names">
            <p>Click here to Dispaly a list of names: <button type="submit" name="Display_Names">Display</button>
        </form>

        <form method="get" name="Display_all">
            <p>Click here to Dispaly a name with numbers associated with it.: <button type="submit" name="Display_all">Display</button>
        </form>

        <?php
        if (isset($_POST['Insert'])) {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone_number = $_POST['phone_number'];

            echo 'first_name', $first_name, 'last_name ', $last_name, 'phone number', $phone_number;

            $mysqli = new mysqli('db', 'root', 'example', 'phonebook_app');
            $sql = "INSERT INTO phonebook (first_name,last_name,phone_number) VALUES('$first_name','$last_name','$phone_number')";
            $result = $mysqli->query($sql);
        }


        if (isset($_GET['Display_Names'])) {

            echo 'Show a list of names.';
            $mysqli = new mysqli('db', 'root', 'example', 'phonebook_app');
            $sql_show = "SELECT * FROM phonebook";
            $result = $mysqli->query($sql_show);


            if (mysqli_num_rows($result) > 0) {
        ?>
                <table>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "No result found";
            }
        }

        if (isset($_GET['Display_all'])) {

            echo 'Show a name with numbers associated with it.';
            $mysqli = new mysqli('db', 'root', 'example', 'phonebook_app');
            $sql_show = "SELECT * FROM phonebook";
            $result = $mysqli->query($sql_show);


            if (mysqli_num_rows($result) > 0) {
            ?>
                <table>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Phone number</td>
                        <td>Another Phone Number</td>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["phone_number"]; ?></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>
        <?php
            } else {
                echo "No result found";
            }
        }
        ?>

    </div>
</body>

</html>