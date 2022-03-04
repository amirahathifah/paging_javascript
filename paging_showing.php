<input id="paging" type="hidden" value="1"></input>
<input id='testing' type="text" value=""></input>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var product_int = 0;
    var total = $("#total").val();

    if(total > 10)
    {
        max_total = 10;
    }
    else
    {
        max_total = total;
    }
    var min = $("#min").html('1');
    var max = $("#max").html(max_total);

    var category = $("#category").val();
    var vendor_id = $("#vendor_id").val();

    $.get("standalone/merchant_product.php", {
        paging: product_int,
        category: category,
        vendor_id:vendor_id
        },
        function(data, status){
            $("#table_product").html(data);
        },
    );
});
function showDetails(page) {
    var show = page.innerHTML;
    var show_int = parseInt(show);
    var product = page.getAttribute("data-page");
    var product_int = parseInt(product);

    var min = $("#testing").val(show_int);
    var total = $("#total").val();

    if(product_int == 0)
    {
        if(total > 10)
        {
            var min = $("#min").html('1');
            var max = $("#max").html('10');
        }
        else
        {
            var min = $("#min").html('1');
            var max = $("#max").html(total);
        }
    }
    else
    {
        var min_total = product_int + '1';
        var max_total = show_int * 10;
        var min = $("#min").html(min_total);
        var max = $("#max").html(max_total);
    }
    var category = $("#category").val();
    var vendor_id = $("#vendor_id").val();

    $.get("standalone/merchant_product.php", {
        paging: product_int,
        category: category,
        vendor_id:vendor_id
        },
        function(data, status){
            $("#table_product").html(data);
        },
    );
}
</script>

<div class='row justify-content-end mr-0'>
    <div class='col-sm'>
        <div class='datatable datatable-bordered datatable-head-custom datatable-default datatable-dark datatable-loaded' id='kt_datatable'>
            <div class='datatable-pager datatable-paging-loaded'>
                <ul class='datatable-pager-nav'>
                    <li>
                        <a title='First' class='datatable-pager-link datatable-pager-link-first datatable-pager-link-disabled' data-page='1' disabled='disabled'>
                            <i class='flaticon2-fast-back'></i>
                        </a>
                    </li>
                    <li>
                        <a title='Previous' class='datatable-pager-link datatable-pager-link-prev datatable-pager-link-disabled' data-page='1' disabled='disabled'>
                            <i class='flaticon2-back'></i>
                        </a>
                    </li>
                    <li style='display: none;'>
                        <input type='text' class='datatable-pager-input form-control' title='Page number'>
                    </li>
                    <input id='total' type='hidden' value='<?= $total ?>'></input>
                    <?php
                    if($total > 10)
                    {
                        $max_total = 10;
                    }
                    else
                    {
                        $max_total = $total;
                    }
                    $min_total_page = 1;
                    $max_total_page = round($total/10); 
                    for($i=$min_total_page; $i<=$max_total_page; $i++)
                    {
                        ?>
                        <li>
                            <a class='datatable-pager-link datatable-pager-link-number' data-page='<?= $i-1 ?>' onclick='showDetails(this)'><?= $i ?></a>
                        </li>
                        <?php
                        if($i >= 5)
                        {
                            break;
                        }
                        //continue;
                    }
                    ?>
                    <li>
                        <a title='Next' class='datatable-pager-link datatable-pager-link-next' data-page='2'>
                            <i class='flaticon2-next'></i>
                        </a>
                    </li>
                    <li>
                        <a title='Last' class='datatable-pager-link datatable-pager-link-last' data-page='10'>
                            <i class='flaticon2-fast-next'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <label class='col-sm-2 btn btn-admin_dark'>
        Showing <span id='min'></span> - <span id='max'></span>  of <?php echo $total; ?></label>
</div>
