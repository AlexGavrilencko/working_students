<!-- Вариант отображения вакансии "мои вакансии"-->
<!-- _______________________________________________________________________________________________ -->
<div class="border_search3">
        <div class="row">
            <div class="col-sm-7 ml-3">
                <div class="row">
                    <p><?= $vacan->name ?></p>
                </div>
                <div class="row">
                    <p> <!-- Название организации подгрузка из базы -->
                        <?php
                            $o = $vacan->organization_id;
                            $organization = Organization::find()->where(['id'=>$o])->one();
                                if ($organization == NULL){
                                    echo 'Не указано';
                                }
                                else echo $organization->name;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-sm-4 ml-5">
                <?php
                    $o = $vacan->organization_id;
                    $organization = Organization::find()->where(['id'=>$o])->one();
                        if($organization->image): ?>
                            <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
               <p> 
                   <?php
                        $c = $vacan->city_id;
                        $city = Attributes::find()->where(['id'=>$c])->one();
                            if ($city == NULL){
                                echo 'Город не указан';
                            }
                            else echo $city->name;
                    ?>
                </p>
            </div>
            <div class="col-sm-4">
                <p>Зарплата: <!-- цена $vacan->salary подгрузка из базы -->
                    <?php
                        $salary = $vacan->salary;
                            if ($salary == NULL){
                                echo 'не указано';
                            }
                            else echo $salary;
                    ?>
                </p>
            </div>
        </div>

        <div class="row ml-1">
                <p>Обязанности:
                    <?php
                        $duties = $vacan->duties;
                            if ($duties == NULL){
                                echo 'Обязанности не указаны';
                            }
                            else echo $duties;
                    ?>
                </p>
        </div>

        <div class="row">
            <div class="col">
                <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
            </div>
            <div class="col">
                <a href="<?= Url::toRoute(['privateoffice/vacancy_up', 'id'=>$vacan->id]); ?>">Редактировать</a>
            </div>
            <div class="col">
                <?= Html::a('Удалить', ['privateoffice/vacancy_del', 'id'=>$vacan->id], [
                    'class' => 'row blok_information',
                    'data' => [
                    'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                    'method' => 'post',
                    ],
                ]); ?>
            </div>
            <div class="col">
                <p>Дата<?= $vacan->dateAdd ?></p>       
            </div>
        </div>

    </div>
    <!-- _______________________________________________________________________________________________ -->




      <!-- _______________________________________________________________________________________________ -->             
      <div class="border_search3">    
            <!-- результаты поиска -->
            <div class="row ">

                        <div class="col-sm-4">
                            <!-- для изображения -->
                            <?php
                            $o = $vacan->organization_id;
                            $organization = Organization::find()->where(['id'=>$o])->one();
                            if($organization->image): ?>
                                        <img class="searchavatar " src="/uploads/<?= $organization->image?>" alt="">
                            <?php endif; ?>
                        </div>

            <div class="col-sm-5 blok_information">
                    <!-- для описания -->
                   <!-- <div class="row">
                        <div class="col-12 col-md-8">-->
                            <p><?= $vacan->name ?></p> <!-- название вакансии подгрузка из базы -->

                            <!-- $vacan->organization_id-->
                                <p>Организация: <!-- Название организации подгрузка из базы -->
                                    <?php
                                        $o = $vacan->organization_id;
                                        $organization = Organization::find()->where(['id'=>$o])->one();
                                            if ($organization == NULL){
                                                echo 'Не указано';
                                            }
                                            else echo $organization->name;
                                    ?>
                                </p>

                                <p>Зарплата: <!-- цена $vacan->salary подгрузка из базы -->
                                    <?php
                                        $salary = $vacan->salary;
                                            if ($salary == NULL){
                                                echo 'не указано';
                                            }
                                            else echo $salary;
                                    ?>
                                </p>

                                <p>    <!-- Город $vacan->city_id подгрузка из базы -->
                                    <?php
                                        $c = $vacan->city_id;
                                        $city = Attributes::find()->where(['id'=>$c])->one();
                                        
                                            if ($city == NULL){
                                                echo 'Не указано';
                                            }
                                            else echo $city->name;
                                    ?>
                                </p>

                                <p>Обязанности:
                                    <?php
                                        $duties = $vacan->duties;
                                            if ($duties == NULL){
                                                echo 'Не указано';
                                            }
                                            else echo $duties;
                                    ?>
                                </p>

                                <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->

                   <!--    </div>-->
                 <!--   </div>   -->
                </div>
                    
                <div class="col-sm-3">
                    <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a>
                    <a href="<?= Url::toRoute(['privateoffice/vacancy_up', 'id'=>$vacan->id]); ?>">Редактировать</a>
                    <?= Html::a('Удалить', ['privateoffice/vacancy_del', 'id'=>$vacan->id], [
                            'class' => 'row blok_information',
                            'data' => [
                                'confirm' => 'Вы действительно хотите удалить данную вакансию?',
                                'method' => 'post',
                            ],
                        ]); ?>

                </div>

            </div>   
        </div>
  <!-- _______________________________________________________________________________________________ -->

  <?php
            /* $city = Attributes::find()->where(['type'=>'city'])->all(); ?>         
                <? $param = ['prompt' => 'Выберите город', 'id' => 'dropDownList-city']; ?>
                <?= Html::dropDownList('city', 0, $city, $param); ?> */
                //$org таблица организация
                //$atr таблица со всеми справочниками
                //$catvac все вакансии выбранной категории
                foreach ($vac as $vacan)
                : 

                //echo $tagg;
                //$post=$vacan->article_id;
                //foreach ($article as $articles)
                //: 
                //if ($post===$articles->id){ ?>





<!-- поиск резюме, старый вариант -->
<!-- Блок для отображения заголовков -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row">
            <div class="col-sm-3 text-center"> 
                <!-- расширенный поиск -->
                <h3>Расширенный поиск</h3>
            </div>

            <div class="col-sm-6 text-center"> 
                <h3>Результаты поиска</h3>
            </div>
        </div>
    </div>
<!-- /Блок для отображения зоголовков (конец) -->    

<!-- Блок для отображения расширеного поиска и вывода резюме -->
    <div class="container-fluid d-flex flex-row bd-highlight flex-column">
        <div class="row">

            <!-- Расширенный поиск -->
            <div class="col-sm-3 border_advanced_search"> 
               
                    <!-- Отображения поиска по слову -->
                    <br>
                    <!-- /Отображение поиска по слову (конец) -->

                    <!-- отображение выпадающих списков (фильтры) -->
                    <?php //отображение выпадающего спика с городами
                        // получаем все города из таблицы атрибутов
                        $city = Attributes::find()->where(['type'=>'city'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($city,'id','name');
                                $params = [
                                    'prompt' => 'Укажите город',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('citty', 'null', $items, $params);
                            //echo $form->field($model, 'city_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с профобластью
                        // получаем профобласть из таблицы атрибутов
                        $category = Attributes::find()->where(['type'=>'category'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($category,'id','name');
                                $params = [
                                    'prompt' => 'Укажите профобласть',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('cat', 'null', $items, $params);
                    ?>

                    <?php //отображение выпадающего списка с опытом работы
                        // получаем опыт работы из таблицы атрибутов
                        $experience = Attributes::find()->where(['type'=>'experience'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($experience,'id','name');
                                $params = [
                                    'prompt' => 'Укажите опыт работы',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('experience', 'null', $items, $params);
                           // echo $form->field($model, 'experience_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с типом занятости
                        // получаем тип занятости из таблицы атрибутов
                        $employment = Attributes::find()->where(['type'=>'employment'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($employment,'id','name');
                                $params = [
                                    'prompt' => 'Укажите тип занятости',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('employment', 'null', $items, $params);
                            //echo $form->field($model, 'employment_id')->dropDownList($items,$params);
                    ?>

                    <?php //отображение выпадающего списка с графиком работы
                        // получаем график работы из таблицы атрибутов
                        $schedule = Attributes::find()->where(['type'=>'schedule'])->all();
                            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                            $items = ArrayHelper::map($schedule,'id','name');
                                $params = [
                                    'prompt' => 'Укажите график работы',
                                    'class' => 'dropDownList',
                                ];
                            echo Html::dropDownList('schedule', 'null', $items, $params);
                           // echo $form->field($model, 'schedule_id')->dropDownList($items,$params);
                    ?>
                     <!-- /отображение выпадающих списков (фильтры) (конец) -->   

                    
               <br>
            </div>
            <!-- /Расширенный поиск (конец) -->


            <div class="col-sm-6">  
                <!-- здесь начинается цикл для отображения -->
                <?php
                    foreach ($resume as $resum): 
                        if ($resum->ShowOrHide===0){
                ?>

                <div class="border_search">     
                    <!-- результаты поиска -->
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- для изображения -->
                            <?php
                                if($resum->image): ?>
                                <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-9 ">
                            <!-- для описания -->
                            <div class="row">
                                <div class="col-12 col-md-8">
                                <!-- ФИО -->
                                    <p><?= $resum->name ?> <?= $resum->surname ?></p> <!-- имя и фамилия подгрузка из базы -->
                                </div>

                                <div class="col-6 col-sm-4">
                                <a href="<?= Url::toRoute(['site/selected_r', 'id'=>$resum->id]); ?>">В избранное</a> <!-- кнопка для сохранения вакансии в избранное-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <p>    <!-- Город $resum->city_id подгрузка из базы -->
                                        <?php
                                            $c = $resum->city_id;
                                            $city = Attributes::find()->where(['id'=>$c])->one();
                                            $obj=$resum->CareerObjective_id;
                                            $object = Attributes::find()->where(['id'=>$obj])->one();
                                                if ($city == NULL)
                                                {
                                                    echo 'Не указано';
                                                }
                                                else echo $city->name;
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $object->name ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p><?= $resum->skills ?></p> <!-- навыки skills подгрузка из базы -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-8">
                                    <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                                </div>

                                <div class="col-6 col-sm-4">
                                    <p><?= $resum->dateAdd ?></p> <!-- дата подгрузка из базы -->
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <?php  }; ?>
                    <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
                    
            </div>
        </div>
    </div> 





    <!-- Поиск вакансий старая версия -->
    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="row">
        <div class="col-sm-3 text-center"> 
             <!-- расширенный поиск -->
             <h3>Расширенный поиск</h3>
        </div>

        <div class="col-sm-6 text-center"> 
            <h3>Результаты поиска</h3>
        </div>
    </div>
</div>

<!-- Для вакансии -->
    <div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
        <div class="row">
            <div class="col-sm-3 border_advanced_search"> 
             <!-- расширенный поиск -->
                 <!--<br>    
                     <form class="search">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <input class="form-control btn-none form-control-lg advanced_search" type="search" placeholder="Поиск...">
                            </div> 
                            <div class="col-auto">
                                <button type="submit" class="btn-none btn btngreen advanced_search_sub">Найти</button>
                            </div>        
                        </div>
                    </form>  -->   
             
                <?php 
                    Pjax::begin(['id' => 'driverPjax']);
                    $form = ActiveForm::begin(['options' => ['data-pjax' => true]]);
                ?>
                <br>

                <div class="col-12  mr_seach">
                    <?php
                        //Данные из таблицы, подготовка данных для данных ГОРОД, а так же вывод в список
                        $city = Attributes::find()->where(['type'=>'city'])->all();
                        $items = ArrayHelper::map($city,'id','name');
                        $param = [
                            'prompt' => 'Укажите город',
                            'class' => 'dropDownList',                         
                        ];
                        echo Html::dropDownList('citty', 'null', $items, $param);
                        
                    ?>
                </div>       
        
                <div class="col-12 mr_seach">
                    <?php
                        $exp = Attributes::find()->where(['type'=>'experience'])->all();
                        $items = ArrayHelper::map($exp,'id','name');
                        $param = [
                            'prompt' => 'Укажите опыт работы',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('exp', 'null', $items, $param);
                    ?>
                </div> 
      
                <div class="col-12  mr_seach">
                    <?php
                        $emp = Attributes::find()->where(['type'=>'employment'])->all();
                        $items = ArrayHelper::map($emp,'id','name');
                        $param = [
                            'prompt' => 'Укажите тип занятости',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('emp', 'null', $items, $param);
                    ?>
                </div> 
        
                <div class="col-12  mr_seach">
                    <?php
                        $sch = Attributes::find()->where(['type'=>'schedule'])->all();
                        $items = ArrayHelper::map($sch,'id','name');
                        $param = [
                            'prompt' => 'Укажите график  работы',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('sch', 'null', $items, $param);
                    ?>
                </div> 

                <div class="col-12  mr_seach">
                    <?php
                        $obj = Attributes::find()->where(['type'=>'objective'])->all();
                        $items = ArrayHelper::map($obj,'id','name');
                        $param = [
                            'prompt' => 'Укажите должность',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('obj', 'null', $items, $param);
                    ?>
                </div>

                <div class="col-12  mr_seach">
                    <?php  
                        $category = Attributes::find()->where(['type'=>'category'])->all();
                        $items = ArrayHelper::map($category,'id','name');
                        $param = [
                            'prompt' => 'Укажите профобласть',
                            'class' => 'dropDownList',   
                        ];
                        echo Html::dropDownList('categoryg', $idc, $items, $param);
                    ?>
                </div>

                <div class="col-12 mr_seach">
                    <?php
                        $org = Organization::find()->all();
                        $items = ArrayHelper::map($org,'id','name');
                        $param = [
                            'prompt' => 'Доступные организации',
                            'class' => 'dropDownList',   
                        ];  
                        echo Html::dropDownList('org', $idc, $items, $param);
                    ?>
                </div>   
            </div>

            <?php  ?>
                <?php ActiveForm::end();?>
                    <?php Pjax::end(); ?> 
                        <div id="col"><?=$categoryg?> </div>  
                        
             <!-- Результаты поиска -->

                <div class="col-sm-6"> 
                    <?php
                            //$org таблица организация
                            //$atr таблица со всеми справочниками
                            //$catvac все вакансии выбранной категории
                            foreach ($catvac as $vacan)
                            : 

                            if ($vacan->ShowOrHide===0){ 
                    ?>
                    <div class="border_search">    
                            <!-- результаты поиска -->
                        <div class="row">
                                <div class="col-sm-3">
                                    <!-- для изображения -->
                                    <?php
                                        $o = $vacan->organization_id;
                                        $organization = Organization::find()->where(['id'=>$o])->one();
                                        if($organization->image): ?>
                                                    <img class="searchavatar" src="/uploads/<?= $organization->image?>" alt="">
                                        <?php endif; ?>
                                </div>

                            <div class="col-sm-9 ">
                                    <!-- для описания -->
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <p><?= $vacan->name ?></p> <!-- название вакансии подгрузка из базы -->
                                    </div>

                                    <div class="col-6 col-sm-4">
                                        <p>    <!-- цена $vacan->salary подгрузка из базы -->
                                            <?php
                                                $salary = $vacan->salary;
                                                    if ($salary == NULL)
                                                    {
                                                        echo 'Не указано';
                                                    }
                                                    else echo $salary;
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <!-- $vacan->organization_id-->
                                        <p>    <!-- Название организации подгрузка из базы -->
                                            <?php
                                                $o = $vacan->organization_id;
                                                $organization = Organization::find()->where(['id'=>$o])->one();
                                                    if ($organization == NULL)
                                                    {
                                                        echo 'Не указано';
                                                    }
                                                    else echo $organization->name;
                                            ?>
                                        </p>
                                    </div>

                                    <div class="col-6 col-sm-4">
                                        <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>">В избранное</a>
                                         <!-- кнопка для сохранения вакансии в избранное-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <p>    <!-- Город $vacan->city_id подгрузка из базы -->
                                            <?php
                                                $c = $vacan->city_id;
                                                $city = Attributes::find()->where(['id'=>$c])->one();
                                                
                                                    if ($city == NULL)
                                                    {
                                                        echo 'Не указано';
                                                    }
                                                    else echo $city->name;
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <!-- описание $vacan->duties подгрузка из базы -->
                                        <p>
                                            <?php
                                                $duties = $vacan->duties;
                                                    if ($duties == NULL)
                                                    {
                                                        echo 'Не указано';
                                                    }
                                                    else echo $duties;
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-8">
                                        <a href="<?= Url::toRoute(['site/complete_information', 'id'=>$vacan->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                                    </div>

                                    <div class="col-6 col-sm-4">
                                        <p><?= $vacan->dateAdd ?></p> <!-- дата $vacan->dateAdd подгрузка из базы -->
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <?php  }; ?>
                        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
                </div>         
        </div>
    </div> 





    <footer class="dark">
             <div class="container">
                 <div class="row justify-content-center">
                    <a href="/site/index" id="logofooter" class="navbar-brad"><img src="/public/img/logofooter1.png" alt="Logo"></a>
                 </div>
                <div class="row">
                    
                    <div class="col-md-3">
                
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light h6" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Документация
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item menugreen_v h6" href="/site/personal_data_protection">Согласие на обработку персональных данных</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/site_terms_of_use">Условие использования сайта</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/the_agreement">Соглашение об оказании услуг по содействию в трудоустройстве</a>
                                    <a class="dropdown-item menugreen_v h6" href="/site/rules_for_placement_of_vacancies">Правила размещения вакансий на ws.ru</a>
                                </div>
                        </li>

                    </div>

                    <div class="col-md-6">
                        <div class="text-center text-light text_foot">
                            &copy; 2019 WorkingStudents, Build with by V&A
                        </div>
                    </div>

                    <div class="col-md-3">
                    </div>
                    
                </div>
             </div>
        </footer>




<!-- код старой страницы работодателя (шапка) -->
<div class="container-fluid d-flex hh-100 flex-row bd-highlight flex-column">        
           <!-- <div class="row">
                <div class="col">
                </div>

                <div class="col">
                    <a href="/auth/login" class="btn-rounded btngreen btn btn-lg m-4">Разместить вакансию</a>
                </div>
            </div>--> 

            <nav class="navbar navbar-expand-lg"> <!-- стиль для меню сайта -->  
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">  <!-- переходы в меню для гостя ссылка на ВХОД -->
                        <li class="nav-item">
                            <a href="/auth/login" class="btn-rounded btnwite btn btn-lg">Разместить вакансию</a>
                        </li>
                    </ul>
                </div>
            </nav>
        
                <p class="h2 text-light margin-top">Найдите сотрудника на вашу вакансию</p>

                <div class="row">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="search">
                                <div class="row no-gutters align-items-center">

                                    <div class="col-8">
                                        <input class="form-control btn-none form-control-lg" type="search" placeholder="Профессия или должность">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn-none btn-lg btn btnwite">Найти</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>          

<!-- контент -->
<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
    <div class="row">
        <div class="col-sm-3 text-center"> 
        </div>

        <div class="col-sm-6 text-center"> 
            <h3>Резюме соискателей</h3>
        </div>
    </div>
</div>

<div class="container-fluid d-flex flex-row bd-highlight flex-column"> <!-- Контейнер для отображения поиска-->
<div class="row">
        <div class="col-sm-3"> 
             <!-- расширенный поиск -->
        </div>


    <div class="col-sm-6">  
     <!-- здесь начинается цикл для отображения -->
     <?php
        //$org таблица организация
        //$atr таблица со всеми справочниками
        //$catvac все вакансии выбранной категории
        foreach ($resume as $resum)
        : 
        if ($resum->ShowOrHide===0){
        //var_dump($resum);die();
	    //echo $tagg;
	    //$post=$vacan->article_id;
	    //foreach ($article as $articles)
		//: 
		//if ($post===$articles->id){ ?>
        <div class="border_search">    
            <!-- результаты поиска -->
            <div class="row">
                <div class="col-sm-3">
                    <!-- для изображения -->
                    <?php
                     if($resum->image): ?>
                                <img class="searchavatar" src="/uploads/<?= $resum->image?>" alt="">
                    <?php endif; ?>
                   
                </div>
                <div class="col-sm-9 ">
                    <!-- для описания -->
                        <div class="row">
                            <div class="col-12 col-md-8">
                            <!-- ФИО -->
                                <p><?= $resum->name ?> <?= $resum->surname ?></p> <!-- имя и фамилия подгрузка из базы -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <a href="<?= Url::toRoute(['site/selectedR', 'id'=>$resum->id]); ?>">В избранное</a> <!-- кнопка для сохранения вакансии в избранное-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>    <!-- Город $resum->city_id подгрузка из базы -->
                                    <?php
                                        $c = $resum->city_id;
                                        $city = Attributes::find()->where(['id'=>$c])->one();
                                        
                                        $obj=$resum->CareerObjective_id;
                                        
                                        $object = Attributes::find()->where(['id'=>$obj])->one();
                                        $city = $resum->city_id;

                                            if ($city == NULL)
                                            {
                                                echo 'Не указано';
                                            }

                                            else echo $city->name;

                                            //else echo $city;

                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->dateBirth ?></p> <!-- дата рождения подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $object->name ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                <p><?= $resum->CareerObjective_id ?></p> <!-- Желаемая должность CareerObjective_id подгрузка из базы -->
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p><?= $resum->skills ?></p> <!-- навыки skills подгрузка из базы -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-8">
                            <a href="<?= Url::toRoute(['site/complete_information_work', 'id'=>$resum->id]); ?>">Подробнее</a> <!-- кнопка для перехода на страницу данной вакансии и сохранение вакансии в просмотренное -->
                            </div>

                            <div class="col-6 col-sm-4">
                                <p><?= $resum->dateAdd ?></p> <!-- дата подгрузка из базы -->

                                <p><?= $vacan->dateAdd ?></p> <!-- дата подгрузка из базы -->

                            </div>
                        </div>
                </div>
            </div>   
        </div>
        <?php  }; ?>
        <?php  endforeach; ?> <!-- здесь заканчивается цикл для отображения -->
    </div>
</div> 
</div> 



проверка
<?php if ($user=Yii::$app->user->identity){
       echo "kzkzkz";
   }
   else{
       echo "pppppp";
   }
   ?>



<?php else ?>
        <img class="compsearchavatar" src="/public/img/nofoto.png" alt="Нет логотипа">


        <a href="<?= Url::toRoute(['site/selected', 'id'=>$vacan->id]); ?>"> <img class="heard" src="/public/img/heard.png" alt="В избранное"></a>