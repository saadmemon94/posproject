<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
      <a href="http://www.alsyedstore.com" class="simple-text logo-normal">
        <img class="img-fluid" src="{{asset('assets') . "/img/alsyedstorelogo3.png"}}" alt="">
        <strong>
          {{ __('Al-Syed POS') }}
        </strong>
      </a>
 </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'user-settings') active @endif">
        <a data-toggle="collapse" href="#userSettings">
          <i class="fas fa-users"></i>
          <p>{{ __("User Settings") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="userSettings">
          <ul class="nav myNav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Profile Management") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Users List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add User') active @endif">
              <a href="{{ route('user.create') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Add User") }} </p>
              </a>
            </li>
            </li>
            <li class="@if ($activePage == 'roles') active @endif">
              <a href="{{ route('role.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Roles List") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'buisness-contacts') active @endif">
        <a data-toggle="collapse" href="#buisnessContacts">
          {{-- {{ route('page.index','buisness-contacts') }} --}}
          <i class="now-ui-icons business_badge"></i>
          <p>{{ __('Buisness Contacts') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="buisnessContacts">
          <ul class="nav myNav">
            <li class="@if ($activePage == 'Customers List') active @endif">
              <a href="{{ route('customer.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Customers List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Customer') active @endif">
              <a href="{{ route('customer.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Customer") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Suppliers List') active @endif">
              <a href="{{ route('supplier.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("suppliers List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Supplier') active @endif">
              <a href="{{ route('supplier.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Supplier") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if($activePage == 'product-management') active @endif">
        <a data-toggle="collapse" href="#product-management">
          {{-- {{ route('page.index','product-management') }} --}}
          <i class="now-ui-icons business_badge"></i>
          <p>{{ __('Product Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="product-management">
          <ul class="nav myNav">
            <li class="@if ($activePage == 'Products List') active @endif">
              <a href="{{ route('product.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Products List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Product') active @endif">
              <a href="{{ route('product.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Product") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Categories List') active @endif">
              <a href="{{ route('category.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Categories List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Category') active @endif">
              <a href="{{ route('category.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Category") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Companies List') active @endif">
              <a href="{{ route('company.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Companies List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Company') active @endif">
              <a href="{{ route('company.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Company") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Brands List') active @endif">
              <a href="{{ route('brand.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Brands List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Brand') active @endif">
              <a href="{{ route('brand.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Brand") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'sale-party-section') active @endif">
        <a data-toggle="collapse" href="#sale-party-section">
        {{-- <a href="{{ route('page.index','sale-party-section') }}"> --}}
          <i class="now-ui-icons shopping_cart-simple"></i>
          <p>{{ __('Sale/Party Section') }}</p>
          <b class="caret"></b>
        </a>
        <div class="collapse" id="sale-party-section">
          <ul class="nav myNav">
            <li class="@if ($activePage == 'Sales List') active @endif">
              <a href="{{ route('sale.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Sales List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Sale') active @endif">
              <a href="{{ route('sale.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Sale") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Purchases List') active @endif">
              <a href="{{ route('purchase.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Purchases List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Purchase') active @endif">
              <a href="{{ route('purchase.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Purchase") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'purchase') active @endif">
        <a data-toggle="collapse" href="#purchase">
        {{-- <a href="{{ route('page.index','purchase') }}"> --}}
          <i class="now-ui-icons business_money-coins"></i>
          <p>{{ __('Purchase') }}</p>
          <b class="caret"></b>
        </a>
        <div class="collapse" id="purchase">
          <ul class="nav myNav">
            <li class="@if ($activePage == 'Purchases List') active @endif">
              <a href="{{ route('purchase.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Purchases List") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Add Purchase') active @endif">
              <a href="{{ route('purchase.create') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add Purchase") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'sale-report') active @endif">
        <a href="{{ route('page.index','sale-report') }}">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>{{ __('Sale Report') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'brandwise-sale') active @endif">
        <a href="{{ route('page.index','brandwise-sale') }}">
          <i class="now-ui-icons business_briefcase-24"></i>
          <p>{{ __('Brandwise Sale') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'balance-sheet') active @endif">
        <a href="{{ route('page.index','balance-sheet') }}">
          <i class="now-ui-icons education_paper"></i>
          <p>{{ __('Balance Sheet') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'settings') active @endif">
        <a href="{{ route('page.index','settings') }}">
          <i class="now-ui-icons ui-2_settings-90"></i>
          <p>{{ __('Settings') }}</p>
        </a>
      </li>
      {{-- <li class="@if ($activePage == 'backup') active @endif">
        <a href="{{ route('page.index','backup') }}">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Backup') }}</p>
        </a>
      </li> --}}
      {{-- <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
