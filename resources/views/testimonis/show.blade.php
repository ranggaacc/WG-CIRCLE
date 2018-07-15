@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<section class="content-header">
<div class="page-header">
      <h1>Testimoni / Show #{{$testimoni->id}}</h1>
      <form action="{{ route('testimonis.destroy', $testimoni->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="btn-group pull-right" role="group" aria-label="...">
              <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
          </div>
      </form>
  </div>
</section>

    <section class="content">
        <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$testimoni->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$testimoni->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="category">CATEGORY</label>
                     <p class="form-control-static">{{$testimoni->category}}</p>
                </div>
                    <div class="form-group">
                     <label for="url">URL</label>
                     <p class="form-control-static">{{$testimoni->url}}</p>
                    </iframe> 

                </div>
            </form>

            <a class="btn btn-link" href="{{ route('testimonis.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>
@include('layouts.footer') 
</body>
</html>