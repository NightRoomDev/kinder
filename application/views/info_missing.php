<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Главная / Информация об отсутствующих за период</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form class="row pt-3" action="info_missing" method="POST">
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
                                    <th rowspan="2"  class="text-center" style="vertical-align: middle;">Группа</th>
                                    <th rowspan="2"  class="text-center" style="vertical-align: middle;">Количество детей</th>
                                    <th colspan="2" class="text-center">Отсутствуют</th>
                                    <th colspan="2" class="text-center">Отсутствуют по причине ОРВИ</th>

                                </tr>
                                <tr>
                                    <th  class="text-center">Кол-во</th>
                                    <th  class="text-center">%</th>
                                    <th  class="text-center">Кол-во</th>
                                    <th  class="text-center">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?

                                    foreach ($info_missing as $item) {

                                        echo '<tr class="text-center">';
                                        echo '<td>'.$item['name_groupp'].'</td>';
                                        echo '<td>'.$item['kol_chl'].'</td>';
                                        echo '<td>'.$item['kolv1'].'</td>';
                                        echo '<td>'.$item['procent_ot'].'</td>';
                                        echo '<td>'.$item['kolv2'].'</td>';
                                        echo '<td>'.$item['procent_ot_orvi'].'</td>';
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