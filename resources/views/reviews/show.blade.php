@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Editor reviews / Show #{{$reviews->id}}</h1>
        <form action="{{ route('reviews.destroy', $reviews->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
</section>

      <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="picture">Picture</label>
                    <img width="100" height="100" src="{{ asset($reviews->picture) }}" class="img-responsive"/>
                    <img width="100" height="100" src="{{ asset($reviews->picture2) }}" class="img-responsive"/>
                    <img width="100" height="100" src="{{ asset($reviews->picture3) }}" class="img-responsive"/>
                </div>
                    <div class="form-group">
                     <label for="appsname">Name</label>
                     <p class="form-control-static">{{$reviews->name}}</p>
                </div>
                <div class="form-group">
                     <label for="token">Deskripsi</label>
                     <p class="form-control-static">{{$reviews->description}}</p>
                </div>
                <div class="form-group">
                     <label for="click">User</label>
                     <p class="form-control-static">{{$reviews->user}}</p>
                </div>
                    <div class="form-group">
                     <label for="created_at">Created</label>
                     <p class="form-control-static">{{$reviews->created_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="updated_at">Updated</label>
                     <p class="form-control-static">{{$reviews->updated_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="updated_at">Status</label>
                     <p class="form-control-static">{{$reviews->status}}</p>
                </div>

            </form>

            <a class="btn btn-link" href="{{ route('reviews.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
<script>
</script>
</body>
</html>
