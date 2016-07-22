jQuery(document).ready(function() {
	jQuery('#accordion .heading').corner();
	jQuery('#accordion .heading').click(function() {
		jQuery(this).next().toggle('fast');
		return false;
	}).next().hide();
});