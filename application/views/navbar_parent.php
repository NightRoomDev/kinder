<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0 border-bottom">
                <nav class="navbar navbar-expand-lg bg-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto w-50">
                            <form class="w-100" style="margin-left: 82px">
                                <input class="form-control w-100 rounded-0" type="search" placeholder="Поиск по сайту" aria-label="Search">
                            </form>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                            <a class="nav-link text-dark bg-white border-bottom border-dark" style="font-size: 14px" href="#">
                                <i class="fas fa-user mr-1"></i>
                                <?
                                
                                    foreach($visible_fio as $item) {

                                        echo $item['surname'].' '.$item['name'];

                                    }
                                    
                                
                                ?>
                                </a>
                            </li>
                            <li class="nav-item border-right">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>Parents/index">Информация о ребенке</a>
                            </li>
                            <li class="nav-item border-right">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>Parents/insert_message">Оставить сообщение</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" style="font-size: 14px" href="<?=base_url()?>main/out">Выйти</a>
                            </li>
                        </ul>
                    </div>
                  </nav>
            </div>
        </div>