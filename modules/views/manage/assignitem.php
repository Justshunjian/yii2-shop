<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = '分配权限';
//$this->params['breadcrumbs'][] = ['label'=>'管理员管理','url'=>['/admin/manage/mangers']];
//$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label'=>'角色管理','url'=>['/admin/rbac/roles']];
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('admin/css/compiled/new-user.css',['position'=>\yii\web\View::POS_HEAD]);
?>
    <!-- main container -->
        <div class="container-fluid">
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>分配权限</h3>
                </div>
                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                                <?php
                                if (Yii::$app->session->hasFlash('info')) {
                                    echo Yii::$app->session->getFlash('info');
                                }
                                $form = ActiveForm::begin([
                                    'fieldConfig' => [
                                        'template' => '<div class="span12 field-box">{label}{input}</div>{error}',
                                    ],
                                    'options' => [
                                        'class' => 'new_user_form inline-input',
                                    ],
                                ]);
//                                echo $form->field($model, 'username')->textInput(['class' => 'span9']);
//                                echo $form->field($model, 'useremail')->textInput(['class' => 'span9']);
//                                echo $form->field($model, 'userpass')->passwordInput(['class' => 'span9']);
//                                echo $form->field($model, 'repass')->passwordInput(['class' => 'span9']);
                                ?>
                                <div class="span12 field-box">
                                    <?=Html::label('管理员名称', null).Html::encode($admin); ?>
                                </div>
                                <div class="span12 field-box">
                                    <?=Html::label('角色', null).Html::checkboxList('children', $children['roles'],$roles); ?>
                                </div>
                                <div class="span12 field-box">
                                    <?=Html::label('权限', null).Html::checkboxList('children', $children['permissions'], $permissions); ?>
                                </div>

                                <div class="span11 field-box actions">
                                    <?php echo Html::submitButton('分配', ['class' => 'btn-glow primary']); ?>
                                    <span>OR</span>
                                    <?php echo Html::a('返回', Yii::$app->request->headers['referer'], ['class' => 'reset'] ); ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                    <!-- side right column -->
                    <div class="span3 form-sidebar pull-right">
                        <div class="alert alert-info hidden-tablet">
                            <i class="icon-lightbulb pull-left"></i>
                            请在左侧表单当中填入要添加的用户信息,包括用户名,密码,电子邮箱
                        </div>                        
                        <h6>商城用户说明</h6>
                        <p>可以在前台进行登录并且进行购物</p>
                        <p>前台也可以注册用户</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- end main container -->