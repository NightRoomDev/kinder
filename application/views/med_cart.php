<div class="row">
        <!-- <div class="col-lg-2"></div> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Главная / Справки</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form action="add_spavka" class="row pt-3" method="POST">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="id_groupp">Группа</label>
                                <select name="id_groupp" id="id_groupp" class="form-control">
                                    <?
                                    
                                        foreach ($select_groupp as $item) {

                                            echo '<option value='.$item['id_groupp'].'>'.$item['name_groupp'].'</option>';

                                        }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="id_cheildren">Ребенок</label>
                                <select name="id_cheildren" id="id_cheildren" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="id_zabolevania">Заболевание</label>
                                <select name="id_zabolevania" id="id_zabolevania" class="form-control">
                                        <?
                                        
                                            foreach($visible_viz_zabolev as $item_zabolev) {

                                                echo '<option value='.$item_zabolev['id_zabolevania'].'>'.$item_zabolev['naim_zabolevania'].'</option>';

                                            }
                                        
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="date_nach">Дата начала</label>
                                <input type="date" class="form-control" name="date_nach" id="date_nach">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="date_kon">Дата конца</label>
                                <input type="date" class="form-control" name="date_kon" id="date_kon">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tip_zapisi">Тип записи</label>
                                <input type="text" class="form-control" name="tip_zapisi" id="tip_zapisi" placeholder="Тип записи">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="text_zapisi">Текст записи</label>
                                <textarea name="text_zapisi" id="text_zapisi" cols="30" rows="4" class="form-control" placeholder="Текст записи"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-2 offset-lg-">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success form-control" value="Добавить">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <h4>Фильтрация</h4>
                                    <input type="text" class="form-control" id="naim_zabolevania" name="naim_zabolevania" placeholder="Введите название заболевания">
                                </div>
                        </div>
                    <table class="table table-bordered" id="table-spravki">
                    <thead class="thead-light"">
                        <tr>
                        <th scope="col">Ребенок</th>
                        <th scope="col">Группа здоровья</th>
                        <th scope="col">Отклонения</th>
                        <th scope="col">Заболевание</th>
                        <th scope="col">Тип записи</th>
                        <th scope="col">Текст записи</th>
                        <th scope="col">Дата начала</th>
                        <th scope="col">Дата окончания</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?
                    
                        foreach($visible_med_cart as $item_med) {

                            echo '<tr>';
                            echo '<td>'.$item_med['surname_c'].' '.$item_med['name_c'].'</td>';
                            echo '<td>'.$item_med['groupp_heal'].'</td>';
                            echo '<td>'.$item_med['deviation'].'</td>';
                            echo '<td>'.$item_med['naim_zabolevania'].'</td>';
                            echo '<td>'.$item_med['tip_zapisi'].'</td>';
                            echo '<td>'.$item_med['text_zapisi'].'</td>';
                            echo '<td>'.$item_med['date_nach'].'</td>';
                            echo '<td>'.$item_med['date_kon'].'</td>';
                            // echo '<td><button type="button" class="btn btn-primary updateModal " data-toggle="modal" data-target="#updateModal_G" >Изменить</button></td>';
                            // echo '<td><button type="button" class="btn btn-success updateModal " data-toggle="modal" data-target="#updateModal_M" >Добавить</button></td>';
                            echo '</tr>';

                        }
                    
                    ?>
                    </tbody>
                    </table>
                    </div>
                    <div class="modal fade" id="updateModal_G" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="sved_med_cart">
                                <div class="modal-header">
                                    <h5 class="modal-title">Изменение группы здоровья</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">              
                                    <input type="hidden" class="id_cheildren" name="id_med_cart" id="id_med_cart">
                                    <div class="form-group">
                                    <label for="groupp_heal">Группа здоровья</label>
                                        <input type="text" name="groupp_heal" class="form-control" placeholder="Группа здоровья" required id="groupp_heal" >
                                    </div>
                                    <div class="form-group">
                                    <label for="date">Дата</label>
                                        <input type="date" name="date" class="form-control" placeholder="Дата " required id="date" >
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                   <button type="submit" name="add_p"class="btn btn-primary">Изменить</button>
                              
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="updateModal_M" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="sved_med_cart">
                                <div class="modal-header">
                                    <h5 class="modal-title">Добавление мед процедур</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">              
                                    <input type="hidden" class="id_cheildren" name="id_med_cart" id="id_med_cart">
                                    <div class="form-group">
                                    <label for="med_procedure">Мед процедура</label>
                                        <input type="text" name="med_procedure" class="form-control" placeholder="Мед процедура" required id="groupp_heal" >
                                    </div>
                                    <div class="form-group">
                                    <label for="date">Дата</label>
                                        <input type="date" name="date" class="form-control" placeholder="Дата " required id="date" >
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                   <button type="submit" name="add_p"class="btn btn-success">Добавить</button>
                              
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
