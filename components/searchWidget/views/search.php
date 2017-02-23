<?php
use app\components\searchWidget\SearchAsset;
SearchAsset::register($this);

?>
<div class="row"">
    <div class="<?='col-lg-'.$model->searchBoxLength?>" style="float: <?=$model->float?>">
        <div class="input-group">
            <input type="text" class="form-control" id="search_value" placeholder="搜索">
            <div class="input-group-btn">
                <button type="button" class="btn <?= $model->searchColor?> dropdown-toggle" data-toggle="dropdown">

                    <?php if (isset($model->searchAttribute)) {
                        $attributeList = array_flip($model->dropdownlistAttributes);

                        if ($attributeList[$model->searchAttribute]) {
                            echo "<span id='button_label' data-value='$model->searchAttribute' href='$model->url'>";
                            echo $attributeList[$model->searchAttribute];
                            echo '</span> <span class="caret"></span>';
                        } else {
                            echo '<span id="button_label" data-value="" href="<?=$model->url?>">';
                            echo '请选择';
                            echo '</span> <span class="caret"></span>';

                        }
                    } else {
                        echo '<span id="button_label" data-value="" href="<?=$model->url?>">';
                        echo '请选择';
                        echo '</span> <span class="caret"></span>';
                    }?>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <?php
                        if (!$model->dropdownlistAttributes) {
                            throw new Exception('property of dropdownlistAttributes not set');
                        }
                        foreach ($model->dropdownlistAttributes as $label => $value) {
                            echo "<li><a href='#' class='search_li' val='$value'>$label</a></li>";
                            echo "<li class='divider'></li>";
                        }
                    ?>
                </ul>
                <button type="button" class="btn <?= $model->searchColor?>" id="search_button"> <span class="glyphicon glyphicon-search"></span></button>
            </div><!-- /btn-group -->
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<script type="text/javascript">
    $(function () {
        $('.search_li').click(function(){
            var label = $(this).text();
            var value = $(this).attr('val');
            $('#button_label').text(label);
            $('#button_label').attr('data-value', value);
        });

        $('#search_button').click(function(){
            var baseUrl = '<?=$model->url?>';
            var searchModelName = '<?=$model->searchModelName?>';
            var searchAttribute = $('#button_label').attr('data-value');
            var searchValue = $('#search_value').val();
            var url = baseUrl + '&' + searchModelName + '[' + searchAttribute + ']=' + searchValue;
            location.href = url;
        })
    })
</script>
