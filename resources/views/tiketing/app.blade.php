<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document - @yield("title")</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
  .Search {
    background-color: #ff9494;
    color: white;
  }

  .Search:hover {
    background-color: #f55858;
    color: white;
  }

  .btn_color {
    background-color: #ff9494;
  }

  .btn_color {
    background-color: #ff9494;
    color: white;
    text-decoration: none;
    border: none;
    padding: 5px;
    border-radius: 5px;
  }
</style>

<body>

  <!-- navbar -->
  <div class="container navbar mt-3 mb-5 ">
    <nav class="navbar navbar-expand-lg bg-body-tertiary col-12 ">
      <div class="container-fluid bg-white">
        <a class="navbar-brand" href="/tiketing">
          <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- hanya admin -->
            @can('admin')
            <li class="nav-item">
              <a class="nav-link" href="/tiketing/admin/dashboard">Admin Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/tiketing/list_order">list Order</a>
            </li>
            @endcan

            <!-- hanya yang telah login -->
            @auth
            <li class="nav-item">
              <a class="nav-link" href="/user/profile/{{auth()->user()->id}}">Profile</a>
            </li>
            <li class="nav-item">

              <form action='/user/logout' method='POST'>
                @csrf
                <button type='submit' class='nav-link '>logout</button>
              </form>
              @else
              <div>
                <a href='/user/login' class='nav-link '>login</a>
              </div>
              @endauth
            </li>
          </ul>

          <!-- keranjang -->
          <a class="btn_color" href="/tiketing/cart">Keranjang</a>
        </div>
    </nav>
  </div>
  <div class='container'>
    @yield("content")
  </div>
</body>

</html>