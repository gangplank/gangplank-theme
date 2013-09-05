gangplank-theme
===============

Gangplank Wordpress Theme.

A child theme of _straps by VUURR, currently working from the development branch of _straps.

Issues
------

Please visit the [issues](https://github.com/gangplank/gangplank-theme/issues) page to request new features or help out.

Discussion
----------

Please visit our [Basecamp](https://gangplank.basecamphq.com/projects/11071561-gangplank-website/log) site to help out. Contact jade at gangplankhq.com for access.

You can join us on [Flowdock](https://integrum.flowdock.com/invitations/6525d90a026d03425b8ebbf3cc3e0477a02c125b-gp-website) for ongoing discussion on improving the Gangplank web experience.

Contributing
---------------

To get started with contributing to the Gangplank Theme, fork it to your own GitHub account, make any changes you feel are necessary or helpful, and issue a pull request back to the Gangplank organization.

### Open Commit Bit ###

This project has an open commit bit policy: Anyone with an accepted pull request gets added as a repository collaborator. Please don't abuse it.

### WordPress Setup ###

If you are setting up this theme on your own WordPress this information should help:

First: Install the _straps theme in your theme directory using the development branch
git clone -b development git@github.com:vuurr/_straps.git _straps

Second: Install the gangplank theme in your theme directory
git clone git@github.com:gangplank/gangplank-theme.git gangplank-theme

Third; import the pages and posts from the Gangplank public site (ask Jade or David etc. for the XML export file). Make sure when you import that you enable the option to import attached files, you may get a few warnings...

Fourth: In the dashboard menu set the following settings

* Settings
	* General
		* Site Title = Gangplank
		* Tagline = A Collaborative coworking and event space.
		* Timezone = Phoenix
		* Date Format = Custom: F jS Y
		* Time Format = Custom: H:i
	* Reading
		* Front page displays = A static page
			* Front page = Home
			* Posts page = Blog
	* Permalinks
		* Common Settings = Post name
* Appearance
	* Menus
		* Main Menu / Primary Menu = Home Menu
		* Footer Col 1 = Bottom Links
		* Footer Col 2 = Initiatives
		* Footer Col 3 = Locations

Kudos
------

Thanks to the good peeps at [Vuurr](http://vuurr.com) for their [_straps](https://github.com/VUURR/_straps) theme.

Contributors
------------

http://github.com/gangplank/gangplank-theme/contributors
