@extends('layouts.admin')

@section('content')
<main class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="container">

    <div class="mb-4 border-bottom mt-2">
      <h1>Overview</h1>
    </div>

    <div class="row mx-auto my-2">

      <div class="col-lg-3 col-md-6 col-sm-6 py-2">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Users</h4>
            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td scope="">Users Registered</td>
                  <td>675</td>
                </tr>
                <tr>
                  <td scope="row">Users Online</td>
                  <td>12</td>
                </tr>
                <tr>
                  <td scope="row">Site Visitors</td>
                  <td>8694</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 py-2">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Products</h4>
            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td scope="row">Total Products</td>
                  <td>98</td>
                </tr>
                <tr>
                  <td scope="row">Products On Sale</td>
                  <td>14</td>
                </tr>
                <tr>
                  <td scope="row">Product Views</td>
                  <td>8694</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 py-2">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Orders</h4>
            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td scope="row">Total Orders</td>
                  <td>562</td>
                </tr>
                <tr>
                  <td scope="row">Orders Shipped</td>
                  <td>496</td>
                </tr>
                <tr>
                  <td scope="row">Orders Received</td>
                  <td>365</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 py-2">
        <div class="card text-center">
          <div class="card-body">
            <h4 class="card-title">Reviews</h4>
            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td scope="row">Total Reviews</td>
                  <td>134</td>
                </tr>
                <tr>
                  <td scope="row">Average Per Product</td>
                  <td>2.7</td>
                </tr>
                <tr>
                  <td scope="row">Incomplete Reviews</td>
                  <td>27</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="mb-4 border-bottom mt-2">
      <h1 id="notifications">Notifications</h1>
    </div>

    <div class="mx-auto my-2">
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">Category</th>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">Timestamp</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="align-middle" scope="row">Products</th>
            <td class="align-middle">234</td>
            <td class="align-middle">Product "Dynamic Black Ink" #45 is out of stock</td>
            <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
            <td class="align-middle"><button type="button" class="btn btn-link py-0 a_link">Clear</button></td>
          </tr>
          <tr>
            <th class="align-middle" scope="row">Review</th>
            <td class="align-middle">134</td>
            <td class="align-middle">User miguel123 made a review on order #541</td>
            <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
            <td class="align-middle"><button type="button" class="btn btn-link py-0 a_link">Clear</button></td>
          </tr>
          <tr>
            <th class="align-middle" scope="row">Order</th>
            <td class="align-middle">541</td>
            <td class="align-middle">User miguel123 made a new order</td>
            <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
            <td class="align-middle"><button type="button" class="btn btn-link py-0 a_link">Clear</button></td>
          </tr>
          <tr>
            <th class="align-middle" scope="row">Users</th>
            <td class="align-middle">675</td>
            <td class="align-middle">User miguel123 just signed up</td>
            <td class="align-middle">Sunday, 08-Mar-20 12:34:17</td>
            <td class="align-middle"><button type="button" class="btn btn-link py-0 a_link">Clear</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
@endsection