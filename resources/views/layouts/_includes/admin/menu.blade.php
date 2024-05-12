<div class="wrapper">
    <nav class="topnav navbar navbar-light">
    <button type="button" class="p-0 mt-2 mr-3 navbar-toggler text-muted collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
      <li class="nav-item">
        <a class="my-2 nav-link text-muted" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="pr-0 nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mt-2 avatar avatar-sm">
            <img src="" alt="..." class="avatar-img rounded-circle">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="pl-3 dropdown-item" href="{{ route('villa.site.index') }}">
                <span class="ml-1 item-text" >Voltar Para o Site</span>
            </a>
          <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('logout') }}"  class="dropdown-item" onclick="event.preventDefault();
                this.closest('form').submit();">Terminar Sessão</a>
          </form>
          {{-- <a class="dropdown-item" href="#">Activities</a> --}}
        </div>
      </li>
    </ul>
    </nav>

<aside class="bg-white shadow sidebar-left border-right" id="leftSidebar" data-simplebar>
    <a href="#" class="mt-3 ml-2 btn collapseSidebar toggle-btn d-lg-none text-muted" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">

        <div class="mb-4 w-100 d-flex">
            <a class="mx-auto mt-2 text-center navbar-brand flex-fill" href="/dashboard">
                <img class="imiage_de_menu" id="menuImage" src="" style="height:90px" alt="">

            </a>
        </div>
        <ul class="mb-2 navbar-nav flex-fill w-100">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fe fe-home"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="fe fe-users"></i>
                    <span class="ml-3 item-text">Usuários</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.tipo_propriedade.index') }}">
                    <i class="fe fe-building"></i>
                    <span class="ml-3 item-text">Tipos de Propriedade</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.propriedade.index') }}">
                    <i class="fe fe-home"></i>
                    <span class="ml-3 item-text">Propriedades</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logs.index') }}">
                    <i class="fe fe-activity"></i>
                    <span class="ml-1 item-text">Atividades</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.relatorio.index') }}">
                    <i class="fe fe-file-text"></i>
                    <span class="ml-1 item-text">Relatórios</span>
                </a>
            </li>
        </ul>




    </nav>
  </aside>
