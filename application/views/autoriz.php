<body class="bg-light">
    <div class="container">
            <form action="" class="row" method="POST">
                <div class="col-lg-6 offset-lg-3 mt-5 mb-2">
                    <h4 class="text-center rounded-top bg-navbar border-secondary mb-0 pt-3 border-top border-left border-right pb-2"><i class="fas fa-sun text-warning" style="font-size: 50px"></i></h4>
                    <h5 class="text-center bg-navbar border-secondary mb-0 text-white border-left border-right pb-2">МАДОУ Детский сад №2</h5>
                    <h3 class="text-center rounded-bottom bg-navbar border-secondary border-bottom border-left border-right mb-0 text-warning pb-3">"СОЛНЫШКО"</h3>
                </div>
                <div class="col-lg-6 offset-lg-3 mb-2">
                    <h5 class="bg-navbar text-white p-3 border border-secondary rounded">
                        Авторизация
                    </h5>
                </div>
                 <div class="col-lg-6 offset-lg-3">
				 
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="Введите логин,телефон или эл.почту" required>
                    </div>
                 </div>
				 <?php echo '<p class = "error-text">'.$message.'</p>';?>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                    </div>
                 </div>
                 <div class="col-lg-6 offset-lg-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="submit" class="btn bg-navbar text-white form-control" value="Войти">
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
</html>