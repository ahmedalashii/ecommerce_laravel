  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
          <a href="{{ route('admin') }}">
              <img src="{{ $site_settings->admin_logo }}" alt="No logo provided!" height="130" width="150" />
          </a>
      </div>
      <nav class="sidebar-nav">
          <ul>
              <li class="nav-item">
                  <a href="{{ route('admin') }}">
                      <span class="icon">
                          <svg width="23px" height="32px" viewBox="0 0 22 22">
                              <path
                                  d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                          </svg>
                      </span>
                      <span class="text">Dashboard</span>
                  </a>
              </li>
              {{-- <li class="nav-item">
                  <a href="{{ route('admin.settings') }}">
                      <span class="icon-not-filled">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="32px" viewBox="0 0 24 24">
                              <path fill="currentColor"
                                  d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z" />
                          </svg>
                      </span>
                      <span class="text">Edit Admin Info</span>
                  </a>
              </li> --}}

              <li class="nav-item nav-item-has-children">
                  <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#store_menu"
                      aria-controls="store_menu" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon-not-filled">
                          <svg enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1"
                              viewBox="0 0 32 32" width="23px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink" fill="none">
                              <path
                                  d="M31.4,11.2l-3-3.998c-0.117-0.157-0.256-0.293-0.4-0.423V2c0-1.104-0.896-2-2-2H6  C4.895,0,4,0.896,4,2v4.78C3.856,6.909,3.717,7.044,3.6,7.2l-2.999,3.999C0.213,11.715,0,12.354,0,13v1c0,1.654,1.346,3,3,3h0v13  c0,1.104,0.896,2,2,2h22c1.104,0,2-0.896,2-2V17l0,0c1.654,0,3-1.346,3-3v-1C32,12.354,31.787,11.715,31.4,11.2z M26,2v4H6h0V2H26z   M10.193,15H6.004l4-7h2.189L10.193,15z M13.234,8H15.5v7h-4.266L13.234,8z M16.5,8h2.266l2,7H16.5V8z M19.805,8h2.189l4,7h-4.189  L19.805,8z M2,14v-1c0-0.217,0.07-0.427,0.2-0.6l3-4C5.389,8.148,5.685,8,6,8h2.852l-4,7H3C2.448,15,2,14.553,2,14z M20,30h-7.5V20  H20V30z M27,30h-6V20c0-0.553-0.449-1-1-1h-7.5c-0.552,0-1,0.447-1,1v10H5V17h22V30z M30,14c0,0.553-0.447,1-1,1h-1.854l-4-7H26l0,0  c0.314,0,0.611,0.148,0.799,0.4l3,4C29.93,12.573,30,12.783,30,13V14z"
                                  fill="currentColor" id="shop_1_" />
                          </svg>
                      </span>
                      <span class="text">Stores</span>
                  </a>
                  <ul id="store_menu" class="collapse dropdown-nav">
                      <li>
                          <a href="{{ route('admin.store.add') }}">Add New Store</a>
                      </li>
                      <li>
                          <a href="{{ route('admin.store.index') }}">View All Stores</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item nav-item-has-children">
                  <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#product_menu"
                      aria-controls="product_menu" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon-not-filled">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="32px" class="bi bi-cart"
                              viewBox="0 0 16 16">
                              <path fill="currentColor"
                                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg>
                      </span>
                      <span class="text">Products</span>
                  </a>
                  <ul id="product_menu" class="collapse dropdown-nav">
                      <li>
                          <a href="{{ route('admin.product.add') }}">Add New
                              Product</a>
                          {{-- <a href="{{ route('admin.product.add') }}"
                              @if (Route::current()->getName() == 'admin.product.add') class="active" @endif>Add New
                              Product</a> --}}
                      </li>
                      <li>
                          <a href="{{ route('admin.product.index') }}">View All Products</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item nav-item-has-children">
                  {{-- <a href="{{ route('admin.purchase_transaction.index') }}">
                    <span class="icon-not-filled">
                        <i class="lni lni-credit-cards" style="font-size: 23px;"></i>
                    </span>
                    <span class="text">Purchase Transactions</span>
                </a> --}}

                  <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#purchase_transactions"
                      aria-controls="purchase_transactions" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon-not-filled">
                          <i class="lni lni-credit-cards" style="font-size: 23px;"></i>
                      </span>
                      <span class="text">Purchase Transactions</span>
                  </a>
                  <ul id="purchase_transactions" class="collapse dropdown-nav">
                      <li>
                          <a href="{{ route('admin.purchase_transaction.index') }}">List of all Transactions</a>
                      </li>
                      <li>
                          <a href="{{ route('admin.purchase_transaction.report') }}">Total Report</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.site.settings') }}">
                      <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" fill-opacity="0" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                              <circle cx="12" cy="12" r="3"></circle>
                              <path
                                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                  {{-- </path> --}}
                          </svg>
                      </span>
                      <span class="text">General Settings</span>
                  </a>
              </li>
          </ul>
      </nav>
  </aside>
