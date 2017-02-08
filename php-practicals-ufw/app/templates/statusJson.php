<html>
    <body>               
           <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username">

            <label for="message">Message:</label>
            <textarea name="message"></textarea>

            <input type="submit" value="Tweet!">
        </form>
        <br>
        <br>
        <?php
        foreach ($allStatus as $statuses) {

            echo $statuses . "<br><br>";
        }
        ?>
    </body>
</html>
