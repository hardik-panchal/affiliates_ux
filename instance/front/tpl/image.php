

    <form action='<?php echo _U."image/".$urlArgs[0];?>' method="post" enctype="multipart/form-data">
       Choose your image: <input type="file" name="image" size="25" class="form-group"/>
        <input type="hidden" name="id" value="<?php echo $urlArgs[0]?>">
        <input type="submit" name="submit" value="Upload" class="form-group"/>
    </form>


<?php d($image)?>