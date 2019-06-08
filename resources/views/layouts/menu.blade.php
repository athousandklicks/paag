<li class="{{ Request::is('accounts*') ? 'active' : '' }}">
    <a href="{!! route('accounts.index') !!}"><i class="fa fa-edit"></i><span>Accounts</span></a>
</li>

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{!! route('transactions.index') !!}"><i class="fa fa-edit"></i><span>Transactions</span></a>
</li>

@if(Auth::user()->role_id < 4)
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('vendors*') ? 'active' : '' }}">
    <a href="{!! route('vendors.index') !!}"><i class="fa fa-edit"></i><span>Vendors</span></a>
</li>

<li class="{{ Request::is('artists*') ? 'active' : '' }}">
    <a href="{!! route('artists.index') !!}"><i class="fa fa-edit"></i><span>Artists</span></a>
</li>
@endif

@if(Auth::user()->role_id < 3)
<li class="{{ Request::is('accountHistories*') ? 'active' : '' }}">
    <a href="{!! route('accountHistories.index') !!}"><i class="fa fa-edit"></i><span>Account Histories</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<hr/>

<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('frames*') ? 'active' : '' }}">
    <a href="{!! route('frames.index') !!}"><i class="fa fa-edit"></i><span>Frames</span></a>
</li>

<li class="{{ Request::is('hangs*') ? 'active' : '' }}">
    <a href="{!! route('hangs.index') !!}"><i class="fa fa-edit"></i><span>Hangs</span></a>
</li>

<li class="{{ Request::is('media*') ? 'active' : '' }}">
    <a href="{!! route('media.index') !!}"><i class="fa fa-edit"></i><span>Media</span></a>
</li>



<li class="{{ Request::is('signs*') ? 'active' : '' }}">
    <a href="{!! route('signs.index') !!}"><i class="fa fa-edit"></i><span>Signs</span></a>
</li>

<li class="{{ Request::is('signLocations*') ? 'active' : '' }}">
    <a href="{!! route('signLocations.index') !!}"><i class="fa fa-edit"></i><span>Sign  Locations</span></a>
</li>

<li class="{{ Request::is('styles*') ? 'active' : '' }}">
    <a href="{!! route('styles.index') !!}"><i class="fa fa-edit"></i><span>Styles</span></a>
</li>

<li class="{{ Request::is('subjects*') ? 'active' : '' }}">
    <a href="{!! route('subjects.index') !!}"><i class="fa fa-edit"></i><span>Subjects</span></a>
</li>

<li class="{{ Request::is('supports*') ? 'active' : '' }}">
    <a href="{!! route('supports.index') !!}"><i class="fa fa-edit"></i><span>Supports</span></a>
</li>

<li class="{{ Request::is('tags*') ? 'active' : '' }}">
    <a href="{!! route('tags.index') !!}"><i class="fa fa-edit"></i><span>Tags</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

@endif

@if(Auth::user()->role_id == 1)
<hr/>
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{!! route('addresses.index') !!}"><i class="fa fa-edit"></i><span>Addresses</span></a>
</li>
@endif
