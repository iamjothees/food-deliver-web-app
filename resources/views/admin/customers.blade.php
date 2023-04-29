@extends('admin.layouts.app')

@section('header')
  <title>Customers</title>
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script> 
@endsection

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Customers</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group input-group-outline">
            <label class="form-label">Type here...</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            {{-- <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul> --}}
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary " 
          data-bs-toggle="modal" data-bs-target="#customer" 
          title="New Customer" route={{ route('admin.customers.store') }}
      > New Customer </button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Orders</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recent Orders </th>
                    <th class="text-secondary opacity-7" style="width:100px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                    <tr>
                      <td class="ps-4">
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$customer->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        {{ $customer->phone_with_cc }}
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$customer->status}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$customer->orders_count}}</span>
                      </td>
                      {{-- Date --}}
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$customer->recent_order}}</span>
                      </td>
                      <td class="d-flex gap-2">
                        <a class="btn btn-outline-secondary px-2 py-1 font-weight-bold text-xxs" 
                          data-bs-toggle="modal" data-bs-target="#customer" data='{!! json_encode($customer) !!}'
                          title="Edit Customer" route={{ route('admin.customers.update', ['id' => $customer->id]) }}>

                          Edit
                        </a>
                        <a class="btn btn-outline-danger px-2 py-1 font-weight-bold text-xxs" 
                          href={{ route('admin.customers.destroy', ['customer' => $customer->id]) }}>
                          Delete
                        </a>
                      </td>
                    </tr>  
                  @endforeach
                  
                  {{--  --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>  
@endsection

@section('modal')
<div class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <form action="" method="POST">
      @csrf
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <a class=" btn text-decoration-none fs-4 cursor-pointer" data-bs-dismiss="modal">X</a>
              </div>
              <div class="modal-body p-0">
                  <div class="card card-plain">
                      <div class="card-body d-flex flex-column gap-3">

                          <div class="row mb-4">
                              <div class="col-12 col-lg-6 mb-2">
                                  <label class="control-label">Name</label>
                                  <input type="text" name="name" class="form-control" required
                                      placeholder="Enter name">
                              </div>
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Username</label>
                                  <input type="text" name="username" class="form-control" placeholder="Enter username">
                              </div>
                          </div>

                          <div class="row mb-4">
                              <div class="col-12 col-lg-6 mb-2">
                                  <label class="control-label">Password</label>
                                  <input type="password" name="password" class="form-control" required
                                      placeholder="Enter password">
                              </div>
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Confirm Password</label>
                                  <input type="text" class="form-control" placeholder="Confirm password">
                              </div>
                          </div>

                          <div class="row mb-4">
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Phone</label>
                                  <div class="input-group">
                                      <span class="input-group-text country_code"></span>
                                      <input type='number' name='phone' class="form-control"
                                          placeholder="Enter your phone number">
                                  </div>
                              </div>
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Whatsapp</label>
                                  <div class="input-group">
                                      <span class="input-group-text country_code"></span>
                                      <input type='number' name='whatsapp' class="form-control"
                                          placeholder="Enter your whatsapp number">
                                  </div>
                              </div>
                              <div class="col-12 mb-2">
                                  <label>Email</label>
                                  <div class="input-group">
                                      <input type="text" name="email" class="form-control"
                                          placeholder="Enter your email address">
                                      <div class="input-group-append">
                                          <span class="input-group-text" >@gmail.com</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
  
                          <div class="row mb-4">
                              <div class="col-12 col-lg-4 mb-2">
                                  <label class="control-label">Country</label>
                                  <input type="text" name="country_id" required>
                              </div>
                              <div class="col-12 col-lg-4 mb-2">
                                  <label class="control-label">State</label>
                                  <div class="selectize-custom">
                                      <input type="text" name="state_id" disabled required>
                                  </div>
                              </div>
                              <div class="col-12 col-lg-4 mb-2">
                                  <label class="control-label">City</label>
                                  <div class="selectize-custom">
                                      <input type="text" name="city_id" disabled required>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="row mb-4">
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Apartment, suite, etc.</label>
                                  <input type="text" name="address_1" class="form-control">
                              </div>
                              <div class="col-12 col-lg-6 mb-2">
                                  <label>Area, Street, City, etc.</label>
                                  <input type="text" name="address_2" class="form-control">
                              </div>
                              <div class="col-12 col-lg-4 mb-2">
                                  <label>Pincode</label>
                                  <input type="text" name="pincode" class="form-control" placeholder="Enter a valid pincode">
                              </div>
                          </div>


                      {{-- <div>
                          <div class="form-check form-switch">
                              <input class="form-check-input" checked="false">
                              <label class="form-check-label">Is Season specific?</label>
                          </div>
                      </div> --}}
  
                      <div class="text-center">
                          <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0" onclick=alert(countryInput.getValue())>Save Customer</button>
                      </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </form>
</div>
@endsection

@section('script')
<script>
  let countryInput;
  let countryId;
  let stateInput;
  let stateId;
  let cityInput;
  document.getElementById('customer').addEventListener('show.bs.modal', function(event){
      const modal = event.target;
      const data = JSON.parse(event.relatedTarget.getAttribute('data'));
      modal.querySelector('form').action = event.relatedTarget.getAttribute('route');
      modal.querySelector('.modal-title').innerText = event.relatedTarget.getAttribute('title');

      modal.querySelectorAll('input').forEach((el)=>{
          el.value = "";
      })
      modal.querySelector('input[name=_token]').value = document.querySelector('input[name=_token]').value;

      if (data == null){
          
      }
      else{
        modal.querySelector('input[name=name]').value = data.name;
        modal.querySelector('input[name=username]').value = data.username;
        modal.querySelector('input[name=password]').visibility = false;
        modal.querySelector('input[name=phone]').phone = data.phone_with_cc;
      }
  })

  /* reputationInput.addEventListener('change', function(){
      document.querySelector('.reputation_value').innerText = reputationInput.value;
  }) */

  document.addEventListener("DOMContentLoaded", ()=>{
      countryInput = new TomSelect('input[name=country_id]', {
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          maxItems: 1,
          load: 
              function (query, callback) {
                  var url = `{{route('helper.countries')}}` + '?query=%' + encodeURIComponent(query);
                  fetch(url)
                      .then(response => response.json())
                      .then(json => {
                          callback(json);
                      }).catch(() => {
                          callback();
                      });
              }
      })

      stateInput = new TomSelect('input[name=state_id]', {
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          maxItems: 1,
          load: 
              function (query, callback) {
                  var url = `{{route('helper.states')}}?country_id=${countryInput.getValue()}&query=%${encodeURIComponent(query)}`;
                  fetch(url)
                      .then(response => response.json())
                      .then(json => {
                          callback(json);
                      }).catch(() => {
                          callback();
                      });
              }
      })
      stateInput.disable();

      cityInput = new TomSelect('input[name=city_id]', {
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          maxItems: 1,
          load: 
              function (query, callback) {
                  var url = `{{route('helper.cities')}}?state_id=${stateInput.getValue()}&query=%${encodeURIComponent(query)}`;
                  fetch(url)
                      .then(response => response.json())
                      .then(json => {
                          callback(json);
                      }).catch(() => {
                          callback();
                      });
              }
      })
      cityInput.disable();

      countryInput.on('item_add', ()=>{
          stateInput.enable();
          document.querySelectorAll('.country_code')[0].innerText = "+" + countryInput.options[countryInput.getValue()]['phonecode'];
          document.querySelectorAll('.country_code')[1].innerText = "+" + countryInput.options[countryInput.getValue()]['phonecode'];
      })
      
      stateInput.on('item_add', ()=>{
          cityInput.enable(); 
      })
  });

  
  
</script>
@endsection
