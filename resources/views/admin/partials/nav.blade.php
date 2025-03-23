<aside class="side-nav">

  <div class="logo">
     <img src="{{asset('img/logo.svg')}}">
        ADMINPANEL
  </div>
  <ul>
        <li>
             <a href="{{route('adminpanel')}}">Dashboard</a>
        </li>
        <li>
             <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
             <a href="{{route('adminpanel.categories')}}">Categories</a>
        </li>
        <li>
             <a href="{{route('adminpanel.orders')}}">Orders</a>
        </li>
        <li>
             <a href="{{route('adminpanel.colors')}}">colors</a>
        </li>
    </ul>
    <div class="logout">
        <form action="{{route('logout')}}" method="post">
           @csrf
           <button type="submit">
           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M230.93 220a8 8 0 0 1-6.93 4H32a8 8 0 0 1-6.92-12c15.23-26.33 38.7-45.21 66.09-54.16a72 72 0 1 1 73.66 0c27.39 8.95 50.86 27.83 66.09 54.16a8 8 0 0 1 .01 8"/></svg>
           &nbsp; &nbsp;
                     logout
          </button>

        </form>
    </div>
</aside>