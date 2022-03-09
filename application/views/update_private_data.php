<div class="row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Корректировка личных дел</a></li>
                    </ol>
                    </nav>
                    <div class="container-fluid bg-white mb-3">
                        <form method="POST" action="update_private_data" class="row pt-3">
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
                                <select name="id_cheildren" id="id_cheildren" class="form-control id_children_update_private_date">
                                </select>
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="container p-0">
                                <div class="row" id="wrap-data-private">
                                 <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="surname_c">Фамилия</label>
                                        <input type="text" class="form-control" name="surname_c" id="surname_c" placeholder="Фамилия">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name_c">Имя</label>
                                        <input type="text" class="form-control" name="name_c" id="name_c" placeholder="Имя">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="patronymic_c">Отчество</label>
                                        <input type="text" class="form-control" name="patronymic_c" id="patronymic_c" placeholder="Отчество">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="rost">Рост</label>
                                        <input type="text" class="form-control" name="rost" id="rost" placeholder="Рост">
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="ves">Вес</label>
                                        <input type="text" class="form-control" name="ves" id="ves" placeholder="Вес">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="pol">Пол</label>
                                        <input type="text" class="form-control" name="pol" id="pol" placeholder="Пол">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <label for="date_birthday">Дата рождения</label>
                                    <input type="date" class="form-control" id="date_birthday" name="date_birthday">
                                  </div>
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label style="visibility: hidden;">as</label>
                                        <input type="submit" name="add" class="btn btn-success form-control" value="Изменить">
                                    </div>
                                </div> 
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                    <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Фамилия</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Отчество</th>
                            <th scope="col">Дата рождения</th>
                            <th scope="col">Рост</th>
                            <th scope="col">Вес</th>
                            <th scope="col">Пол</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach ($select_cheildren as $item) { 
                            echo '<tr class="table-tr">'; 
                            echo '<td>'.$item['id_Cheildren'].'</td>'; 
                            echo '<td>'.$item['surname_c'].'</td>'; 
                            echo '<td>'.$item['name_c'].'</td>'; 
                            echo '<td>'.$item['patronymic_c'].'</td>'; 
                            echo '<td>'.$item['date_birthday'].'</td>';
                            echo '<td>'.$item['rost'].'</td>';
                            echo '<td>'.$item['ves'].'</td>';
                            echo '<td>'.$item['pol'].'</td>';
                            echo '</tr>';
                            }                           
                            ?>
                        
                        
                    </tbody>
                    </table>
                    </div>
                    
                    <div class="modal fade" id="updateModal_P" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="sved_o_parents">
                                <div class="modal-header">
                                    <h5 class="modal-title">Запись родителя</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">              
                                    <input type="hidden" class="id_cheildren" name="id_cheildren" id="id_cheildren">
                                    <div class="form-group">
                                    <label for="name">Имя</label>
                                        <input type="text" name="name" class="form-control" placeholder="Имя" required id="name" >
                                    </div>
                                    <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                        <input type="text" name="surname" class="form-control" placeholder="Фамилия" required id="surname" >
                                    </div>
                                        <div class="form-group">
                                    <label for="patronymic">Отчество</label>
                                        <input type="text" name="patronymic" class="form-control" placeholder="Отчество" required id="surname" >
                                    </div>
                                    <div class="form-group">
                                    <label for="phone">Телефон</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Телефон" required id="phone" >
                                    </div>
                                    <div class="form-group">
                                    <label for="mesto_work">Место работы</label>
                                        <input type="text" name="mesto_work" class="form-control" placeholder="Место работы" required id="mesto_work" >
                                    </div>
                                    <div class="form-group">
                                    <label for="position">Должность</label>
                                        <input type="text" name="position" class="form-control" placeholder="Должность" required id="position" >
                                    </div>
                                    <div class="form-group">
                                    <label for="e_mail">Электронная почта</label>
                                        <input type="text" name="e_mail" class="form-control" placeholder="e_mail" required id="e_mail" >
                                    </div>
                                    <div class="form-group">
                                    <label for="login">Логин</label>
                                        <input type="text" name="login" class="form-control" placeholder="Логин" required id="login" >
                                    </div>
                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>


                                   <button type="submit" name="add_p"class="btn btn-success">Добавить</button>
                              
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
                                    <h5 class="modal-title">Запись мед.карты</h5>
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
                                    <label for="date">Дата начала</label>
                                        <input type="date" name="date" class="form-control" placeholder="Дата начала" required id="date" >
                                    </div>
                                        <div class="form-group">
                                    <label for="deviation">Отклонения</label>
                                        <input type="text" name="deviation" class="form-control" placeholder="Отклонения" required id="deviation" >
                                    </div>
                                    <div class="form-group">
                                    <label for="disease">Диагноз</label>
                                        <input type="text" name="disease" class="form-control" placeholder="Диагноз" required id="disease" >
                                    </div>
                                </div>
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

            </div>
                            
            </div>
    
    
    </div>

</body>
</html>