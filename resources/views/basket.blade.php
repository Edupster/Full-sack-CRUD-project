
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
        </div>
      </div>
    </nav>

    <h1 class="text-center">Basket</h3>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead class="table-bordered">
                <tr>
                    <th>@sortablelink('item')</th>
                    <th>@sortablelink('price')</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($baskets->count())
                    @foreach($baskets as $key => $basket)
                        <tr>
                            <td>{{ $basket->item }}</td>
                            <td>{{ $basket->price }}</td>
                            <td>
                                <form method="post" action="{{route('deleteItem',$basket->id)}}">
                                    @csrf
                                    @method('delete')
                                    
                                    <input type="submit" class="btn btn-danger" value="Delete" />
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $baskets->appends(\Request::except('page'))->render() !!}
    </div>
    </form>
    
    
    <form action="{{route('checkout')}}">
        <input type="submit" class="btn btn-success" value="Checkout" />
    </form>
    <form action="{{route('cancelHome')}}">
        <input type="submit" class="btn btn-danger" value="Empy Basket" />
    </form>
    <form action="{{route('home')}}">
        <input type="submit" class="btn btn-warning" value="Get Back home" />
    </form>
</body>
