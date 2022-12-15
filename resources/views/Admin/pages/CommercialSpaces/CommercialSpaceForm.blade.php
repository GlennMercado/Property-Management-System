@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Commercial Spaces</h3>
                        </div>
                        <div class="card-body">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                                class="bi bi-card-text mr-2"></i>Applications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"><i class="bi bi-person-check mr-2"></i>Renters List</a>
                                    </li>                                  
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                            aria-labelledby="tabs-icons-text-1-tab">
                                            <div class="table-responsive">
    














                                              <div>
                                                  <table class="table align-items-center">
                                                      <thead class="thead-light">
                                                          <tr>
                                                              <th scope="col" class="sort" data-sort="name">Project</th>
                                                              <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                              <th scope="col" class="sort" data-sort="status">Status</th>
                                                              <th scope="col">Users</th>
                                                              <th scope="col" class="sort" data-sort="completion">Completion</th>
                                                              <th scope="col"></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody class="list">
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/bootstrap.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Argon Design System</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2500 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">pending</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">60%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/react.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $4400 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-info"></i>
                                                                    <span class="status">on schedule</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">90%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/vue.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2200 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/bootstrap.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Argon Design System</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2500 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">pending</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">60%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/react.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $4400 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-info"></i>
                                                                    <span class="status">on schedule</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">90%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                      </tbody>
                                                  </table>
                                              </div>
                                              
                                              </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                            aria-labelledby="tabs-icons-text-2-tab">
                                            <div class="table-responsive">
    














                                              <div>
                                                  <table class="table align-items-center">
                                                      <thead class="thead-light">
                                                          <tr>
                                                              <th scope="col" class="sort" data-sort="name">Project</th>
                                                              <th scope="col" class="sort" data-sort="budget">Budget</th>
                                                              <th scope="col" class="sort" data-sort="status">Status</th>
                                                              <th scope="col">Users</th>
                                                              <th scope="col" class="sort" data-sort="completion">Completion</th>
                                                              <th scope="col"></th>
                                                          </tr>
                                                      </thead>
                                                      <tbody class="list">
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/bootstrap.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Argon Design System</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2500 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">pending</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">60%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/react.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $4400 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-info"></i>
                                                                    <span class="status">on schedule</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">90%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/vue.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2200 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/bootstrap.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Argon Design System</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $2500 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i>
                                                                    <span class="status">pending</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">60%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/angular.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $1800 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i>
                                                                    <span class="status">completed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">100%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/sketch.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">Black Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $3150 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i>
                                                                    <span class="status">delayed</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">72%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                              <th scope="row">
                                                                  <div class="media align-items-center">
                                                                      <a href="#" class="avatar rounded-circle mr-3">
                                                                        
                                                                          
                                                                            <img alt="Image placeholder" src="../../assets-old/img/theme/react.jpg">
                                                                          
                                                                        
                                                                      </a>
                                                                      <div class="media-body">
                                                                          <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                                      </div>
                                                                  </div>
                                                              </th>
                                                              <td class="budget">
                                                                  $4400 USD
                                                              </td>
                                                              <td>
                                                                  <span class="badge badge-dot mr-4">
                                                                    <i class="bg-info"></i>
                                                                    <span class="status">on schedule</span>
                                                                  </span>
                                                              </td>
                                                              <td>
                                                                  
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                              
                                                
                                                  <div class="avatar-group">
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-1.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-2.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-3.jpg">
                                                      </a>
                                                      <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                          <img alt="Image placeholder" src="../../assets-old/img/theme/team-4.jpg">
                                                      </a>
                                                  </div>
                                                
                                              
                                              
                                              
                                                              </td>
                                                              <td>
                                                                  <div class="d-flex align-items-center">
                                                                      <span class="completion mr-2">90%</span>
                                                                      <div>
                                                                          <div class="progress">
                                                                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td class="text-right">
                                                                  <div class="dropdown">
                                                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                      </a>
                                                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                          <a class="dropdown-item" href="#">Action</a>
                                                                          <a class="dropdown-item" href="#">Another action</a>
                                                                          <a class="dropdown-item" href="#">Something else here</a>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          
                                                      </tbody>
                                                  </table>
                                              </div>
                                              
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')


        </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
