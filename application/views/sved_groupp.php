<div class="row">
                       <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Сведения о группах</a></li>
                    </ol>
                </nav>
                <div class="container bg-white mb-3 mt-3">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Группа</th>
                                    <th scope="col">Тип группы</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?

                                    foreach ($select_groupp as $item) {

                                        echo '<tr>';
                                        echo '<td>'.$item['id_groupp'].'</td>';
                                        echo '<td>'.$item['name_groupp'].'</td>';
                                        echo '<td>'.$item['tip_groupp'].'</td>';
                                        echo '</tr>';

                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
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