
<div id="exTab1" >
    <ul  class="nav nav-pills">
        <li class="active">
            <a  href="#1a" data-toggle="tab">Products</a>
        </li>
        <li><a href="#2a" data-toggle="tab">Transactions</a>
        </li>
    </ul>


    @if(!Auth::guest() && ($user->id == Auth::user()->id || Auth::user()->role_id < 3))
    <div class="tab-content clearfix">
        <div class="tab-pane active" id="1a">
            <h3 class="text-center "> Products by this User</h3>
            @include('products.table')

        </div>
        <div class="tab-pane" id="2a">
            <h3 class="text-center "> Transactions done by this User</h3>
            @include('transactions.table')

    </div>

    @endif
</div>
</div>
</div>









