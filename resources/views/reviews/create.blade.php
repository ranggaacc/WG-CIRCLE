@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> review / Create</h1>
  </div>
  </section>
    <!-- Main content -->
  <section class="content">
      @include('error')
      @if(Session::has('message'))
         <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
      @elseif(Session::has('message2'))
         <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message2') }}</p>
      @endif
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('reviews.store') }}"  enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Title</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea type="text" id="description-field" name="description" rows="6" class="form-control" value="{{ old("description") }}"></textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                       <label for="picture-field">Picture 1</label>
                    <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="picture" name="picture"/>								
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture2')) has-error @endif">
                         <label for="picture-field">Picture 2</label>
                    <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="picture2" name="picture2"/>								
                       @if($errors->has("picture2"))
                        <span class="help-block">{{ $errors->first("picture 2") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture3')) has-error @endif">
                         <label for="picture-field">Picture 3</label>
                    <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="picture3" name="picture3"/>								
                       @if($errors->has("picture3"))
                        <span class="help-block">{{ $errors->first("picture 3") }}</span>
                       @endif
                    </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('reviews.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
 </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>
