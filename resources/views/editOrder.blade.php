<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
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

    <h1>Edit Order Details</h1>

    <form method="post" action="{{route('updateOrder',['order' => $order])}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" value={{ $order['name'] }}>
        </div>

        <div>
            <label>Email</label>
            <input type="text" name="email" value={{ $order['email'] }}>
        </div>
        
        <div>
            <label>Phone</label>
            <input type="text" name="mobile" value={{ $order['mobile'] }}>
        </div>

        <div>
            <label>Address</label>
            <input type="text" name="address" value={{ $order['address'] }}>
        </div>
        
        <div>
            <input type="hidden" name="items" value={{ $order['items'] }}>
        </div>
        
        <div>
            <input type="submit" value="Save details"/>
        </div>
    </form>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>

        @endif
    </div>
    
    
    
</body>
</html>