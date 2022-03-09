<div class="container">
<div class="row">
   <form  class="row pt-3" method="POST">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="12" class="text-center">Анализ здоровья детей</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th  class="text-center">Группа</th>
                                    <th>Кол-во детей</th>
                                     <th>Кол-во Iгр</th>
                                    <th>% Iгр</th>
                                    <th>Кол-во IIгр</th>
                                    <th>% IIгр</th>
                                    <th>Кол-во IIIгр</th>
                                    <th>% IIIгр</th>
                                    <th>Кол-во IVгр</th>
                                    <th>% IVгр</th>
                                    <th>Кол-во Vгр</th>
                                    <th>% Vгр</th>
                                </tr>
                                  <?php 
                            if (!empty($zdorow))
                            {                
                            foreach ($zdorow as $item) 
                            { 
							echo '<tr>';  
                            echo '<td>'.$item['name_groupp'].'</td>'; 
                            
							echo '<td>'.$item['K'].'</td>'; 
                            echo '<td>'.$item['K1'].'</td>'; 
                            echo '<td>'.$item['P1'].'</td>'; 
                            echo '<td>'.$item['K2'].'</td>'; 
                            echo '<td>'.$item['P2'].'</td>'; 
                            echo '<td>'.$item['K3'].'</td>'; 
                            echo '<td>'.$item['P3'].'</td>'; 
                            echo '<td>'.$item['K4'].'</td>'; 
                            echo '<td>'.$item['P4'].'</td>'; 
                            echo '<td>'.$item['K5'].'</td>'; 
                            echo '<td>'.$item['P5'].'</td>'; 
                            echo '</tr>';
                            }	
                             }						
							?>
                            </tbody>
                        </table>
                    </form>

               </div>
                <div class="row" id="SCREEN_VIEW_CONTAINER">
                        <div class="col-lg-2 offset-lg-10">
                            <button type="button" class="btn btn-success form-control btn-print" onclick="window.print()"><i class="fas fa-print mr-1"></i> На печать</button>
                        </div>
                    </div>
    </div>
</body>
</html>