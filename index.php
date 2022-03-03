<input id="paging" type="hidden" value="1"></input>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function() {

    var datapaging = 0;
    var pagingnext = 1;
    var pagingprevious = 0;

    var category = $("#category").val();
    var vendor_id = $("#vendor_id").val();

    $.get("standalone.php", {
        paging: datapaging,
        category: category,
        vendor_id:vendor_id,
        },
        function(data, status){
            $("#table_product").html(data);
        },
    );

    $("#Next1").click(function() {
        var paging = $("#paging").val();
        var datapaging = parseInt(paging);
        var pagingnext = datapaging + 1;
        var pagingprevious = datapaging - 1;

        $("#paging").val(pagingnext);

        $.get("standalone.php", {
            paging: datapaging,
            category: category,
            vendor_id:vendor_id
            },
            function(data, status){
                $("#table_product").html(data);
            },
        );
        if(pagingnext == 1 || pagingprevious == 0)
        {
            document.getElementById("page1").style.display = "block";
            document.getElementById("page2").style.display = "none";
        }
        else
        {
            document.getElementById("page1").style.display = "none";
            document.getElementById("page2").style.display = "block";
        }
    });

    $("#Next2").click(function() {
        var paging = $("#paging").val();
        var datapaging = parseInt(paging);
        var pagingnext = datapaging + 1;
        var pagingprevious = datapaging - 1;

        $("#paging").val(pagingnext);

        $.get("standalone.php", {
            paging: datapaging,
            category: category,
            vendor_id:vendor_id
            },
            function(data, status){
                $("#table_product").html(data);
            },
        );
        if(pagingnext == 1 || pagingprevious == 0)
        {
            document.getElementById("page1").style.display = "block";
            document.getElementById("page2").style.display = "none";
        }
        else
        {
            document.getElementById("page1").style.display = "none";
            document.getElementById("page2").style.display = "block";
        }
    });

    $("#Prev").click(function() {
        var paging = $("#paging").val();
        var datapaging = parseInt(paging);
        var pagingnext = datapaging + 1;
        var pagingprevious = datapaging - 1;

        $("#paging").val(pagingprevious);

        $.get("standalone.php", {
            paging: datapaging,
            category: category,
            vendor_id:vendor_id,
            },
            function(data, status){
                $("#table_product").html(data);
            },
        );
        if(pagingnext == 1 || pagingprevious == 0)
        {
            document.getElementById("page1").style.display = "block";
            document.getElementById("page2").style.display = "none";
        }
        else
        {
            document.getElementById("page1").style.display = "none";
            document.getElementById("page2").style.display = "block";
        }
    });

    if(pagingnext == 1 && pagingprevious == 0)
    {
        document.getElementById("page1").style.display = "block";
        document.getElementById("page2").style.display = "none";
    }
});
</script>
<a id="table_product" class="table-responsive"></a>
<div class="card-toolbar" id="page1">
    <button class="btn btn-light btn-hover-dark btn-sm" id="No_Prev">Previous</button>
    <button class="btn btn-dark btn-hover-light btn-sm" id="Next1">Next</button>
</div>
<div class="card-toolbar" id="page2">
    <button class="btn btn-light btn-hover-dark btn-sm" id="Prev">Previous</button>
    <button class="btn btn-dark btn-hover-light btn-sm" id="Next2">Next</button>
</div>
