@extends('layouts.master')

@section('content')
     <div class="container">
         <div id="content" class="space-top-none">
             <div class="main-content">
                 <div class="space60">&nbsp;</div>
                 <div class="row">
                     <div class="col-sm-12">
                         <div class="beta-products-list">
                             <h4>Search Products</h4>
                             <div class="beta-products-details">
                                 <p class="pull-left">{{ count($products) }} styles found</p>
                                 <div class="clearfix"></div>
                             </div>
                             @for ($i = 0; $i < count($products)/4; $i++)
                                 <div class="row">
                                     @for ($j = $i*4; $j < ($i + 1)*4; $j++ )
                                         @if(isset($products[$j]))
                                             <div class="col-sm-3" style="margin-bottom: 30px;">
                                                 <div class="single-item">
                                                     <div class="single-item-header">
                                                         <a href="/detail/{{ $products[$j]->id }}"><img src='/source/image/product/{{ $products[$j]->image }}' style="height: 250px; object-fit:cover"></a>
                                                     </div>
                                                     <div class="single-item-body">
                                                         <p class="single-item-title">{{ $products[$j]->name }}</p>
                                                         <p class="single-item-price">
                                                             <span>{{ $products[$j]->unit_price }}</span>
                                                         </p>
                                                     </div>
                                                     <div class="single-item-caption">
                                                         <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                         <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                                         <div class="clearfix"></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                     @endfor
                                 </div>
                             @endfor
                             <div class="d-flex justify-content-center">
                                 {{ $products->links('pagination::bootstrap-4') }}
                             </div>
                         </div> <!-- .beta-products-list -->
                         <div class="space50">&nbsp;</div>
                     </div>
                 </div> <!-- end section with sidebar and main content -->
             </div> <!-- .main-content -->
         </div> <!-- #content -->
     </div> <!-- .container -->
 @endsection