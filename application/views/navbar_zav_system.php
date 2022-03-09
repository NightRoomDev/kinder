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
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/index">Сведения о группах</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/info_attendance">Сводная посещаемость в ДОУ</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/info_missing">Информация об отсутствующих по группе</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/analiz_zabolev">Анализ заболеваемости детей</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/analiz_zdorov">Анализ здоровья детей</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/haracter_zabolev">Характер заболеваемости детей</a>
                                    <a class="dropdown-item" href="<?=base_url()?>Zav_system/sved_med_cart_childred">Сведения о ребенке мед.карты</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>main/out">
                                    Выход
                                </a>
                            </li>
                        </ul>
                    </div>
                  </nav>
            </div>
        </div>