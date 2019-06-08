
<div id="exTab1" >
    <ul  class="nav nav-pills">
        <li class="active">
            <a  href="#1a" data-toggle="tab">Product Details</a>
        </li>
        <li><a href="#2a" data-toggle="tab">Transactions on this Product</a>
        </li>

    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Product Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dimension</td>
                        <td>
                            {!! $product->dimension_description !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            {!! $product->type !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Support Type</td>
                        <td>
                            {!! $product->support_type !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Height</td>
                        <td>
                            {!! $product->height !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Width</td>
                        <td>
                            {!! $product->width !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Depth</td>
                        <td>
                            {!! $product->depth !!}
                        </td>
                    </tr>

                    <tr>
                        <td>Weight</td>
                        <td>
                            {!! $product->weight !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Hangable</td>
                        <td>
                            @if($product->hangable == 1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Frame</td>
                        <td>
                            @if($product->frame == 1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Sign</td>
                        <td>
                            @if($product->sign == 1)
                            Yes
                            @else
                            No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Signature Location</td>
                        <td>
                            {!! $product->signature_location !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Callback Url</td>
                        <td>
                            {!! $product->callback_url !!}
                        </td>
                    </tr>

                    <tr>
                        <td>City</td>
                        <td>
                            {!! $product->city !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                            {!! $product->country !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Created </td>
                        <td>
                            {!! $product->created_at->format('D d, M, Y h:i') !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Last Updated </td>
                        <td>
                            {!! $product->updated_at->format('D d, M, Y h:i') !!}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Brief Description Field -->
            <div class="form-group">
                {!! Form::label('brief_description', 'Brief Description:') !!}
                <p>{!! $product->brief_description !!}</p>
            </div>

            <!-- Full Description Field -->
            <div class="form-group">
                {!! Form::label('full_description', 'Full Description:') !!}
                <p>{!! $product->full_description !!}</p>
            </div>

            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_fullview}}" alt="{{$product->image_fullview}}" style="width:80%;">
                        </div>

                        <div class="item">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_leftside}}" alt="{{$product->image_leftside}}" style="width:80%;">
                        </div>

                        <div class="item">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_rightside}}" alt="{{$product->image_rightside}}" style="width:80%;">
                        </div>
                        <div class="item">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_back}}" alt="{{$product->image_back}}" style="width:80%;">
                        </div>

                        <div class="item">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_hanged}}" alt="{{$product->image_hanged}}" style="width:80%;">
                        </div>
                        <div class="item">
                            <img src="/images/artworks/{{$product->sku}}/{{$product->image_gallery}}" alt="{{$product->image_gallery}}" style="width:80%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="2a">
            @if(!Auth::guest() && ($product->user_id == Auth::user()->id || Auth::user()->role_id < 3))<h3 class="text-center "> Transactions done on this Product</h3>
            @include('transactions.table')

        </div>

        @endif
        </div>
    </div>
</div>







