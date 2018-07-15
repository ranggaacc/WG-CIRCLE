@include('layouts.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<div class="page-header">
        <h1>Events / Show #{{$event->id}}</h1>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('events.edit', $event->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$event->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$event->description}}</p>
                </div>
                    <div class="form-group">
                     <label for="picture">PICTURE</label>
                     <img width="100" height="100" src="{{ asset($event->picture) }}" class="img-responsive"/>
                     </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$event->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="penyelenggara">PENYELENGGARA</label>
                     <p class="form-control-static">{{$event->penyelenggara}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('events.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

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
