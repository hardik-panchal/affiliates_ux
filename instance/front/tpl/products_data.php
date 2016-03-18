<?php foreach ($products as $each_products): ?>
    <tr id="tr_<?= $each_products['id']; ?>">        
        <td><?= $each_products['product_name']; ?></td>
        <td><?= $each_products['product_code']; ?></td>
        <td><?= $each_products['description']; ?></td>
        <td style="display:none;"><?= $each_products['color']; ?></td>
        <td>$<?= number_format($each_products['price'],2); ?></td>        
        <td>
            <?php if ($each_products['image'] != ''): ?>
                <div id="div_view_image_<?php print $each_products['id'] ?>" onclick="viewImage('<?php print $each_products['id'] ?>')" style="float:left;cursor: pointer;color:#008000;"><i class="fa fa-eye"></i>&nbsp;<span id="span_view_image_<?php print $each_products['id'] ?>">View Image</span></div>
            <?php else: ?>
                <div style="margin-right: 13px;float:left;color:#f00;"><i class="fa fa-eye"></i>&nbsp;No Image</div>
            <?php endif; ?>
            <div onclick="doOpenEditPopup('<?php print $each_products['id'] ?>')" style="margin-left: 15px;float:left;cursor: pointer;color:#1294d5;"><i class="fa fa-edit"></i>&nbsp;Edit</div>
            <div onclick="doOpenDeletePopup('<?php print $each_products['id'] ?>')" style="margin-left: 15px;float:left;cursor: pointer;color:maroon;"><i class="fa fa-remove"></i>&nbsp;Delete</div>
            <div style="clear: both;"></div>
            <input type="hidden"  id="hid_image_<?php print $each_products['id'] ?>"  value="<?php print $each_products['image'] ?>" />
            <div  id="div_image_<?php print $each_products['id'] ?>" style="overflow: auto;display: none; margin-top: 10px;">
                <img src="" style="width: 100px;max-height: 200px;" />
            </div>
        </td>    
    </tr>
    <?php
endforeach;
if (count($products) == 0):
    echo "<tr><td colspan='10'>No Record Found!</td></tr>";
endif;
?>
