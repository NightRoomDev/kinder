<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Главная / Сводная посещаемость в ДОУ за период</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form class="row pt-3" action="info_attendance" method="POST">
                        <div class="col-lg-4" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="date1">Дата начала</label>
                                <input type="date" class="form-control" name="date1" id="date1">
                            </div>
                        </div>
                        <div class="col-lg-4" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="date2">Дата окончания</label>
                                <input type="date" class="form-control" name="date2" id="date2">
                            </div>
                        </div>
                        <div class="col-lg-2" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label style="visibility: hidden">asd</label>
                                <input type="submit" class="btn btn-success form-control" value="Показать">
                            </div>
                        </div>
                            <div class="col-lg-2" id="SCREEN_VIEW_CONTAINER">
                                <label style="visibility: hidden">asd</label>
                                <button type="button" class="pr-0 pl-0 mr-0 ml-0 btn btn-success form-control btn-print" onclick="window.print()"><i class="fas fa-print mr-1"></i> На печать</button>
                            </div>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="2" class="text-center">План посещаемости</th>
                                    <th class="text-center" rowspan="2" style="vertical-align: middle;">Фактический дето/дней</th>
                                    <th colspan="6" class="text-center">Посещаемость</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Детей</th>
                                    <th>Дето/дней</th>
                                    <th>Всего</th>
                                    <th>По болезни</th>
                                    <th>Метотвод</th>
                                    <th>Без уважительно причины</th>
                                    <th>По заявлению родителей</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?

                                    foreach ($info_attendance as $item) {

                                        echo '<tr>';
                                        echo '<td>'.$item['plan_count_cheildren'].'</td>';
                                        echo '<td>'.$item['pp'].'</td>';
                                        echo '<td>'.$item['fp'].'</td>';
                                        echo '<td>'.$item['vsego'].'</td>';
                                        echo '<td>'.$item['boleet'].'</td>';
                                        echo '<td>'.$item['metotvod'].'</td>';
                                        echo '<td>'.$item['net'].'</td>';
                                        echo '<td>'.$item['roditeli'].'</td>';
                                        echo '</tr>';

                                    }

                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>