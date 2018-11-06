<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('product-inventory') }}"><i class="fa fa-list"></i> <span>Inventory</span></a></li>
        <li><a href="{{ backpack_url('product-non-inventory') }}"><i class="fa fa-list"></i> <span>NonInventory</span></a></li>
        <li><a href="{{ backpack_url('product-service') }}"><i class="fa fa-list"></i> <span>Service</span></a></li>
        <li><a href="{{ backpack_url('product-bundle') }}"><i class="fa fa-list"></i> <span>Bundle</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-cog"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ backpack_url('product-branch') }}"><i class="fa fa-list"></i> <span>Branch mark</span></a></li>
                <li><a href="{{ backpack_url('product-spec') }}"><i class="fa fa-list"></i> <span>Spec</span></a></li>
                <li><a href="{{ backpack_url('product-unit') }}"><i class="fa fa-list"></i> <span>Unit</span></a></li>
                <li><a href="{{ backpack_url('product-warehouse') }}"><i class="fa fa-list"></i> <span>Warehouse</span></a></li>
                <li><a href="{{ backpack_url('product-category') }}"><i class="fa fa-list"></i><span>Categories</span></a></li>
                <li><a href="{{ backpack_url('product-group') }}"><i class="fa fa-list"></i> <span>Group</span></a></li>

            </ul>
        </li>
    </ul>
</li>