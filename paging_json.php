<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<div class='row justify-content-end mr-0'>
    <div class='col-sm'>
        <div class='datatable datatable-bordered datatable-head-custom datatable-default datatable-dark datatable-loaded' id='kt_datatable'>
            <div class='datatable-pager datatable-paging-loaded'>
                <ul class='datatable-pager-nav'>
                    <li>
                        <a title='First' class='datatable-pager-link datatable-pager-link-first' href='javascript:prevPage2x()' id='btn_prev_2x'>
                            <i class='flaticon2-fast-back'></i>
                        </a>
                    </li>
                    <li>
                        <a title='Previous' class='datatable-pager-link datatable-pager-link-prev' href='javascript:prevPage()' id='btn_prev'>
                            <i class='flaticon2-back'></i>
                        </a>
                    </li>
                    <li>
                        <a class='datatable-pager-link datatable-pager-link-number' id='listingTable'></a>
                    </li>
                    <li>
                        <a title='Next' class='datatable-pager-link datatable-pager-link-next' href='javascript:nextPage()' id='btn_next'>
                            <i class='flaticon2-next'></i>
                        </a>
                    </li>
                    <li>
                        <a title='Last' class='datatable-pager-link datatable-pager-link-last' href='javascript:nextPage2x()' id='btn_next_2x'>
                            <i class='flaticon2-fast-next'></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <label class='col-1 btn btn-admin_dark'>
        Page : <span id='page'></span>
    </label>
</div>

<script>
var current_page = 1;
var records_per_page = 3;

var objJson = [
    { adName: '1'},
    { adName: '2'},
    { adName: '3'},
    { adName: '4'},
    { adName: '5'},
    { adName: '6'},
    { adName: '7'},
    { adName: '8'},
    { adName: '9'},
    { adName: '10'}
]; // Can be obtained from another source, such as your objJson variable

//default
for (var i = 0; i < records_per_page && i < objJson.length; i++) 
{
    document.getElementById("listingTable").innerHTML += objJson[i].adName;
}
document.getElementById("page").innerHTML = "1/" + numPages();

function prevPage()
{
    if (current_page > 1) 
    {
        current_page = current_page - 1;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) 
    {
        current_page = current_page + 1;
        changePage(current_page);
    }
}

function prevPage2x()
{
    if (current_page > 1) 
    {
        current_page = current_page - 2;
        changePage(current_page);
    }
}

function nextPage2x()
{
    if (current_page < numPages()) 
    {
        current_page = current_page + 2;
        changePage(current_page);
    }
}

function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var btn_next_2x = document.getElementById("btn_next_2x");
    var btn_prev_2x = document.getElementById("btn_prev_2x");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");

    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) 
    {
        listing_table.innerHTML += objJson[i].adName;
    }
    page_span.innerHTML = page + "/" + numPages();

    if (page == 1) 
    {
        // btn_prev.style.visibility = "hidden";
        btn_prev.classList.add('datatable-pager-link-disabled');
        btn_prev_2x.classList.add('datatable-pager-link-disabled');

    } else 
    {
        // btn_prev.style.visibility = "visible";
        btn_prev.classList.remove('datatable-pager-link-disabled');
        btn_prev_2x.classList.remove('datatable-pager-link-disabled');
    }

    if (page == numPages()) 
    {
        // btn_next.style.visibility = "hidden";
        btn_next.classList.add('datatable-pager-link-disabled');
        btn_next_2x.classList.add('datatable-pager-link-disabled');
    }
    else 
    {
        // btn_next.style.visibility = "visible";
        btn_next.classList.remove('datatable-pager-link-disabled');
        btn_next_2x.classList.remove('datatable-pager-link-disabled');
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() 
{
    changePage(1);
};
</script>
