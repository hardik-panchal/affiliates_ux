<?php foreach ($users as $each_users): ?>
    <tr id="tr_<?= $each_users['id']; ?>">
        <td><?= $each_users['first_name'] . " " . $each_users['last_name']; ?></td>
        <td><?= $each_users['email']; ?></td>
        <td><?= $each_users['phone']; ?></td>
        <td><?= $each_users['designation']; ?></td>
        <td>
            <div onclick="doOpenEditPopup('<?php print $each_users['id'] ?>')" style="float:left;cursor: pointer;color:#1294d5;"><i class="fa fa-edit"></i>&nbsp;Edit</div>
            <div onclick="doOpenDeletePopup('<?php print $each_users['id'] ?>')" style="margin-left: 15px;float:left;cursor: pointer;color:maroon;"><i class="fa fa-remove"></i>&nbsp;Delete</div>
        </td>    
    </tr>
    <?php
endforeach;
if (count($users) == 0):
    echo "<tr><td colspan='10'>No Record Found!</td></tr>";
endif;
?>
