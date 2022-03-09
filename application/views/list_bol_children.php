<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Главная / Список болеющих детей по группе</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form class="row pt-3" action="list_bol_children" method="POST">
                        <div class="col-lg-4" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="id_groupp">Группа</label>
                                <select name="id_groupp" id="id_groupp" class="form-control">
                                    <option value="0">Выберите группу</option>
                                    <?

                                        foreach ($select_groupp as $item_groupp) {

                                            echo '<option value="'.$item_groupp['id_groupp'].'">'.$item_groupp['name_groupp'].'</option>';

                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="date1">Дата начала</label>
                                <input type="date" class="form-control" name="date1" id="date1">
                            </div>
                        </div>
                        <div class="col-lg-3" id="SCREEN_VIEW_CONTAINER">
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
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ФИО</th>
                                <th>Вид заболевания</th>
                                <th>С __ </th>
                                <th>ПО __ </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?

                                foreach ($list_bol_children as $item) {

                                    echo '<tr>';
                                    echo '<td>'.$item['surname_c'].' '.$item['name_c'].'</td>';
                                    echo '<td>'.$item['naim_zabolevania'].'</td>';
                                    echo '<td>'.$item['date_nach'].'</td>';
                                    echo '<td>'.$item['date_kon'].'</td>';
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