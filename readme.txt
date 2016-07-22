=== faq shortocde ===
Contributors: Yehuda Hassine 
Donate link:http://wpcoder.co.il/donate.html
Tags: faq,accordion,shortcode,custom post type
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

write faq using the regular post interface you familir with, and use a simple shortcode to publish it where you want.

== Description ==

write faq using the regular post interface you familir with, and use a simple shortcode to publish it where you want.
you just need to put the shortcode where you want:
<pre>
[faq]
</pre>

or you can use one or all of three adittional parameters:  

* color (heading) - blue or #0000FF.
* width - 300px (example).
* publish order - ASC,DSC

default values are: 

* color - #EEEEEE
* width - 600px
* order - ASC.  

<pre>
[faq width=200px color=red order=dsc]
</pre>

for any question feel free to contact me here:
http://wpcoder.co.il/contact-me.html

== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the 
Plugin from Plugins page.

you will see Faq menu apper and from there just press "Add Faq" and publish each question you want. each post is a question and answer, 
title for question and post contentas answer.

after you finished publish all your question, in the post\\page you want to publish the faq  just use the shortocde :

<pre>
[faq]  
</pre>

you can use one or all of three adittional parameters:  

* color (head) - blue or #0000FF.
* width - 300px (example).
* publish order - ASC,DSC.  
  
example:  
<pre>
[faq width=300px color=blue order=asc]
</pre>

inside your template you can use:  
<pre>
echo do_shortcode('[faq width=300px color=blue order=asc]');
</pre>

== Screenshots ==

1. default parmaters in close view.
2. default parmaters in open view.
3. changing the shortcode to specific parameters
4. view with the parameters from the last screenshot.

 