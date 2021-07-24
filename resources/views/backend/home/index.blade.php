@extends('layouts.dashboard.main')
{{-- @extends('layouts.app') --}}

@section('content')

            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Dashboard</h1>
                    </div>
                    <!-- /page header -->

                   <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                        <strong>Information Section!</strong> You should check in on some of those fields
                                        below.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                    <div class="welcome">
                        <h4>Hello {{Auth::user()->name}},</h4>
                        <p>Last Logged in on {{Auth::user()->updated_at->format('Y-m-d h:i:s')}}</p>
                    </div>

                   
                    <!-- /grid -->

              <!-- Grid Item -->
            <div class="col-12 order-xl-12">

                <!-- Card -->
                <div class="dt-card">
  
                  <!-- Card Header -->
                  <div class="dt-card__header mb-0">
  
                    <!-- Card Heading -->
                    <div class="dt-card__heading">
                      <h3 class="dt-card__title">Recently Active in Your Account</h3>
                    </div>
                    <!-- /card heading -->
  
                   
  
                  </div>
                  <!-- /card header -->
  
                  <!-- Card Body -->
                  <div class="dt-card__body pb-3">
                    <!-- Tables -->
                    <div class="table-responsive">
                      <table class="table mb-0 table-fluid">
                        <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Subscription</th>
                          <th scope="col">Expiration</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                          {{-- <th scope="col">Price</th>
                          <th scope="col">Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                       
  
                        <tr>
                          <td>1</td>
                          <td class="text-dark">Quarterly</td>
                          <td>July 29,2021</td>
                          <td><span class="badge badge-pill badge-success mb-1 mr-1">Active</span></td>
                          <td>
                            <!-- Dropdown -->
                            <div class="btn-group dropdown mr-2 mb-2">

                              <!-- Dropdown Button -->
                              <button type="button" class="btn btn-secondary">Primary</button>
                              <button type="button"
                                      class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                      data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <!-- /dropdown button -->

                              <!-- Dropdown Menu -->
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="javascript:void(0)">Manage</a>
                              <!-- /dropdown menu -->

                          </div>
                          <!-- /dropdown -->
                          </td>
                        </tr>
  
                        </tbody>
                      </table>
                    </div>
                    <!-- /table -->
                  </div>
                  <!-- /card body -->
  
                </div>
                <!-- /card -->
  
              </div>
              <!-- /grid item -->
            

                </div>
                <!-- /site content -->


@endsection