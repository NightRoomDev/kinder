<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Информация о ребенке</a></li>
                    </ol>
                </nav>
                <div class="container bg-white mb-3">
                    <div class="info-childern p-3">
                        <ul style="list-style-type: none">
                            <?

                                foreach ($info_childern as $item) {

                                    echo '<li class="border-bottom mb-2"><b>ФИО: </b> <span class="float-right">'.$item['surname_c'].' '.$item['name_c'].' '.$item['patronymic_c'].'</span></li>';
                                    echo '<li class="border-bottom"><b>Группа: </b> <span class="float-right">'.$item['name_groupp'].'</span></li>';     
                                    echo ' <li class="border-bottom mb-2"><b>Дата рождения: </b> <span class="float-right">'.$item['date_birthday'].'</span></li>';
                                    echo ' <li class="border-bottom mb-2"><b>Рост: </b> <span class="float-right">'.$item['rost'].'</span></li>';
                                    echo ' <li class="border-bottom mb-2"><b>Вес: </b> <span class="float-right">'.$item['ves'].'</span></li>';
                                    echo ' <li class="border-bottom mb-2"><b>Пол: </b> <span class="float-right">'.$item['pol'].'</span></li>';
                                    echo ' <li class="border-bottom mb-2"><b>Группа здоровья: </b> <span class="float-right">'.$item['groupp_heal'].'</span></li>';


                                }

                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>