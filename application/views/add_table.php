
<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Ввод табеля</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form method='POST'action="" class="row pt-3">
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="id_groupp">Группа</label>
                        <select name="id_groupp" class="form-control ">
                               <option value="-">Выбрать группу</option>
                            <?
                            
                                foreach ($groupp as $item) {

                                    echo '<option value="'.$item['id_groupp'].'">'.$item['name_groupp'].' </option>';

                                }

                            ?>
                        </select>
                    </div>
                 </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="datet">Дата</label>
                                <input type="date" class="form-control" name="datet" id="datet">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label style="visibility: hidden">asd</label>
                                <input type="submit" class="btn btn-success form-control" value="Поиск">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                    <table class="table table-bordered" id="tabel">
                    <thead class="thead-light">
                        <tr>
							
                            <th scope="col">Ребенок</th>
                            <th scope="col">Стаус(был/отсутствовал)</th>
                            <th scope="col">Причина</th>
                            <th scope="col">Добавить</th>
                        
                        </tr>
                    </thead>
                    <!-- <div id="tabel"> -->
                    <tbody>
                        <tr>
                            <?php 
                            if (!empty($cheildren))
                            {


                            
                            foreach ($cheildren as $item) { 
							echo '<tr class="table-tr">';  
							echo '<td>'.$item['surname_c'].' '.$item['name_c'].' '.$item['patronymic_c'].'</td>'; 
							echo '<td>'.$item['status'].'</td>'; 
							echo '<td>'.$item['name_cause'].'</td>'; 
                            echo '<td><button type="button" class="btn btn-success updateModal " data-toggle="modal" data-target="#updateModal" data-id_cheildren="'.$item['id_Cheildren'].'" data-datet="'.$datet.'" data-id_groupp="'.$item['id_groupp'].'" >Добавить</button></td>';
                            }	
                        }						
							?>
                            
                        </tr>
                    </tbody>
                    <!-- </div> -->
                    </table>
                    </div>

                    
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование записи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                    <input type="hidden" class="id_cheildren" name="id_cheildren" id="id_cheildren">
                    <div class="form-group">
                        <input type="hidden" name="datet" class="form-control " id="datet">
                    </div>
                    <input type="hidden" class="id_groupp" name="id_groupp" id="id_groupp">
                    <div class="form-group">
                    <label for="checkbox">Статус</label>
                        <input type="checkbox" name="status" class="form-control" placeholder="Статус" required id="status" value="Отсутствовал">
                    </div>
                    <label for="id_cause">Причина</label>
                        <select name="id_cause" class="form-control " id="id_cause">
                               <option value="-">Выбрать причину</option>
                            <?
                            
                                foreach ($cause as $item) {

                                    echo '<option value="'.$item['id_cause'].'">'.$item['name_cause'].' </option>';

                                }

                            ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>


                   <button type="button" class="btn btn-success" id="id_tabel" data-dismiss="modal">Добавить</button>
              
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование записи</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                    <input type="hidden" class="id_cheildren" name="id_cheildren" id="id_cheildren">
                    <div class="form-group">
                        <input type="hidden" name="datet" class="form-control " id="datet">
                    </div>
                    <input type="hidden" class="id_groupp" name="id_groupp" id="id_groupp">
                    <div class="form-group">
                    <label for="checkbox">Статус</label>
                        <input type="checkbox" name="status" class="form-control" placeholder="Статус" required id="status" value="Отсутствовал">
                    </div>
                    <label for="id_cause">Причина</label>
                        <select name="id_cause" class="form-control " id="id_cause">
                               <option value="-">Выбрать причину</option>
                            <?
                            
                                foreach ($cause as $item) {

                                    echo '<option value="'.$item['id_cause'].'">'.$item['name_cause'].' </option>';

                                }

                            ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>


                   <button type="button" class="btn btn-primary" id="id_tabel" data-dismiss="modal">Изменить</button>
              
                </div>
                </form>
            </div>
        </div>
    </div>





                </div>
            </div>
        </div>
    </div>
    
</body>
</html>