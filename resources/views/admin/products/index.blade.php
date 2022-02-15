@extends('admin.home')
@section('title',"Product List show")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <h3 class="bg-success">Product List</h3>
           <div class="text-center mx-auto">
            <table class="table table-stripped table-hover" celspaccing="0" cellpadding="0" id="products_table">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>Title</th>
                        <th>Discription</th>
                        <th>Category Name</th>
                        <th>Sub-Category Name</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
           </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
<script src="{{ asset('public/assets/js/products.js') }}"></script>
<script>
    product_list();
</script>
@endsection
