<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Просмотр сообщений</a></li>
                    </ol>
                </nav>
                <div class="container bg-white mb-3 mt-3">
                    <div class="row m-0 bg-white">
                        <table class="table table-striped">
                            <thead class="thead-light">	
                                <tr>
                                    <th>#</th>
                                    <th>Сообщение</th>
                                    <th>Родитель</th>
                                    <th>Дата начала отсутствия</th>
                                    <th>Дата конца отсутствия</th>
                                    <th>Причина</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                        foreach ($message_vospet as $item)
                                        { 
                                            echo '<tr><td>'.$item['id_message'].'</td>'; 
                                            echo '<td>'.$item['surname'].' '.$item['name'].' '.$item['patronymic'].'</td>'; 
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
       
     