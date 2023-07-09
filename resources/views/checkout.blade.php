
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

    <h1 class="text-center">Checkout</h3>
    <div class="container">
        <h3 class="text-center">Basket</h3>
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

    <div class="container">
        <h3 class="text-center">Order Details</h3>
            
            <form class="form-inline my-2 my-lg-0" action="{{route('finishOrder')}}">
                
                <div>
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="mobile" placeholder="Phone">
                </div>
                <div>
                <div>
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Adress">
                </div>
                <div>
                    @php ($items = [])
                    @if($baskets->count())
                        @foreach($baskets as $key => $basket)
                            @php ($items[] = $basket->item)
                        @endforeach
                    @endif
                    @php ($itemstext = implode(', ', $items))
                    <input type="hidden" name="items" value= "{{$itemstext}}"/><br>
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Finish Order"/>
                </div>
                <div>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
            
                    @endif
                </div>
                
            </form>

            <form action="{{route('createOrder')}}">
                <input type="submit" class="btn btn-warning" value="Get back to the products list" />
            </form>
            <form action="{{route('cancelHome')}}">
                <input type="submit" class="btn btn-danger" value="Cancel" />
            </form>
    </div>
</body>