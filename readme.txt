== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/test-plugin` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Form Template exist in the page template option of the page.

==Front End==
After assign the template to the page you can access front page via permalink of the page which you assign the template.
Form ask for Name and URL,
when submit form of name which behave like tittle of custom post type already exist then display meesage user already exist.
Information is store in custom post type named as website. from admin you can see all the data of filled form from website post types.

==Backend==

No one create new Website.
All the standard metabox are removed from backend.
no body can edit the website.
A metabox exist in custom post type which contain the souce of url provided by user when submitted the form.

You can access the rest api json route endpoint by visitig the follow url
/wp-json/wp/v2/websites

