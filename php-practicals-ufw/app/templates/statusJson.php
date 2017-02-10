<html>
    <body>               
           <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username">

            <label for="message">Message:</label>
            <textarea name="message"></textarea>
			<input type="hidden" name="_method" value="POST">
            <input type="submit" value="Tweet!">
        </form>
        <br>
        <br>
        <?php
        foreach ($allStatus as $key => $value) {
			$key = $key + 1;
            echo "<p>".$value. "</p>
				<form action='/statusJson/".$key."' method='POST'>
						<input type='hidden' name='_method' value='DELETE'>
						<input type='submit' value='Delete'>
				</form>
				<br>
				<br>";
        }
        ?>
    </body>
</html>
