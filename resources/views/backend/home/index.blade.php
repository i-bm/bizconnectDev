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
  
                    <!-- Card Tools -->
                    <div class="dt-card__tools">
                      <!-- List -->
                      <ul class="dt-list dt-list-sm dt-list-cm-0">
                        <!-- List Item -->
                        <li class="dt-list__item">
                          <button type="button" class="btn btn-primary btn-xs">Add New</button>
                        </li>
                        <!-- /list item -->
  
                        <!-- List Item -->
                        <li class="dt-list__item">
                          <!-- Dropdown -->
                          <div class="dropdown d-inline-block">
                            <a class="dropdown-toggle d-inline-block f-12 py-1 px-2 py-1 border rounded"
                               href="#"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                              Unread
                            </a>
  
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="javascript:void(0)">Read</a>
                              <a class="dropdown-item" href="javascript:void(0)">Unread</a>
                              <a class="dropdown-item" href="javascript:void(0)">Spam</a>
                            </div>
                          </div>
                          <!-- /dropdown -->
                        </li>
                        <!-- /list item -->
                      </ul>
                      <!-- /list -->
  
                    </div>
                    <!-- /card tools -->
  
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
                          <th scope="col">Property Name</th>
                          <th scope="col">Owner</th>
                          <th scope="col">City</th>
                          <th scope="col">State</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>727</td>
                          <td class="text-dark">Pacifica La Habitat</td>
                          <td>Swetalee Developers</td>
                          <td>Shieldsville</td>
                          <td>Congo</td>
                          <td>$12Lac</td>
                          <td>
                            <!-- List -->
                            <ul class="dt-list dt-list-cm-0">
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-editors "></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-trash-filled"></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <div class="dropdown">
                                  <a class="dropdown-toggle no-arrow text-light-gray"
                                     href="#" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">
                                    <i class="icon icon-horizontal-more icon-fw"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another
                                      action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something
                                      else here</a>
                                  </div>
                                </div>
                              </li>
                              <!-- /list item -->
                            </ul>
                            <!-- /list -->
                          </td>
                        </tr>
  
                       
  
                        <tr>
                          <td>442</td>
                          <td class="text-dark">Siddhi Banglow</td>
                          <td>Bakeri Group</td>
                          <td>Gillianville</td>
                          <td>Botswana</td>
                          <td>$2Lacs</td>
                          <td>
                            <!-- List -->
                            <ul class="dt-list dt-list-cm-0">
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-editors "></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-trash-filled"></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <div class="dropdown">
                                  <a class="dropdown-toggle no-arrow text-light-gray"
                                     href="#" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">
                                    <i class="icon icon-horizontal-more icon-fw"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another
                                      action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something
                                      else here</a>
                                  </div>
                                </div>
                              </li>
                              <!-- /list item -->
                            </ul>
                            <!-- /list -->
                          </td>
                        </tr>
  
                        <tr>
                          <td>868</td>
                          <td class="text-dark">Goyal Arcus</td>
                          <td>Signature Group</td>
                          <td>West Lowell</td>
                          <td>Norfolk Island</td>
                          <td>$75k</td>
                          <td>
                            <!-- List -->
                            <ul class="dt-list dt-list-cm-0">
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-editors "></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <a class="text-light-gray" href="javascript:void(0)">
                                  <i class="icon icon-trash-filled"></i>
                                </a>
                              </li>
                              <!-- /list item -->
  
                              <!-- List Item -->
                              <li class="dt-list__item">
                                <div class="dropdown">
                                  <a class="dropdown-toggle no-arrow text-light-gray"
                                     href="#" data-toggle="dropdown"
                                     aria-haspopup="true" aria-expanded="false">
                                    <i class="icon icon-horizontal-more icon-fw"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another
                                      action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something
                                      else here</a>
                                  </div>
                                </div>
                              </li>
                              <!-- /list item -->
                            </ul>
                            <!-- /list -->
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

                </div>
                <!-- /site content -->


@endsection