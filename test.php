<HTML>
    Hello
    <?php
    echo"<br>hello world";
    echo"<br>".__DIR__;

    $t = date("H");
    echo $t."<br>".$t."<br>";

    if ($t < "18") {
        echo "Have a good day!";
    } else {
        echo "Have a good night!";
    }
    ?>
</HTML>