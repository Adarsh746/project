@extends('admin.layouts.admin.struct')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading "style="background:#36c6d3;color:white">Edit Category</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.catagory.change',$cat->shopping_cat_id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
                            <label for="cat_name" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="cat_name" type="text" class="form-control" name="cat_name" value="{{$cat->shopping_cat_name  }}" required autofocus>

                                @if ($errors->has('cat_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection