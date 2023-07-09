
<!DOCTYPE html>
<html>
<head>
    <title>Chekout</title>
    <link rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script>

</head>
<body>
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
      </div>
    </nav>

    <h1 class="text-center">Search Results</h3>
    <div class="container">
          <table class="table table-striped table-hover">
              <thead class="table-dark">
                  <tr>
                      <th width="80px">ID</th>
                      <th>Item</th>
                      <th>Price</th>
                      <th>category</th>
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
    </div>
    <form action="{{route('home')}}">
        <input type="submit" class="btn btn-warning" value="Get Back home" />
    </form>
</body>