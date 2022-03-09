<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Ввод приказа о добавление группы</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form method="POST" action="" class="row pt-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name_groupp">Название группы</label>
                                <input type="text" class="form-control" name="name_groupp" id="name_groupp" placeholder="Название группы">
                            </div>
                        </div>  
						<div class="col-lg-6">
                            <div class="form-group">
                                <label for="tip_groupp">Тип группы</label>
								<select  name="tip_groupp"class="form-control">
								<option value="Ясли">Ясли</option>
								<option value="Младшая">Младшая</option>
								<option value="Средняя">Средняя</option>
                                <option value="Старшая">Старшая</option>
								<option value="Подготовительная">Подготовительная</option>
								</select>
                            </div>
                        </div>  						
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="plan_count_cheildren">Количество детей</label>
                                <input type="number" class="form-control" name="plan_count_cheildren" id="plan_count_cheildren" placeholder="Количество детей">
                            </div>
                        </div>        						
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label style="visibility: hidden">asd</label>
                                <input type="submit" class="btn btn-success form-control" value="Добавить">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                    <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
							<th scope="col">#</th>
                            <th scope="col">Группа</th>
							<th scope="col">Тип группы</th>
                            <th scope="col">Количество детей</th>
							<th scope="col">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
					<tr>
                            <?php foreach ($groupp as $item) { 
							echo '<tr class="table-tr">'; 
							echo '<td>'.$item['id_groupp'].'</td>'; 
							echo '<td>'.$item['name_groupp'].'</td>';
							echo '<td>'.$item['tip_groupp'].'</td>';
							echo '<td>'.$item['plan_count_cheildren'].'</td>'; 
							if ($item['status'] == 0)
							{
								
							echo '<td>   </td>'; 
							}	
							else
							{
								echo '<td> Карантин  </td>';
							}
								   echo'</tr>';

							}	
                            echo '<td'							   
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