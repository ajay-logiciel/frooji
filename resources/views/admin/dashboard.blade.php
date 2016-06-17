@extends('admin.layouts.app')

@section('content')
<style type="text/css">
    ul {
        list-style-type: none;
        text-align: center;
    }
    ul li{
        width: 100%;
    }
    ul li a{
        width: 100%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    <!-- Left Side (Tabs) -->
                    <div id="tab-left" class="col-md-3 col-sm-4 col-xs-12">
                        <ul list-style-type="none" class="nav">
                            <li class="active1">
                                {!! link_to('/admin/feed_settings', 'Feed Settings') !!}
                            </li>
                            <li class="active2">
                                {!! link_to('/admin/products', 'Products') !!}
                            </li>
                        </ul>
                    </div>
                    <!-- Right Side -->
                        @yield('partial')
 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
