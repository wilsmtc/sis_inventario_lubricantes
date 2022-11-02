{{-- {{dd($menusComposer)}} --}}
<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>
  <ul class="nav nav-list">
    <li style="text-align: center">  
      <a href="{{route('inicio')}}">   
        <span class="menu-text" style="color: rgb(199, 39, 47)"><b>MENÚ PRINCIPAL</b></span>
      </a>
    </li>
    @foreach ($menusComposer as $key => $item)
        @if ($item["menu_id"] != 0)<!-- solo va entrar cuando es hijo -->
            @break
        @endif
        @include("theme.$theme.menu-item", ["item" => $item])<!-- me redirecciona a la vista menu.item -->
    @endforeach
  </ul><!-- /.nav-list -->
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
