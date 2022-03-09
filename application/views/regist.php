<body class="bg-light">
    <div class="container">
            <form class="row" method="POST">
                <div class="col-lg-6 offset-lg-3 mt-5 mb-2">
                    <h4 class="text-center rounded-top bg-navbar border-secondary mb-0 pt-3 border-top border-left border-right pb-2"><i class="fas fa-sun text-warning" style="font-size: 50px"></i></h4>
                    <h5 class="text-center bg-navbar border-secondary mb-0 text-white border-left border-right pb-2">МАДОУ Детский сад №2</h5>
                    <h3 class="text-center rounded-bottom bg-navbar border-secondary border-bottom border-left border-right mb-0 text-warning pb-3">"СОЛНЫШКО"</h3>
                </div>
                <div class="col-lg-6 offset-lg-3 mb-2">
                    <h5 class="bg-navbar text-white p-3 border border-secondary rounded">
                        Регистрация
                    </h5>
                </div>
                <div class="col-lg-6 offset-lg-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="surname" placeholder="Фамилия" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Имя" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="patronymic" placeholder="Отчетсво" required>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Номер телефона" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <select name="id_Cheildren" class="form-control">
                            <option value="-">Ребенок</option>
                            <?
                            
                                foreach ($cheildren as $item) {

                                    echo '<option value="'.$item['id_Cheildren'].'">'.$item['surname_c'].' '.$item['name_c'].'</option>';

                                }

                            ?>
                        </select>
                    </div>
                 </div>
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="stepen_rodstva" placeholder="Степень родства" required>
                    </div>
                 </div>
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="mesto_work" placeholder="Место работы" required>
                    </div>
                 </div>
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="position" placeholder="Должность" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Эл.почта" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="Логин" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="submit" class="btn bg-navbar text-white form-control" value="Зарегистрироваться">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <a href="<?=base_url()?>main/index" class="btn bg-navbar text-white form-control">Назад</a>
                            </div>
                        </div>
                    </div>
                 </div>
            </form>
    </div>
</body>