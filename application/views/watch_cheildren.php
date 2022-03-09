<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" id="SCREEN_VIEW_CONTAINER">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Просмотр сведений о ребенке</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form action="index" class="row mt-3" method="POST">
                        <div class="col-lg-4" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="id_groupp">Группа</label>
                                <select name="id_groupp" id="id_groupp" class="form-control">
                                    <?
                                    
                                        foreach ($select_groupp_id as $item) {

                                            echo '<option value='.$item['id_groupp'].'>'.$item['name_groupp'].'</option>';

                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label for="id_cheildren">Ребенок</label>
                                <select name="id_cheildren" id="id_cheildren" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-lg-2" id="SCREEN_VIEW_CONTAINER">
                            <div class="form-group">
                                <label style="visibility: hidden">фыв</label>
                                <input type="submit" class="btn btn-success form-control" value="Просмотр">
                            </div>
                        </div>
                        
                            <div class="col-lg-2" id="SCREEN_VIEW_CONTAINER">
                                <label style="visibility: hidden">фыв</label>
                                <button type="button" class="pr-0 pl-0 ml-0 pr-0 btn btn-success form-control btn-print" onclick="window.print()"><i class="fas fa-print mr-1"></i> На печать</button>
                            </div>
                    </form>
                    <div class="row">
                    <table class="table">
                    <thead class="thead-light table-bordered">
                        <tr>
                            <th scope="col">Ребенок</th>
                            <th scope="col">Пол</th>
                            <th scope="col">Рост</th>
                            <th scope="col">Вес</th>
                            <th scope="col">Группа</th>
                            <th scope="col">Дата рождения</th>
                             <th scope="col">Родитель</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?
                       
                        if (!empty($_POST)) {

                            foreach ($children_svedenia as $item) {

                                echo '<tr>';
                                echo '<td>'.$item['surname_c'].' '.$item['name_c'].' '.$item['patronymic_c'].'</td>';
                                echo '<td>'.$item['pol'].'</td>';
                                echo '<td>'.$item['rost'].'</td>';
                                echo '<td>'.$item['ves'].'</td>';
                                echo '<td>'.$item['name_groupp'].'</td>';
                                echo '<td>'.$item['date_birthday'].'</td>';
                                 echo '<td>'.$item['surname'].' '.$item['name'].' '.$item['patronymic'].'</td>';
                                echo '</tr>';

                            }

                        } else {

                            echo '<tr>';
                            echo '<td colspan="7" class="text-center text-dark p-5">Выберите ребенка</td>';
                            echo '</td>';

                        }


                       
                       ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>