 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <a href="{{ url('/') }}" class="brand-link">
         <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">My Blog</span>
     </a>
     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="{{ route('welcome') }}" class="d-block">{{ auth()->user()->name }}</a>
             </div>
         </div>
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 {{-- Categories --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Cetagories
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('category.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Cetagories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/category') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Cetagories</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- SubCategories --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             SubCategories
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('subcategory.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create SubCategories</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('subcategory') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All SubCategories</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Blog Posting --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Blogs
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('post.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Post Blogs</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('post') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Blogs</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Products Crud --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                            Products
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('products.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Products</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('products') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Products</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Permission --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Permission
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('permission.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Permission</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('permission.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Permissions</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Role --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Role
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('role.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Role</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('role.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Roles</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
     </div>
 </aside>
