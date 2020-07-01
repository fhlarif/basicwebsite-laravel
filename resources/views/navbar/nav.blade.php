<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{URL::to('/index')}}">Home</a></li>
        <li><a href="{{URL::to('/about')}}">About</a></li>
        <li><a href="{{URL::to('/services')}}">Services</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="{{URL::to('/products/create')}}">New Product</a></li>
      </ul>
    </div>
  </nav>