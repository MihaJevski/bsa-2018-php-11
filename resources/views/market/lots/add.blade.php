@extends('layouts.app')

@section('title', 'Add lot')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add lot</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="active">
                    <strong>Add new lot</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" action="{{ url('api/v1/lots') }}" class="form-horizontal">
                        @csrf()
                        <div class="form-group {{ $errors->has('currency_id') ? 'has-error' : '' }}"><label class="col-sm-2 control-label">Currency_id</label>
                            <div class="col-sm-10"><input type="text" name="currency_id" value="{{ old('currency_id') }}" class="form-control">
                                @if($errors->has('currency_id'))
                                    <span class="help-block m-b-none">{{ $errors->first('currency_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('date_time_open') ? 'has-error' : '' }}"><label class="col-sm-2 control-label">Date time open</label>
                            <div class="col-sm-10"><input type="text" name="date_time_open" value="{{ old('date_time_open') }}" class="form-control">
                                @if($errors->has('date_time_open'))
                                    <span class="help-block m-b-none">{{ $errors->first('date_time_open') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('date_time_close') ? 'has-error' : '' }}"><label class="col-sm-2 control-label">Date time close</label>
                            <div class="col-sm-10"><input type="number" name="date_time_close" value="{{ old('date_time_close') }}" class="form-control">
                                @if($errors->has('date_time_close'))
                                    <span class="help-block m-b-none">{{ $errors->first('date_time_close') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}"><label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10"><input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                @if($errors->has('price'))
                                    <span class="help-block m-b-none">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection