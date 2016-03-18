<script src="//cdn.foxycart.com/bioptimizers-test/loader.js" async defer></script>
<div class="MyPageHeader">
    Supplements
</div>

<div style="margin-top:20px;padding:40px;">    
    <div></div>
    <div style="clear: both;"></div>
    <div class="col-lg-12" style="overflow: auto;">
        <?php $cnt = 0; ?>
        <?php foreach ($products as $each_product): ?>
            <div class="invd_prod" style="">
                <img style="width: 100%;" src="<?= _MEDIA_URL . "img/product/" . $each_product['image']; ?>" />
                <div class="prod_lable"><?= $each_product['product_name']; ?></div>
                <div class="price_lable" >$<?= number_format($each_product['price'], 2); ?></div>
                <div class="prod_add_to_cart"><a href="https://bioptimizers-test.foxycart.com/cart?name=<?= urlencode($each_product['product_name']); ?>&price=<?= number_format($each_product['price'], 2); ?>&code=<?= $each_product['product_code']; ?>" class="btn btn-info">Add to Cart</a></div>
            </div>
            <?php $cnt++; if ($cnt % 4 == 0): ?>
            </div>
            <div style="clear: both;">&nbsp;</div>
            <div class="col-lg-12" style="overflow: auto;">
            <?php endif; ?>
        <?php endforeach; ?>       
    </div>
    <div style="clear: both;">&nbsp;</div>    
</div>
<!--          <div class="invd_prod" style="">
            <img style="width: 100%;" src="<?= _MEDIA_URL . "img/product/Primergen_Combo.jpg"; ?>" />
            <div class="prod_lable">Primergen Combo</div>
            <div class="prod_add_to_cart"><a href="https://bioptimizers-test.foxycart.com/cart?name=Cool%20Example&price=10&color=red&code=sku123" class="btn btn-info">Add to Cart</a></div>
        </div>-->