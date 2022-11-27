<?php /* Template Name: Form Template */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="website-form">
    <div class="login-box">
        <h2>Visited User</h2>
        <div class="message"></div>
        <form id="visited-user">
            <div class="user-box">
                <input type="text" name="user-name" required="" placeholder="Enter Name">
            </div>
            <div class="user-box">
                <input type="url" name="website-url" required="" placeholder="Enter Website URL">
            </div>
            <div class="submit-button">
            <input type="submit" value="submit" class="submit-form">
            </div>
        </form>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>


