var url = $('meta[name = path]').attr("content");
var csrf = $('mata[name = csrf-token]').attr("content");


var products_table;

function product_list() {

    products_table = $('#products_table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: {
            dataType: "JSON",
            type: "get",
            url: url + "/product/index",
        },
        columns: [
            { data: 'DT_RowIndex' },
            { data: 'title' },
            { data: 'description' },
            { data: 'categoryName' },
            { data: 'subcategoryName' },
            { data: 'price' },
            {
                data: null,
                render: function (data, type, row, meta) {
                    var edit = '', del = '', generate = '';
                    edit = "<a  href='javascript:void(0)' onclick='editProducts(" + data.id + ")' ><p class='btn btn-sm btn-primary'>Edit</p></a> ";

                    del = "<a  href='javascript:void(0)'><p class='btn btn-sm btn-danger' onclick='deleteProducts(" + data.id + ")' >Delete</p></a> ";
                    return edit + del;
                }
            }
        ],
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: true,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search"
        },
        // dom: 'Bfrtip',

    });
}


function deleteProducts(value) {

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }),
        $.ajax({
            type: "GET",
            url: url + "/product/delete/" + value,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    title: response.status,
                    text: response.message,
                    icon: response.status,
                    confirmButtonText: 'Cool'
                });
            }
        });
}