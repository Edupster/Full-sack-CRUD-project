<!DOCTYPE html>
<html> 
<head>
    <title>Orders</title>
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


    <div class="container">
        <h3 class="text-center">Orders</h3>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="80px">@sortablelink('id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('email')</th>
                    <th>@sortablelink('address')</th>
                    <th>@sortablelink('mobile')</th>
                    <th>Items</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($orders->count())
                    @foreach($orders as $key => $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->mobile }}</td>
                            <td>{{ $order->items }}</td>
                            <td>
                                <form method="post" action="{{route('deleteOrder',['order' => $order])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete" />
                                </form> 
                            </td>

                            <td>
                                <form action="{{route('editOrder',['order' => $order])}}">
                                    <input type="submit" class="btn btn-info" value="Edit order details" />
                                </form>  
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $orders->appends(\Request::except('page'))->render() !!}
    </div>
    <form action="{{route('createOrder')}}">
        <input type="submit" class="btn btn-dark" value="Create Order" />
    </form>
    <form action="{{ route('cancelHome') }}">
        <input type="submit" class="btn btn-danger" value="Get back Home" />
    </form>
    
</body>
</html>
