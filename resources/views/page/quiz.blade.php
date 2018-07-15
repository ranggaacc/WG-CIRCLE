@include('layouts.header-public')

  <nav class="navbar fixed">
    @include('layouts.navbar-public')
  </nav>

  <section class="section-first" id="faq">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <img src="http://wgcircle.com/wp-content/uploads/2017/02/wgquiz4-1024x557.png" alt="quiz" class="img-responsive">
        </div>
        <div class="col-sm-12">
          <div class="content text-center">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdXic0nz7dULGctaI_DHQqPLLCUMuIE1txihXCCN5BCI37FFw/viewform?embedded=true" width="760" height="700" frameborder="0" marginwidth="0" marginheight="0">Loading...</iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layouts.footer-public')
</body>
</html>
