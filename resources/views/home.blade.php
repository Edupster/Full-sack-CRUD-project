<!DOCTYPE html>
<html> 

<head>

  <title>Home</title>
  <link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script>
  <script src="https://kit.fontawesome.com/2b9cdc1c9a.js" crossorigin="anonymous"></script>
  




</head>
<style>


</style>
<body class="card text-bg-warning mb-3"> 
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/home">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/createOrder">Create order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders">List of Orders</a>
            </li>
          </ul>
          <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link text-white" href="/basket"><i class="fas fa-shopping-cart"></i></a>
                </li>
          </ul>
        </div>
        <form class="d-flex" role="search" method="GET" action="{{route('search')}}">
          <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
    
    <div>
      <h3>List of Products</h3>
    
      <div class="container">
          <table class="table table-striped table-hover">
              <thead class="table-dark">
                  <tr>
                      <th width="80px">@sortablelink('id')</th>
                      <th>@sortablelink('item')</th>
                      <th>@sortablelink('price')</th>
                      <th>@sortablelink('category')</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @if($products->count())
                      @foreach($products as $key => $product)
                          <tr>
                              <td>{{ $product->id }}</td>
                              <td>{{ $product->item }}</td>
                              <td>{{ $product->price }}</td>
                              <td>{{ $product->category}}</td>
                              <td>
                                  <form action="{{route('addBasket')}}">
                                      
                                      <input type="hidden" name="item" value={{ $product->item }} />
                                      <input type="hidden" name="price" value={{ $product->price }} />
  
                                      <input type="submit" class="btn btn-success" value="Add to basket" />
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                      
                  @endif
              </tbody>
          </table>
          {!! $products->appends(\Request::except('page'))->render() !!}
      </div>
    </div>
    <div>
      <form  action="{{route('createOrder')}}" >
            <input class="btn btn-dark" type="submit" value="Create Order" />
      </form>
    </div>
</body>
</html>
