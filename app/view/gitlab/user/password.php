<!DOCTYPE html>
<html class="" lang="en">
<head  >

    <? require_once VIEW_PATH.'gitlab/common/header/include.php';?>
    <script src="<?=ROOT_URL?>gitlab/assets/webpack/profile.56fab56f950907c5b67a.bundle.js"></script>
    <script src="<?=ROOT_URL?>dev/lib/handlebars-v4.0.10.js" type="text/javascript" charset="utf-8"></script>
    <link href="<?=ROOT_URL?>dev/lib/laydate/theme/default/laydate.css" rel="stylesheet">
    <script src="<?=ROOT_URL?>dev/lib/laydate/laydate.js"></script>
    <script src="<?=ROOT_URL?>dev/js/user/profile.js" type="text/javascript" charset="utf-8"></script>

</head>
<body class="" data-group="" data-page="profiles:show" data-project="">
<? require_once VIEW_PATH.'gitlab/common/body/script.php';?>


<header class="navbar navbar-gitlab with-horizontal-nav">
    <a class="sr-only gl-accessibility" href="#content-body" tabindex="1">Skip to content</a>
    <div class="container-fluid">
        <? require_once VIEW_PATH.'gitlab/common/body/header-content.php';?>
    </div>
</header>
<script>
    var findFileURL = "/ismond/xphp/find_file/master";
</script>
<div class="page-with-sidebar">

    <? require_once VIEW_PATH.'gitlab/user/common-page-nav.php';?>

    <div class="content-wrapper page-with-layout-nav page-with-sub-nav">
        <div class="alert-wrapper">

            <div class="flash-container flash-container-page">
            </div>

        </div>
        <div class="content" id="content-body">
            <div class="cover-block user-cover-block">
                <div class="cover-controls">
                    <a class="btn btn-gray has-tooltip" title="Edit profile" aria-label="Edit profile" href="<?=ROOT_URL?>user/profile_edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <!--<a class="btn btn-gray has-tooltip" title="Subscribe" aria-label="Subscribe" href="/sven.atom?private_token=vyxEf937XeWRN9gDqyXk">
                        <i class="fa fa-rss"></i>
                    </a>-->
                </div>
                <div class="profile-header">
                    <div class="avatar-holder">
                        <a target="_blank" rel="noopener noreferrer" href="<?=$user['avatar']?>">
                            <img class="avatar s90" alt="" src="<?=$user['avatar']?>" /></a>
                    </div>
                    <div class="user-info">
                        <div class="cover-title"><?=$user['display_name']?></div>
                        <div class="cover-desc member-date">
                            <span class="middle-dot-divider"><?=$user['username']?></span>
                            <span class="middle-dot-divider"><?=$user['create_time_text']?></span></div>
                        <div class="cover-desc"></div>
                    </div>
                </div>
                <div class="scrolling-tabs-container">
                    <div class="fade-left">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="fade-right">
                        <i class="fa fa-angle-right"></i>
                    </div>
                    <?php
                    $profile_nav='password';
                    include_once VIEW_PATH.'gitlab/user/common-profile-nav.php';
                    ?>
                </div>
            </div>
            <div class="container-fluid container-limited">
            <div class="row prepend-top-default">
                <div class="col-lg-4 profile-settings-sidebar">
                    <h4 class="prepend-top-0">Password</h4>
                    <p>After a successful password update, you will be redirected to the login page where you can log in with your new password.</p>
                </div>
                <div class="col-lg-8">
                    <h5 class="prepend-top-0">Change your password or recover your current one</h5>
                    <form class="update-password" id="edit_password" action="<?=ROOT_URL?>user/password" accept-charset="UTF-8" method="post">
                        <input name="utf8" type="hidden" value="✓">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="authenticity_token" value="">
                        <div class="form-group">
                            <label class="label-light" for="user_current_password">Current password</label>
                            <input required="required" class="form-control" type="password" name="params[origin_pass]" id="user_current_password">
                            <p class="help-block">You must provide your current password in order to change it.</p></div>
                        <div class="form-group">
                            <label class="label-light" for="user_password">New password</label>
                            <input required="required" class="form-control" type="password" name="params[new_password]" id="user_password"></div>
                        <div class="form-group">
                            <label class="label-light" for="user_password_confirmation">Password confirmation</label>
                            <input required="required" class="form-control" type="password" name="params[password_confirmation]" id="user_password_confirmation"></div>
                        <div class="prepend-top-default append-bottom-default">
                            <input type="button" name="commit" id="commit" value="Save password" class="btn btn-create append-right-10">
                            <a class="account-btn-link" rel="nofollow" data-method="put" href="<?=ROOT_URL?>passport/find_password">I forgot my password</a></div>
                    </form>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">

    var $profile = null;
    $(function() {

        var options = {
            uid:window.current_uid,
            update_password_url:"<?=ROOT_URL?>user/setNewPassword",
        }

        $('#commit').bind('click',function(){
            window.$profile.updatePassword();
        })
        window.$profile = new Profile( options );
    });



</script>


</body>
</html>

