<div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-3 rounded-0 bg-white mb-0 border-bottom">
                      <li class="breadcrumb-item active" aria-current="page"><a href="#"><i class="fas fa-home mr-1"></i>Ввод приказа</a></li>
                    </ol>
                </nav>
                <div class="container-fluid bg-white mb-3">
                    <form action="vvod_prikazov" method="POST" class="row pt-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="FIO">Фамилия, имя, отчество</label>
                                <input type="text" class="form-control" name="FIO" id="FIO" placeholder="Фамилия, имя, отчество">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tel">Телефон</label>
                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dolgn">Должность</label>
                                <input type="text" class="form-control dolgn" name="dolgn" id="dolgn" placeholder="Должность">
                            </div>
                        </div>
                        <div class="col-lg-4 id_groupp">
                            <div class="form-group">
                                <label for="id_groupp" class="id_groupp_label">Группа</label>
                                <select name="id_groupp" id="id_groupp" class="form-control">
                                    <option value="NULL"></option>
                                    <?
                                        foreach ($select_groupp as $item) {

                                            echo '<option value="'.$item['id_groupp'].'">'.$item['name_groupp'].'</option>';

                                        }

                                    ?>
                                </select>
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
                    <thead class="thead-light"">
                        <tr>
                            <th scope="col">ФИО</th>
                            <th scope="col">Логин</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Должность</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?

                            foreach ($select_worker as $item) {

                                echo '<tr>';
                                echo '<td>'.$item['FIO'].'</td>';
                                echo '<td>'.$item['login'].'</td>';
                                echo '<td>'.$item['tel'].'</td>';
                                echo '<td>'.$item['role'].'</td>';
                                echo '</tr>';

                            }

                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        var id_groupp = document.querySelector('.id_groupp').style;
        id_groupp.display = 'none';

        // var dolgn = document.querySelector('.dolgn').value;

        document.querySelector('.dolgn').oninput = function() {


        if (this.value == 'Воспитатель') {

            id_groupp.display = 'block';

        } else {

            id_groupp.display = 'none';

        }

        }




    </script>
</body>
</html>