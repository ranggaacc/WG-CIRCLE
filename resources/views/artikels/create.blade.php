@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="page-header">
      <h1><i class="glyphicon glyphicon-edit"></i> Artikel / Create</h1>
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

            <form action="{{ route('artikels.store') }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('kategori')) has-error @endif">
                       <label for="user-field">Kategori</label>
                    <input type="text" id="kategori-field" name="kategori" class="form-control" value="{{ old("kategori") }}"/>
                       @if($errors->has("kategori"))
                        <span class="help-block">{{ $errors->first("kategori") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                       <label for="picture-field">Picture</label>
                    <input type="file" id="picture-field" name="picture" class="form-control" value="{{ old("picture") }}"/>
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('artikels.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
</section>
    <!-- /.content -->
  </div>
@include('layouts.footer')
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
       CKEDITOR.replace('description-field');
  });
</script>
 
</body>
</html>

