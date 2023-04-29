@extends('admin.layouts.app')

@section('header')
  <title>Items</title>
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script> 
@endsection

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">Items</h6>
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
          data-bs-toggle="modal" data-bs-target="#item" 
          title="New Item" route={{ route('admin.items.store') }}
      > New Item </button>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Serving time</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7" style="width:100px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td class="ps-4">
                        {{ $loop->index + 1 }}
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        {{ \Carbon\Carbon::parse($item->serving_time_start)->format('h:i A') . " - " . \Carbon\Carbon::parse($item->serving_time_end)->format('h:i A')}}
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$item->status}}</span>
                      </td>
                      <td class="d-flex gap-2">
                        <a class="btn btn-outline-secondary px-2 py-1 font-weight-bold text-xxs" 
                          data-bs-toggle="modal" data-bs-target="#item" data='{!! json_encode($item) !!}'
                          title="Edit Item" route={{ route('admin.items.update', ['id' => $item->id]) }}>

                          Edit
                        </a>
                        <a class="btn btn-outline-danger px-2 py-1 font-weight-bold text-xxs" 
                          href={{ route('admin.items.destroy', ['item' => $item->id]) }}>
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
<div class="modal fade" id="item" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <form action="" method="POST"  enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <a class=" btn text-decoration-none fs-4 cursor-pointer" data-bs-dismiss="modal">X</a>
              </div>
              <div class="modal-body p-0">
              <div class="card card-plain">
              {{-- <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
              </div> --}}
              <div class="card-body d-flex flex-column gap-3">

                  <div class="">
                      <label>Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" 
                        class="border w-100 p-2 rounded" 
                        aria-label="Name" required="true" tabindex="1">
                  </div>

                  <div>
                      <label>Menu</label>
                      <input name='menus_ids' class="border w-100 p-2 rounded" tabindex="2">
                  </div>
                  <div>
                      <label>Category</label>
                      <input type="text" name='categories_ids' class="border w-100 p-2 rounded" />
                  </div>
                  <div>
                      <label>Price</label>
                      <div class="input-group">
                          <span class="fs-5  p-2 border">₹</span>
                          <input type='number' name='price' class="border p-2 rounded" required tabindex="2">
                      </div>
                  </div>
                  
                  <div>
                    <label>Images</label><br>
                    <label class="block shadow w-100 fs-2">
                      <span class="sr-only">Choose File</span>
                      <input name='image' type="file" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-gray-400"/>
                    </label>
                  </div>

                  <div >
                      <label>Description</label><br>
                      <textarea name="description" class="border p-2 rounded w-100"></textarea>
                  </div>
                  

                  {{-- <div class="row">
                      <label class="col-12">Serving time</label>
                      <div class="col-6 mb-3 ">
                          <input type="time" name="serving_time_start" class="form-control" value="{{ \Carbon\Carbon::parse('8:00 AM')->format('H:i') }}">
                      </div>
                      <div class="col-6 mb-3">
                          <input type="time" name="serving_time_end" class="form-control"  value="{{ \Carbon\Carbon::parse('9:00 PM')->format('H:i') }}">
                      </div>
                  </div> --}}

                  {{-- <div>
                      <div class="form-check form-switch">
                          <input class="form-check-input" checked="false">
                          <label class="form-check-label">Is Season specific?</label>
                      </div>
                  </div> --}}

                  <div class="text-center">
                      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Save Item</button>
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
  let menuInput;
  let categoryInput;

  document.getElementById('item').addEventListener('show.bs.modal', function(event){
      const modal = event.target;
      console.log(event.relatedTarget.getAttribute('data'));
      const data = JSON.parse(event.relatedTarget.getAttribute('data'));
      modal.querySelector('form').action = event.relatedTarget.getAttribute('route');
      modal.querySelector('.modal-title').innerText = event.relatedTarget.getAttribute('title');

      modal.querySelectorAll('input').forEach((el)=>{
          el.value = "";
      })
      menuInput.clear();
      categoryInput.clear();
      modal.querySelector('input[name=_token]').value = document.querySelector('input[name=_token]').value;

      if (data == null){
          
      }
      else{
          let categoriesIds = []; 
          data.categories.forEach((category)=>{
              categoriesIds.push(category.id);
          })
          let menusIds = []; 
          data.menus.forEach((menu)=>{
              menusIds.push(menu.id);
          })
          modal.querySelector('input[name=name]').value = data.name;
          modal.querySelector('input[name=price]').value = data.price;
          modal.querySelector('textarea[name=description]').innerText = data.description;
          menuInput.addItems(menusIds);
          categoryInput.addItems(categoriesIds);

          console.log(data);

          /* modal.querySelector('input[name=serving_time_start]').value = data.serving_time_start;
          modal.querySelector('input[name=serving_time_end]').value =  data.serving_time_end; */
      }
  })

  
  window.addEventListener('DOMContentLoaded', function(){
      
      menuInput = new TomSelect("input[name=menus_ids]", {
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          preload: true,
          create: false,
          load: function(query, callback) {
              var url =  `{{route('helper.menus')}}` + '?query=%' + encodeURIComponent(query);
              fetch(url) 
                  .then(response => response.json())
                  .then(json => {
                      callback(json);
                  }).catch(() => {
                      callback();
                  });
          },
      });
      
      categoryInput = new TomSelect("input[name=categories_ids]", {
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          preload: true,
          create: false,
          load: function(query, callback) {
              var url =  `{{route('helper.categories')}}` + '?query=%' + encodeURIComponent(query);
              fetch(url)
                  .then(response => response.json())
                  .then(json => {
                      callback(json);
                  }).catch(() => {
                      callback();
                  });
          },
      });

      /* const menuFilter = new TomSelect('input[name=menu_filter]',{
          valueField: 'id',
          labelField: 'name',
          searchField: 'name',
          maxItems: 1,
          preload: true,
          create: false,
          load: function(query, callback) {
              var url =  `{{route('helper.menus')}}` + '?query=%' + encodeURIComponent(query);
              fetch(url)
                  .then(response => response.json())
                  .then(json => {
                      callback(json);
                  }).catch(() => {
                      callback();
                  });
          },
          render: {
              item: function(data, escape) {
                  return '<div class="px-2 text-uppercase text-xxs font-weight-bolder">' + escape(data.name) + '</div>';
              },
          }
      }); */

      
      



  })
</script>
@endsection
