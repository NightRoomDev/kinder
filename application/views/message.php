<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Оставить сообщение</a></li>
                    </ol>
                </nav>
                <div class="container bg-white mb-3">
                    <form action="" class="row bg-white m-0" method="POST">
                        <div class="col-lg-12 p-0">
                            <? 
                            
                            //    echo $message;

                            ?>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label for="date_start_m">Дата начала отсутствия</label>
                                <input type="date" class="form-control" name="date_start_m">
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label for="date_end_m">Дата конца отсутствия</label>
                                <input type="date" class="form-control" name="date_end_m">
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="form-group">
                                <label for="id_cause">Причина</label>
                                <select name="id_cause" id="id_cause" class="form-control">
                                    <option value="">Выберите причину</option>
                                    <?
                                    
                                        foreach ($cause as $item) {

                                            echo '<option value="'.$item['id_cause'].'">'.$item['name_cause'].'</option>';

                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea name="text_message" id="" cols="30" rows="4" class="form-control" placeholder="Введите текст сообщения..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-10 pt-2">
                            <h4>Список ваших сообщений</h4>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <input type="submit" class="btn btn-success float-right">
                        </div>
                    </form>
                    <div class="row m-0 bg-white">
                        <table class="table table-striped">
                            <thead class="thead-light">	
                                <tr>
                                    <th>#</th>
                                    <th>Сообщение</th>
                                    <th>Дата начала отсутствия</th>
                                    <th>Дата конца отсутствия</th>
                                    <th>Причина</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        foreach ($message_my_children as $item)
                                        { 
                                            echo '<tr><td>'.$item['id_message'].'</td>'; 
                                            echo '<td>'.$item['text_message'].'</td>'; 
                                            echo '<td>'.$item['date_start_m'].'</td>'; 
                                            echo '<td>'.$item['date_end_m'].'</td>'; 
                                            echo '<td>'.$item['name_cause'].'</td></tr>'; 
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
       
     