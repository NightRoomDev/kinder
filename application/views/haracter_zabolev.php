<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Главная / Характер заболеваемости детей</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form class="row pt-3" action="haracter_zabolev" method="POST">
                    <div class="col-lg-5" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="date1">Дата начала</label>
                                <input type="date" class="form-control" name="date1" id="date1">
                            </div>
                        </div>
                        <div class="col-lg-5" id="SCREEN_VIEW_CONTAINER">
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
                    <table class="table table-bordered tbl">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="6" class="text-center">Характер заболеваемости</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center">Группа</td>
                                <td>Число детей</td>
                                <td>Кол-во дней заболеваний</td>
                                <td>Кол-во дней заболеваний на 1 ребенка</td>
                            </tr>
                            <?

                                foreach ($haracter_zabolev as $item) {

                                    echo '<tr>';
                                    echo '<td colspan="2">'.$item['name_groupp'].'</td>';
                                    echo '<td>'.$item['kol_chl'].'</td>';
                                    echo '<td>'.$item['sum_days'].'</td>';
                                    echo '<td>'.$item['day_one_chl'].'</td>';
                                    echo '</tr>';

                                }

                            ?>
                        </tbody>
                    </table>
                    </form>
                    <div class="row" id="SCREEN_VIEW_CONTAINER">
                        <div class="col-lg-3 offset-lg-9">
                            <button type="button" class="btn btn-success form-control btn-print" onclick="window.print()"><i class="fas fa-print mr-1"></i> На печать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>