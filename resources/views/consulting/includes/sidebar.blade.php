<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('consulting.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            @foreach($items as $item)
                <li class="nav-item">
                    <a href="{{route('consulting.card.index',$item['id'])}}" class="nav-link">
                        <i class="nav-icon fa fa-link"></i>
                        <p>
                            {{$item['title']}}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
