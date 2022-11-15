  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
          <a href="index.html">
              <img src="{{ asset('admin-panel/images/logo.svg') }}" alt="logo" height="120" width="180" />
          </a>
      </div>
      <nav class="sidebar-nav">
          <ul>
              <li class="nav-item">
                  <a href="{{ URL('/admin') }}">
                      <span class="icon">
                          <svg width="22" height="22" viewBox="0 0 22 22">
                              <path
                                  d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                          </svg>
                      </span>
                      <span class="text">Dashboard</span>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ URL('/admin/settings') }}">
                      <span class="icon-not-filled">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-settings">
                              <circle cx="12" cy="12" r="3"></circle>
                              <path
                                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                              </path>
                          </svg>
                      </span>
                      <span class="text">Settings</span>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{ URL('/admin') }}">
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
              </li>
              <li class="nav-item">
                  <a href="{{ URL('/admin') }}">
                      <span class="icon-not-filled">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="32px" class="bi bi-cart"
                              viewBox="0 0 16 16">
                              <path fill="currentColor"
                                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg>
                      </span>
                      <span class="text">Products</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ URL('/admin') }}">
                      <span class="icon-not-filled">
                          <i class="lni lni-credit-cards" style="font-size: 23px;"></i>
                      </span>
                      <span class="text">Purchase Transactions</span>
                  </a>
              </li>
              {{-- <li class="nav-item nav-item-has-children">
                  <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
                      aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon">
                          <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M12.9067 14.2908L15.2808 11.9167H6.41667V10.0833H15.2808L12.9067 7.70917L14.2083 6.41667L18.7917 11L14.2083 15.5833L12.9067 14.2908ZM17.4167 2.75C17.9029 2.75 18.3692 2.94315 18.713 3.28697C19.0568 3.63079 19.25 4.0971 19.25 4.58333V8.86417L17.4167 7.03083V4.58333H4.58333V17.4167H17.4167V14.9692L19.25 13.1358V17.4167C19.25 17.9029 19.0568 18.3692 18.713 18.713C18.3692 19.0568 17.9029 19.25 17.4167 19.25H4.58333C3.56583 19.25 2.75 18.425 2.75 17.4167V4.58333C2.75 3.56583 3.56583 2.75 4.58333 2.75H17.4167Z" />
                          </svg>
                      </span>
                      <span class="text">Auth</span>
                  </a>
                  <ul id="ddmenu_3" class="collapse dropdown-nav">
                      <li>
                          <a href="signin.html"> Sign In </a>
                      </li>
                      <li>
                          <a href="signup.html"> Sign Up </a>
                      </li>
                  </ul>
              </li> --}}
              <li class="nav-item">
                  <a href="tables.html">
                      <span class="icon">
                          <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M4.58333 3.66675H17.4167C17.9029 3.66675 18.3692 3.8599 18.713 4.20372C19.0568 4.54754 19.25 5.01385 19.25 5.50008V16.5001C19.25 16.9863 19.0568 17.4526 18.713 17.7964C18.3692 18.1403 17.9029 18.3334 17.4167 18.3334H4.58333C4.0971 18.3334 3.63079 18.1403 3.28697 17.7964C2.94315 17.4526 2.75 16.9863 2.75 16.5001V5.50008C2.75 5.01385 2.94315 4.54754 3.28697 4.20372C3.63079 3.8599 4.0971 3.66675 4.58333 3.66675ZM4.58333 7.33341V11.0001H10.0833V7.33341H4.58333ZM11.9167 7.33341V11.0001H17.4167V7.33341H11.9167ZM4.58333 12.8334V16.5001H10.0833V12.8334H4.58333ZM11.9167 12.8334V16.5001H17.4167V12.8334H11.9167Z" />
                          </svg>
                      </span>
                      <span class="text">Tables</span>
                  </a>
              </li>
              <span class="divider">
                  <hr />
              </span>
          </ul>
      </nav>
  </aside>
