@extends('admin.dashboard')

@section('partial')
<style>
    .active1 {
        background: #f5f5f5;
    }
</style>

<div class="col-xs-9" style="border: 1px solid #ddd; padding-top:10px;">
    @foreach($feeds as $key => $feed)
    {!! Form::open([ 'method' => 'put', 'route' => ['feed_settings_activation', $feed->id ]]) !!}
    <div class="row" style='border-bottom: 2px solid #ddd; padding:20px'>
        <div class="col-md-2">
                {!! Form::checkbox('is_active', 1, $feed->is_active, ['style' => 'zoom:1.3;cursor:pointer', 'onchange' => 'this.form.submit()']) !!}
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">APP KEY</div>
                <div class="col-md-8">
                    {!! Form::text('app_key', $feed->app_key, array_merge(['class' => 'form-control'], ['disabled'])) !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">SECRET</div>
                <div class="col-md-8">
                    {!! Form::text('secret', $feed->secret, array_merge(['class' => 'form-control'], ['disabled'])) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    @endforeach
</div>
<script type="text/javascript">
    $('.ative_checkbox').click(function() {
        console.log("DFgdfhs");
        });
</script>
@endsection
