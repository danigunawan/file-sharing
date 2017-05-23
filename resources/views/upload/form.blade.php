@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <h4 class="tittle-w3layouts">{{ $title }}</h4>
    <hr>
    <form action="{{ route('upload.upload') }}" role="form" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}

        <div class="form-group {{ $errors->has('file') ? 'has-error': '' }}">
            <label for="file">File <small>Max file size is 500kb</small></label>
            <input name="file" type="file" class="">
            <span class="help-block">{{ $errors->first('file') }}</span>
        </div>

        <div class="form-group {{ $errors->has('label') ? 'has-error': '' }}">
            <label for="label">File Name</label>
            <input name="label" type="text" class="form-control" value="{{ old('label') }}">
            <span class="help-block">{{ $errors->first('label') }}</span>
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error': '' }}">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control">
            <span class="help-block">{{ $errors->first('password') }}</span>
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error': '' }}">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            <span class="help-block">{{ $errors->first('description') }}</span>
        </div>

        <div class="form-group {{ $errors->has('tos') ? 'has-error': '' }}">
            <div class="checkbox">
                <label>
                <input name="tos" type="checkbox" value="1">I Agree To The <a type="button" data-toggle="modal" data-target="#rules" href="">Terms &amp;Conditions</a>
                </label>
                </div
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                Upload File
                </button>
            </div>
    </form>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="rules" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Terms &amp; Conditions</h4>
      </div>
      <div class="modal-body">
        @include('partials.rule')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection