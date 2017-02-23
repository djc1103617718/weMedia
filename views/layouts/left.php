<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '新闻资源管理',
                        'url' => '#',
                        'items' => [
                            ['label' => '新闻资源列表', 'url' => ['news-resources/index']],
                            ['label' => '编辑的新闻列表', 'url' => ['article/index']],
                            ['label' => '编辑新闻', 'url' => ['article/create']]
                        ],
                    ],
                    [
                        'label' => '贴吧管理',
                        'url' => '#',
                        'items' => [
                            ['label' => '贴吧列表', 'url' => ['tieba-school-info/index']],
                        ],
                    ]
                ],
            ]
        ) ?>

    </section>

</aside>
