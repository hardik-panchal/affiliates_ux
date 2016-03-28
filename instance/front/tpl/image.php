

    <form action='<?php echo _U."image/".$urlArgs[0];?>' method="post" enctype="multipart/form-data">
        Your Photo: <input type="file" name="image" size="25" />
        <input type="hidden" name="id" value="<?php echo $urlArgs[0]?>">
        <input type="submit" name="submit" value="Submit" />
    </form>