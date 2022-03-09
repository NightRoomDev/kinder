<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0 border-bottom">
                <nav class="navbar navbar-expand-lg bg-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown border-right">
                                <a class="nav-link dropdown-toggle text-white" style="font-size: 14px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Сведения и информация
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?=base_url()?>sekretar/list_bol_children">Список болеющих детей по группе</a>
                                    <a class="dropdown-item" href="<?=base_url()?>sekretar/info_attendance">Сводная посещаемость в ДОУ</a>
                                    <a class="dropdown-item" href="<?=base_url()?>sekretar/info_missing">Информация об отсутствующих за период</a>
                                </div>
                            </li>
                            <li class="nav-item border-right">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>sekretar/vvod_prikazov">Приказы</a>
                            </li>
                            <li class="nav-item border-right">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>sekretar/update_private_data_page">Личные дела</a>
                            </li>
                            <li class="nav-item border-right">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>sekretar/add_cheildren">Дети</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>sekretar/add_groupp">Группы</a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>main/out">Выход</a>
                            </li>
                        </ul>
                    </div>
                  </nav>
            </div>
        </div>