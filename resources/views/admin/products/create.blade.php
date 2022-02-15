@extends('admin.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            {{-- <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data"> --}}
            <form action="javascript:void(0);" id="productForm" onsubmit="prodStore()"  enctype="multipart/form-data">
                {{-- @csrf --}}
                <div class="form-group">
                    <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="give a product title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                        <textarea id="description" class="form-control" name="description" rows="3">

                        </textarea>
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                        <input type="text" name="price" id="price" placeholder="give a product price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">category</label>
                        <select name="category" class="form-control" id="category">
                            <option value="">Select A category</option>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>          
                </div>
                <div class="form-group">
                    <select name="subcategory" class="form-control" id="subcategory">
                        <option value="">Select A Sub Category</option>
                        @foreach ($subcategory as $scat)
                            <option value="{{$scat->id}}">{{$scat->title}}</option>
                        @endforeach
                    </select>  
                </div>
                <div class="form-group">
                    <label for="thumbnail">thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-4 mx-auto text-center">
                        <div class="form-group ">
                            <button type="submit" class="form-control bg-primary" value="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')

<script src="https://cdn.tiny.cloud/1/bq5y34h9ajjm1loavd38ef7oql1271dzbsejv2hceqf40zfi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script src="{{asset('public/assets/js/tinymce.min.js')}}"></script> --}}
<script>
    tinymce.init({
        selector: '#description',
    });
    </script>
<script>    
    
    function prodStore(){

        $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            }),
        $.ajax({
            type: "POST",
            url: url + "/product/store",
            data: 
               new FormData($("#productForm")[0]),
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    title: response.status,
                    text: response.message,
                    icon: response.status,
                    confirmButtonText: 'Cool'
                })
               
            }
        });
    }
</script>

    
@endsection
