<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Example</title>
    <!-- Tailwind CSS -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/vendors/colorbox/example3/colorbox.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/settings.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/rs-plugin/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('source/assets/dest/css/animate.css') }}">
	<link rel="stylesheet" title="style" href="{{ asset('source/assets/dest/css/huong-style.css') }}">
    <link rel="stylesheet" href="{{ asset('source/assets/dest/css/style.css') }}">      

</head>
@extends('layouts.master')
@section('content')

<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2>Edit Product</h2>
    </div>
    <div class="space50">&nbsp;</div>
    @include('error')
    <div class="container">
        {{-- Sửa action bằng route('admin-edit') --}}
        <form action="{{ route('admin-edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Tuân theo chuẩn RESTful --}}

            <div class="form-group">
                <label for='editId'>ID</label>
                <input type="number" class="form-control" name="editId" value="{{ $product->id }}" readonly>
            </div>

            <div class="form-group">
                <label for='editName'>Name</label>
                <input type="text" class="form-control" name="editName" id="editName" placeholder="Enter name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for='editPrice'>Price</label>
                <input type="number" min=10000 class="form-control" name="editPrice" id="editPrice" placeholder="Enter price" value="{{ $product->unit_price }}" required>
            </div>

            <div class="form-group">
                <label for='editPromotionPrice'>Promotion Price</label>
                <input type="number" min=10000 class="form-control" name="editPromotionPrice" id="editPromotionPrice" value="{{ $product->promotion_price }}" placeholder="Enter promotion price">
            </div>

            <div class="form-group">
                <label for='editUnit'>Unit</label>
                <input type="text" class="form-control" name="editUnit" id="editUnit" value="{{ $product->unit }}" placeholder="Enter unit" required>
            </div>

            <div class="form-group">
                <label for='editNew'>New</label>
                <input type="number" min=0 class="form-control" name="editNew" id="editNew" value="{{ $product->new }}" placeholder="Enter new" required>
            </div>

            <div class="form-group">
                <label for='editType'>Type</label>
                <input type="text" class="form-control" name="editType" id="editType" value="{{ $product->id_type }}" placeholder="Enter type" required>
            </div>

            <div class="form-group">
                <label for='editImage'>Image file</label>
                <input type="file" class="form-control-file" name="editImage" id="editImage">
            </div>

            <div class="form-group">
                <img id="preview-image-before-upload" src="{{ asset('source/image/product/' . $product->image) }}" alt="preview image" style="max-height: 250px;">
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#editImage').change(function() {
                            let reader = new FileReader();
                            reader.onload = (e) => {
                                $('#preview-image-before-upload').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        });
                    });
                </script>
            </div>

            <div class="form-group">
                <label for='editDescription'>Description</label>
                <textarea name="editDescription" id="editDescription" required>{{ $product->description }}</textarea>
                <script>
                    CKEDITOR.replace('editDescription');
                </script>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="space50">&nbsp;</div>
</div>

@endsection
