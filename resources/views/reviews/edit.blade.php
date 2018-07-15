@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Editor Review / Edit #{{$review->id}}</h1>
    </div>
    </section>
      <!-- Main content -->
    <section class="content">
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('reviews.update', $review->id) }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Title</label>
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $review->name : old("name") }}">
                        @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea type="text" id="description-field" name="description" rows="6" class="form-control" >{{$review->description}}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('picture')) has-error @endif">
                    <label for="picture-field">picture</label>
                    <div class="form-group">
                        <img width="100" height="100" src="{{ asset($review->picture) }}" class="img-responsive"/>
                    </div>
                    <input type="file" class="form-control"  accept="image/x-png,image/gif,image/jpeg" id="picture" name="picture"/>								
                       @if($errors->has("picture"))
                        <span class="help-block">{{ $errors->first("picture") }}</span>
                       @endif
                    </div>
                      <div class="form-group @if($errors->has('picture')) has-error @endif">
                    <label for="picture-field">picture 2</label>
                    <div class="form-group">
                        <img width="100" height="100" src="{{ asset($review->picture2) }}" class="img-responsive"/>
                    </div>
                    <input type="file" class="form-control"  accept="image/x-png,image/gif,image/jpeg" id="picture2" name="picture2"/>								
                       @if($errors->has("picture 2"))
                        <span class="help-block">{{ $errors->first("picture 2") }}</span>
                       @endif
                    </div>
                      <div class="form-group @if($errors->has('picture')) has-error @endif">
                    <label for="picture-field">picture 3</label>
                    <div class="form-group">
                        <img width="100" height="100" src="{{ asset($review->picture3) }}" class="img-responsive"/>
                    </div>
                    <input type="file" class="form-control"  accept="image/x-png,image/gif,image/jpeg" id="picture3" name="picture3"/>								
                       @if($errors->has("picture 3"))
                        <span class="help-block">{{ $errors->first("picture 3") }}</span>
                       @endif
                    </div>      
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('reviews.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
