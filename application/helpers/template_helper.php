<?php
function output_java_script ($file_names)
{
	$html = '';

	if (!empty($file_names))
	{
		foreach ($file_names as $name)
		{
			$html .= '<script src="/assets' . $name . '.js" type="text/javascript" charset="utf-8"></script>';
		}
	}

	return $html;
}

function output_css ($file_names)
{
	$html = '';

	if (!empty($file_names))
	{
		foreach ($file_names as $name)
		{
			$html .= '<link href="/assets' . $name . '.css" rel="stylesheet" type="text/css" />';
		}
	}

	return $html;
}

function fa_icons()
{
	return array(
		'fa-glass'                               => 'f000',
		'fa-music'                               => 'f001',
		'fa-search'                              => 'f002',
		'fa-envelope-o'                          => 'f003',
		'fa-heart'                               => 'f004',
		'fa-star'                                => 'f005',
		'fa-star-o'                              => 'f006',
		'fa-user'                                => 'f007',
		'fa-film'                                => 'f008',
		'fa-th-large'                            => 'f009',
		'fa-th'                                  => 'f00a',
		'fa-th-list'                             => 'f00b',
		'fa-check'                               => 'f00c',
		'fa-times'                               => 'f00d',
		'fa-search-plus'                         => 'f00e',
		'fa-search-minus'                        => 'f010',
		'fa-power-off'                           => 'f011',
		'fa-signal'                              => 'f012',
		'fa-cog'                                 => 'f013',
		'fa-trash-o'                             => 'f014',
		'fa-home'                                => 'f015',
		'fa-file-o'                              => 'f016',
		'fa-clock-o'                             => 'f017',
		'fa-road'                                => 'f018',
		'fa-download'                            => 'f019',
		'fa-arrow-circle-o-down'                 => 'f01a',
		'fa-arrow-circle-o-up'                   => 'f01b',
		'fa-inbox'                               => 'f01c',
		'fa-play-circle-o'                       => 'f01d',
		'fa-repeat'                              => 'f01e',
		'fa-refresh'                             => 'f021',
		'fa-list-alt'                            => 'f022',
		'fa-lock'                                => 'f023',
		'fa-flag'                                => 'f024',
		'fa-headphones'                          => 'f025',
		'fa-volume-off'                          => 'f026',
		'fa-volume-down'                         => 'f027',
		'fa-volume-up'                           => 'f028',
		'fa-qrcode'                              => 'f029',
		'fa-barcode'                             => 'f02a',
		'fa-tag'                                 => 'f02b',
		'fa-tags'                                => 'f02c',
		'fa-book'                                => 'f02d',
		'fa-bookmark'                            => 'f02e',
		'fa-print'                               => 'f02f',
		'fa-camera'                              => 'f030',
		'fa-font'                                => 'f031',
		'fa-bold'                                => 'f032',
		'fa-italic'                              => 'f033',
		'fa-text-height'                         => 'f034',
		'fa-text-width'                          => 'f035',
		'fa-align-left'                          => 'f036',
		'fa-align-center'                        => 'f037',
		'fa-align-right'                         => 'f038',
		'fa-align-justify'                       => 'f039',
		'fa-list'                                => 'f03a',
		'fa-outdent'                             => 'f03b',
		'fa-indent'                              => 'f03c',
		'fa-video-camera'                        => 'f03d',
		'fa-picture-o'                           => 'f03e',
		'fa-pencil'                              => 'f040',
		'fa-map-marker'                          => 'f041',
		'fa-adjust'                              => 'f042',
		'fa-tint'                                => 'f043',
		'fa-pencil-square-o'                     => 'f044',
		'fa-share-square-o'                      => 'f045',
		'fa-check-square-o'                      => 'f046',
		'fa-arrows'                              => 'f047',
		'fa-step-backward'                       => 'f048',
		'fa-fast-backward'                       => 'f049',
		'fa-backward'                            => 'f04a',
		'fa-play'                                => 'f04b',
		'fa-pause'                               => 'f04c',
		'fa-stop'                                => 'f04d',
		'fa-forward'                             => 'f04e',
		'fa-fast-forward'                        => 'f050',
		'fa-step-forward'                        => 'f051',
		'fa-eject'                               => 'f052',
		'fa-chevron-left'                        => 'f053',
		'fa-chevron-right'                       => 'f054',
		'fa-plus-circle'                         => 'f055',
		'fa-minus-circle'                        => 'f056',
		'fa-times-circle'                        => 'f057',
		'fa-check-circle'                        => 'f058',
		'fa-question-circle'                     => 'f059',
		'fa-info-circle'                         => 'f05a',
		'fa-crosshairs'                          => 'f05b',
		'fa-times-circle-o'                      => 'f05c',
		'fa-check-circle-o'                      => 'f05d',
		'fa-ban'                                 => 'f05e',
		'fa-arrow-left'                          => 'f060',
		'fa-arrow-right'                         => 'f061',
		'fa-arrow-up'                            => 'f062',
		'fa-arrow-down'                          => 'f063',
		'fa-share'                               => 'f064',
		'fa-expand'                              => 'f065',
		'fa-compress'                            => 'f066',
		'fa-plus'                                => 'f067',
		'fa-minus'                               => 'f068',
		'fa-asterisk'                            => 'f069',
		'fa-exclamation-circle'                  => 'f06a',
		'fa-gift'                                => 'f06b',
		'fa-leaf'                                => 'f06c',
		'fa-fire'                                => 'f06d',
		'fa-eye'                                 => 'f06e',
		'fa-eye-slash'                           => 'f070',
		'fa-exclamation-triangle'                => 'f071',
		'fa-plane'                               => 'f072',
		'fa-calendar'                            => 'f073',
		'fa-random'                              => 'f074',
		'fa-comment'                             => 'f075',
		'fa-magnet'                              => 'f076',
		'fa-chevron-up'                          => 'f077',
		'fa-chevron-down'                        => 'f078',
		'fa-retweet'                             => 'f079',
		'fa-shopping-cart'                       => 'f07a',
		'fa-folder'                              => 'f07b',
		'fa-folder-open'                         => 'f07c',
		'fa-arrows-v'                            => 'f07d',
		'fa-arrows-h'                            => 'f07e',
		'fa-bar-chart'                           => 'f080',
		'fa-twitter-square'                      => 'f081',
		'fa-facebook-square'                     => 'f082',
		'fa-camera-retro'                        => 'f083',
		'fa-key'                                 => 'f084',
		'fa-cogs'                                => 'f085',
		'fa-comments'                            => 'f086',
		'fa-thumbs-o-up'                         => 'f087',
		'fa-thumbs-o-down'                       => 'f088',
		'fa-star-half'                           => 'f089',
		'fa-heart-o'                             => 'f08a',
		'fa-sign-out'                            => 'f08b',
		'fa-linkedin-square'                     => 'f08c',
		'fa-thumb-tack'                          => 'f08d',
		'fa-external-link'                       => 'f08e',
		'fa-sign-in'                             => 'f090',
		'fa-trophy'                              => 'f091',
		'fa-github-square'                       => 'f092',
		'fa-upload'                              => 'f093',
		'fa-lemon-o'                             => 'f094',
		'fa-phone'                               => 'f095',
		'fa-square-o'                            => 'f096',
		'fa-bookmark-o'                          => 'f097',
		'fa-phone-square'                        => 'f098',
		'fa-twitter'                             => 'f099',
		'fa-facebook'                            => 'f09a',
		'fa-github'                              => 'f09b',
		'fa-unlock'                              => 'f09c',
		'fa-credit-card'                         => 'f09d',
		'fa-rss'                                 => 'f09e',
		'fa-hdd-o'                               => 'f0a0',
		'fa-bullhorn'                            => 'f0a1',
		'fa-bell'                                => 'f0f3',
		'fa-certificate'                         => 'f0a3',
		'fa-hand-o-right'                        => 'f0a4',
		'fa-hand-o-left'                         => 'f0a5',
		'fa-hand-o-up'                           => 'f0a6',
		'fa-hand-o-down'                         => 'f0a7',
		'fa-arrow-circle-left'                   => 'f0a8',
		'fa-arrow-circle-right'                  => 'f0a9',
		'fa-arrow-circle-up'                     => 'f0aa',
		'fa-arrow-circle-down'                   => 'f0ab',
		'fa-globe'                               => 'f0ac',
		'fa-wrench'                              => 'f0ad',
		'fa-tasks'                               => 'f0ae',
		'fa-filter'                              => 'f0b0',
		'fa-briefcase'                           => 'f0b1',
		'fa-arrows-alt'                          => 'f0b2',
		'fa-users'                               => 'f0c0',
		'fa-link'                                => 'f0c1',
		'fa-cloud'                               => 'f0c2',
		'fa-flask'                               => 'f0c3',
		'fa-scissors'                            => 'f0c4',
		'fa-files-o'                             => 'f0c5',
		'fa-paperclip'                           => 'f0c6',
		'fa-floppy-o'                            => 'f0c7',
		'fa-square'                              => 'f0c8',
		'fa-bars'                                => 'f0c9',
		'fa-list-ul'                             => 'f0ca',
		'fa-list-ol'                             => 'f0cb',
		'fa-strikethrough'                       => 'f0cc',
		'fa-underline'                           => 'f0cd',
		'fa-table'                               => 'f0ce',
		'fa-magic'                               => 'f0d0',
		'fa-truck'                               => 'f0d1',
		'fa-pinterest'                           => 'f0d2',
		'fa-pinterest-square'                    => 'f0d3',
		'fa-google-plus-square'                  => 'f0d4',
		'fa-google-plus'                         => 'f0d5',
		'fa-money'                               => 'f0d6',
		'fa-caret-down'                          => 'f0d7',
		'fa-caret-up'                            => 'f0d8',
		'fa-caret-left'                          => 'f0d9',
		'fa-caret-right'                         => 'f0da',
		'fa-columns'                             => 'f0db',
		'fa-sort'                                => 'f0dc',
		'fa-sort-desc'                           => 'f0dd',
		'fa-sort-asc'                            => 'f0de',
		'fa-envelope'                            => 'f0e0',
		'fa-linkedin'                            => 'f0e1',
		'fa-undo'                                => 'f0e2',
		'fa-gavel'                               => 'f0e3',
		'fa-tachometer'                          => 'f0e4',
		'fa-comment-o'                           => 'f0e5',
		'fa-comments-o'                          => 'f0e6',
		'fa-bolt'                                => 'f0e7',
		'fa-sitemap'                             => 'f0e8',
		'fa-umbrella'                            => 'f0e9',
		'fa-clipboard'                           => 'f0ea',
		'fa-lightbulb-o'                         => 'f0eb',
		'fa-exchange'                            => 'f0ec',
		'fa-cloud-download'                      => 'f0ed',
		'fa-cloud-upload'                        => 'f0ee',
		'fa-user-md'                             => 'f0f0',
		'fa-stethoscope'                         => 'f0f1',
		'fa-suitcase'                            => 'f0f2',
		'fa-bell-o'                              => 'f0a2',
		'fa-coffee'                              => 'f0f4',
		'fa-cutlery'                             => 'f0f5',
		'fa-file-text-o'                         => 'f0f6',
		'fa-building-o'                          => 'f0f7',
		'fa-hospital-o'                          => 'f0f8',
		'fa-ambulance'                           => 'f0f9',
		'fa-medkit'                              => 'f0fa',
		'fa-fighter-jet'                         => 'f0fb',
		'fa-beer'                                => 'f0fc',
		'fa-h-square'                            => 'f0fd',
		'fa-plus-square'                         => 'f0fe',
		'fa-angle-double-left'                   => 'f100',
		'fa-angle-double-right'                  => 'f101',
		'fa-angle-double-up'                     => 'f102',
		'fa-angle-double-down'                   => 'f103',
		'fa-angle-left'                          => 'f104',
		'fa-angle-right'                         => 'f105',
		'fa-angle-up'                            => 'f106',
		'fa-angle-down'                          => 'f107',
		'fa-desktop'                             => 'f108',
		'fa-laptop'                              => 'f109',
		'fa-tablet'                              => 'f10a',
		'fa-mobile'                              => 'f10b',
		'fa-circle-o'                            => 'f10c',
		'fa-quote-left'                          => 'f10d',
		'fa-quote-right'                         => 'f10e',
		'fa-spinner'                             => 'f110',
		'fa-circle'                              => 'f111',
		'fa-reply'                               => 'f112',
		'fa-github-alt'                          => 'f113',
		'fa-folder-o'                            => 'f114',
		'fa-folder-open-o'                       => 'f115',
		'fa-smile-o'                             => 'f118',
		'fa-frown-o'                             => 'f119',
		'fa-meh-o'                               => 'f11a',
		'fa-gamepad'                             => 'f11b',
		'fa-keyboard-o'                          => 'f11c',
		'fa-flag-o'                              => 'f11d',
		'fa-flag-checkered'                      => 'f11e',
		'fa-terminal'                            => 'f120',
		'fa-code'                                => 'f121',
		'fa-reply-all'                           => 'f122',
		'fa-star-half-o'                         => 'f123',
		'fa-location-arrow'                      => 'f124',
		'fa-crop'                                => 'f125',
		'fa-code-fork'                           => 'f126',
		'fa-chain-broken'                        => 'f127',
		'fa-question'                            => 'f128',
		'fa-info'                                => 'f129',
		'fa-exclamation'                         => 'f12a',
		'fa-superscript'                         => 'f12b',
		'fa-subscript'                           => 'f12c',
		'fa-eraser'                              => 'f12d',
		'fa-puzzle-piece'                        => 'f12e',
		'fa-microphone'                          => 'f130',
		'fa-microphone-slash'                    => 'f131',
		'fa-shield'                              => 'f132',
		'fa-calendar-o'                          => 'f133',
		'fa-fire-extinguisher'                   => 'f134',
		'fa-rocket'                              => 'f135',
		'fa-maxcdn'                              => 'f136',
		'fa-chevron-circle-left'                 => 'f137',
		'fa-chevron-circle-right'                => 'f138',
		'fa-chevron-circle-up'                   => 'f139',
		'fa-chevron-circle-down'                 => 'f13a',
		'fa-html5'                               => 'f13b',
		'fa-css3'                                => 'f13c',
		'fa-anchor'                              => 'f13d',
		'fa-unlock-alt'                          => 'f13e',
		'fa-bullseye'                            => 'f140',
		'fa-ellipsis-h'                          => 'f141',
		'fa-ellipsis-v'                          => 'f142',
		'fa-rss-square'                          => 'f143',
		'fa-play-circle'                         => 'f144',
		'fa-ticket'                              => 'f145',
		'fa-minus-square'                        => 'f146',
		'fa-minus-square-o'                      => 'f147',
		'fa-level-up'                            => 'f148',
		'fa-level-down'                          => 'f149',
		'fa-check-square'                        => 'f14a',
		'fa-pencil-square'                       => 'f14b',
		'fa-external-link-square'                => 'f14c',
		'fa-share-square'                        => 'f14d',
		'fa-compass'                             => 'f14e',
		'fa-caret-square-o-down'                 => 'f150',
		'fa-caret-square-o-up'                   => 'f151',
		'fa-caret-square-o-right'                => 'f152',
		'fa-eur'                                 => 'f153',
		'fa-gbp'                                 => 'f154',
		'fa-usd'                                 => 'f155',
		'fa-inr'                                 => 'f156',
		'fa-jpy'                                 => 'f157',
		'fa-rub'                                 => 'f158',
		'fa-krw'                                 => 'f159',
		'fa-btc'                                 => 'f15a',
		'fa-file'                                => 'f15b',
		'fa-file-text'                           => 'f15c',
		'fa-sort-alpha-asc'                      => 'f15d',
		'fa-sort-alpha-desc'                     => 'f15e',
		'fa-sort-amount-asc'                     => 'f160',
		'fa-sort-amount-desc'                    => 'f161',
		'fa-sort-numeric-asc'                    => 'f162',
		'fa-sort-numeric-desc'                   => 'f163',
		'fa-thumbs-up'                           => 'f164',
		'fa-thumbs-down'                         => 'f165',
		'fa-youtube-square'                      => 'f166',
		'fa-youtube'                             => 'f167',
		'fa-xing'                                => 'f168',
		'fa-xing-square'                         => 'f169',
		'fa-youtube-play'                        => 'f16a',
		'fa-dropbox'                             => 'f16b',
		'fa-stack-overflow'                      => 'f16c',
		'fa-instagram'                           => 'f16d',
		'fa-flickr'                              => 'f16e',
		'fa-adn'                                 => 'f170',
		'fa-bitbucket'                           => 'f171',
		'fa-bitbucket-square'                    => 'f172',
		'fa-tumblr'                              => 'f173',
		'fa-tumblr-square'                       => 'f174',
		'fa-long-arrow-down'                     => 'f175',
		'fa-long-arrow-up'                       => 'f176',
		'fa-long-arrow-left'                     => 'f177',
		'fa-long-arrow-right'                    => 'f178',
		'fa-apple'                               => 'f179',
		'fa-windows'                             => 'f17a',
		'fa-android'                             => 'f17b',
		'fa-linux'                               => 'f17c',
		'fa-dribbble'                            => 'f17d',
		'fa-skype'                               => 'f17e',
		'fa-foursquare'                          => 'f180',
		'fa-trello'                              => 'f181',
		'fa-female'                              => 'f182',
		'fa-male'                                => 'f183',
		'fa-gratipay'                            => 'f184',
		'fa-sun-o'                               => 'f185',
		'fa-moon-o'                              => 'f186',
		'fa-archive'                             => 'f187',
		'fa-bug'                                 => 'f188',
		'fa-vk'                                  => 'f189',
		'fa-weibo'                               => 'f18a',
		'fa-renren'                              => 'f18b',
		'fa-pagelines'                           => 'f18c',
		'fa-stack-exchange'                      => 'f18d',
		'fa-arrow-circle-o-right'                => 'f18e',
		'fa-arrow-circle-o-left'                 => 'f190',
		'fa-caret-square-o-left'                 => 'f191',
		'fa-dot-circle-o'                        => 'f192',
		'fa-wheelchair'                          => 'f193',
		'fa-vimeo-square'                        => 'f194',
		'fa-try'                                 => 'f195',
		'fa-plus-square-o'                       => 'f196',
		'fa-space-shuttle'                       => 'f197',
		'fa-slack'                               => 'f198',
		'fa-envelope-square'                     => 'f199',
		'fa-wordpress'                           => 'f19a',
		'fa-openid'                              => 'f19b',
		'fa-university'                          => 'f19c',
		'fa-graduation-cap'                      => 'f19d',
		'fa-yahoo'                               => 'f19e',
		'fa-google'                              => 'f1a0',
		'fa-reddit'                              => 'f1a1',
		'fa-reddit-square'                       => 'f1a2',
		'fa-stumbleupon-circle'                  => 'f1a3',
		'fa-stumbleupon'                         => 'f1a4',
		'fa-delicious'                           => 'f1a5',
		'fa-digg'                                => 'f1a6',
		'fa-pied-piper-pp'                       => 'f1a7',
		'fa-pied-piper-alt'                      => 'f1a8',
		'fa-drupal'                              => 'f1a9',
		'fa-joomla'                              => 'f1aa',
		'fa-language'                            => 'f1ab',
		'fa-fax'                                 => 'f1ac',
		'fa-building'                            => 'f1ad',
		'fa-child'                               => 'f1ae',
		'fa-paw'                                 => 'f1b0',
		'fa-spoon'                               => 'f1b1',
		'fa-cube'                                => 'f1b2',
		'fa-cubes'                               => 'f1b3',
		'fa-behance'                             => 'f1b4',
		'fa-behance-square'                      => 'f1b5',
		'fa-steam'                               => 'f1b6',
		'fa-steam-square'                        => 'f1b7',
		'fa-recycle'                             => 'f1b8',
		'fa-car'                                 => 'f1b9',
		'fa-taxi'                                => 'f1ba',
		'fa-tree'                                => 'f1bb',
		'fa-spotify'                             => 'f1bc',
		'fa-deviantart'                          => 'f1bd',
		'fa-soundcloud'                          => 'f1be',
		'fa-database'                            => 'f1c0',
		'fa-file-pdf-o'                          => 'f1c1',
		'fa-file-word-o'                         => 'f1c2',
		'fa-file-excel-o'                        => 'f1c3',
		'fa-file-powerpoint-o'                   => 'f1c4',
		'fa-file-image-o'                        => 'f1c5',
		'fa-file-archive-o'                      => 'f1c6',
		'fa-file-audio-o'                        => 'f1c7',
		'fa-file-video-o'                        => 'f1c8',
		'fa-file-code-o'                         => 'f1c9',
		'fa-vine'                                => 'f1ca',
		'fa-codepen'                             => 'f1cb',
		'fa-jsfiddle'                            => 'f1cc',
		'fa-life-ring'                           => 'f1cd',
		'fa-circle-o-notch'                      => 'f1ce',
		'fa-rebel'                               => 'f1d0',
		'fa-empire'                              => 'f1d1',
		'fa-git-square'                          => 'f1d2',
		'fa-git'                                 => 'f1d3',
		'fa-hacker-news'                         => 'f1d4',
		'fa-tencent-weibo'                       => 'f1d5',
		'fa-qq'                                  => 'f1d6',
		'fa-weixin'                              => 'f1d7',
		'fa-paper-plane'                         => 'f1d8',
		'fa-paper-plane-o'                       => 'f1d9',
		'fa-history'                             => 'f1da',
		'fa-circle-thin'                         => 'f1db',
		'fa-header'                              => 'f1dc',
		'fa-paragraph'                           => 'f1dd',
		'fa-sliders'                             => 'f1de',
		'fa-share-alt'                           => 'f1e0',
		'fa-share-alt-square'                    => 'f1e1',
		'fa-bomb'                                => 'f1e2',
		'fa-futbol-o'                            => 'f1e3',
		'fa-tty'                                 => 'f1e4',
		'fa-binoculars'                          => 'f1e5',
		'fa-plug'                                => 'f1e6',
		'fa-slideshare'                          => 'f1e7',
		'fa-twitch'                              => 'f1e8',
		'fa-yelp'                                => 'f1e9',
		'fa-newspaper-o'                         => 'f1ea',
		'fa-wifi'                                => 'f1eb',
		'fa-calculator'                          => 'f1ec',
		'fa-paypal'                              => 'f1ed',
		'fa-google-wallet'                       => 'f1ee',
		'fa-cc-visa'                             => 'f1f0',
		'fa-cc-mastercard'                       => 'f1f1',
		'fa-cc-discover'                         => 'f1f2',
		'fa-cc-amex'                             => 'f1f3',
		'fa-cc-paypal'                           => 'f1f4',
		'fa-cc-stripe'                           => 'f1f5',
		'fa-bell-slash'                          => 'f1f6',
		'fa-bell-slash-o'                        => 'f1f7',
		'fa-trash'                               => 'f1f8',
		'fa-copyright'                           => 'f1f9',
		'fa-at'                                  => 'f1fa',
		'fa-eyedropper'                          => 'f1fb',
		'fa-paint-brush'                         => 'f1fc',
		'fa-birthday-cake'                       => 'f1fd',
		'fa-area-chart'                          => 'f1fe',
		'fa-pie-chart'                           => 'f200',
		'fa-line-chart'                          => 'f201',
		'fa-lastfm'                              => 'f202',
		'fa-lastfm-square'                       => 'f203',
		'fa-toggle-off'                          => 'f204',
		'fa-toggle-on'                           => 'f205',
		'fa-bicycle'                             => 'f206',
		'fa-bus'                                 => 'f207',
		'fa-ioxhost'                             => 'f208',
		'fa-angellist'                           => 'f209',
		'fa-cc'                                  => 'f20a',
		'fa-ils'                                 => 'f20b',
		'fa-meanpath'                            => 'f20c',
		'fa-buysellads'                          => 'f20d',
		'fa-connectdevelop'                      => 'f20e',
		'fa-dashcube'                            => 'f210',
		'fa-forumbee'                            => 'f211',
		'fa-leanpub'                             => 'f212',
		'fa-sellsy'                              => 'f213',
		'fa-shirtsinbulk'                        => 'f214',
		'fa-simplybuilt'                         => 'f215',
		'fa-skyatlas'                            => 'f216',
		'fa-cart-plus'                           => 'f217',
		'fa-cart-arrow-down'                     => 'f218',
		'fa-diamond'                             => 'f219',
		'fa-ship'                                => 'f21a',
		'fa-user-secret'                         => 'f21b',
		'fa-motorcycle'                          => 'f21c',
		'fa-street-view'                         => 'f21d',
		'fa-heartbeat'                           => 'f21e',
		'fa-venus'                               => 'f221',
		'fa-mars'                                => 'f222',
		'fa-mercury'                             => 'f223',
		'fa-transgender'                         => 'f224',
		'fa-transgender-alt'                     => 'f225',
		'fa-venus-double'                        => 'f226',
		'fa-mars-double'                         => 'f227',
		'fa-venus-mars'                          => 'f228',
		'fa-mars-stroke'                         => 'f229',
		'fa-mars-stroke-v'                       => 'f22a',
		'fa-mars-stroke-h'                       => 'f22b',
		'fa-neuter'                              => 'f22c',
		'fa-genderless'                          => 'f22d',
		'fa-facebook-official'                   => 'f230',
		'fa-pinterest-p'                         => 'f231',
		'fa-whatsapp'                            => 'f232',
		'fa-server'                              => 'f233',
		'fa-user-plus'                           => 'f234',
		'fa-user-times'                          => 'f235',
		'fa-bed'                                 => 'f236',
		'fa-viacoin'                             => 'f237',
		'fa-train'                               => 'f238',
		'fa-subway'                              => 'f239',
		'fa-medium'                              => 'f23a',
		'fa-y-combinator'                        => 'f23b',
		'fa-optin-monster'                       => 'f23c',
		'fa-opencart'                            => 'f23d',
		'fa-expeditedssl'                        => 'f23e',
		'fa-battery-full'                        => 'f240',
		'fa-battery-three-quarters'              => 'f241',
		'fa-battery-half'                        => 'f242',
		'fa-battery-quarter'                     => 'f243',
		'fa-battery-empty'                       => 'f244',
		'fa-mouse-pointer'                       => 'f245',
		'fa-i-cursor'                            => 'f246',
		'fa-object-group'                        => 'f247',
		'fa-object-ungroup'                      => 'f248',
		'fa-sticky-note'                         => 'f249',
		'fa-sticky-note-o'                       => 'f24a',
		'fa-cc-jcb'                              => 'f24b',
		'fa-cc-diners-club'                      => 'f24c',
		'fa-clone'                               => 'f24d',
		'fa-balance-scale'                       => 'f24e',
		'fa-hourglass-o'                         => 'f250',
		'fa-hourglass-start'                     => 'f251',
		'fa-hourglass-half'                      => 'f252',
		'fa-hourglass-end'                       => 'f253',
		'fa-hourglass'                           => 'f254',
		'fa-hand-rock-o'                         => 'f255',
		'fa-hand-paper-o'                        => 'f256',
		'fa-hand-scissors-o'                     => 'f257',
		'fa-hand-lizard-o'                       => 'f258',
		'fa-hand-spock-o'                        => 'f259',
		'fa-hand-pointer-o'                      => 'f25a',
		'fa-hand-peace-o'                        => 'f25b',
		'fa-trademark'                           => 'f25c',
		'fa-registered'                          => 'f25d',
		'fa-creative-commons'                    => 'f25e',
		'fa-gg'                                  => 'f260',
		'fa-gg-circle'                           => 'f261',
		'fa-tripadvisor'                         => 'f262',
		'fa-odnoklassniki'                       => 'f263',
		'fa-odnoklassniki-square'                => 'f264',
		'fa-get-pocket'                          => 'f265',
		'fa-wikipedia-w'                         => 'f266',
		'fa-safari'                              => 'f267',
		'fa-chrome'                              => 'f268',
		'fa-firefox'                             => 'f269',
		'fa-opera'                               => 'f26a',
		'fa-internet-explorer'                   => 'f26b',
		'fa-television'                          => 'f26c',
		'fa-contao'                              => 'f26d',
		'fa-500px'                               => 'f26e',
		'fa-amazon'                              => 'f270',
		'fa-calendar-plus-o'                     => 'f271',
		'fa-calendar-minus-o'                    => 'f272',
		'fa-calendar-times-o'                    => 'f273',
		'fa-calendar-check-o'                    => 'f274',
		'fa-industry'                            => 'f275',
		'fa-map-pin'                             => 'f276',
		'fa-map-signs'                           => 'f277',
		'fa-map-o'                               => 'f278',
		'fa-map'                                 => 'f279',
		'fa-commenting'                          => 'f27a',
		'fa-commenting-o'                        => 'f27b',
		'fa-houzz'                               => 'f27c',
		'fa-vimeo'                               => 'f27d',
		'fa-black-tie'                           => 'f27e',
		'fa-fonticons'                           => 'f280',
		'fa-reddit-alien'                        => 'f281',
		'fa-edge'                                => 'f282',
		'fa-credit-card-alt'                     => 'f283',
		'fa-codiepie'                            => 'f284',
		'fa-modx'                                => 'f285',
		'fa-fort-awesome'                        => 'f286',
		'fa-usb'                                 => 'f287',
		'fa-product-hunt'                        => 'f288',
		'fa-mixcloud'                            => 'f289',
		'fa-scribd'                              => 'f28a',
		'fa-pause-circle'                        => 'f28b',
		'fa-pause-circle-o'                      => 'f28c',
		'fa-stop-circle'                         => 'f28d',
		'fa-stop-circle-o'                       => 'f28e',
		'fa-shopping-bag'                        => 'f290',
		'fa-shopping-basket'                     => 'f291',
		'fa-hashtag'                             => 'f292',
		'fa-bluetooth'                           => 'f293',
		'fa-bluetooth-b'                         => 'f294',
		'fa-percent'                             => 'f295',
		'fa-gitlab'                              => 'f296',
		'fa-wpbeginner'                          => 'f297',
		'fa-wpforms'                             => 'f298',
		'fa-envira'                              => 'f299',
		'fa-universal-access'                    => 'f29a',
		'fa-wheelchair-alt'                      => 'f29b',
		'fa-question-circle-o'                   => 'f29c',
		'fa-blind'                               => 'f29d',
		'fa-audio-description'                   => 'f29e',
		'fa-volume-control-phone'                => 'f2a0',
		'fa-braille'                             => 'f2a1',
		'fa-assistive-listening-systems'         => 'f2a2',
		'fa-american-sign-language-interpreting' => 'f2a3',
		'fa-deaf'                                => 'f2a4',
		'fa-glide'                               => 'f2a5',
		'fa-glide-g'                             => 'f2a6',
		'fa-sign-language'                       => 'f2a7',
		'fa-low-vision'                          => 'f2a8',
		'fa-viadeo'                              => 'f2a9',
		'fa-viadeo-square'                       => 'f2aa',
		'fa-snapchat'                            => 'f2ab',
		'fa-snapchat-ghost'                      => 'f2ac',
		'fa-snapchat-square'                     => 'f2ad',
		'fa-pied-piper'                          => 'f2ae',
		'fa-first-order'                         => 'f2b0',
		'fa-yoast'                               => 'f2b1',
		'fa-themeisle'                           => 'f2b2',
		'fa-google-plus-official'                => 'f2b3',
		'fa-font-awesome'                        => 'f2b4'
	);
}

function has_media($config)
{
	$media = TRUE;
	if (empty($config['image'])) {
		if (empty($config['video'])) {
			if (empty($config['icon'])) {
				$media = FALSE;
			}
		}
	}
	return $media;
}

function get_month_options($month)
{
	$month = (int)$month;
	$options = '
		<option value="01" '. (($month == 1) ? 'selected' : '') .'>1</option>
		<option value="02" '. (($month == 2) ? 'selected' : '') .'>2</option>
		<option value="03" '. (($month == 3) ? 'selected' : '') .'>3</option>
		<option value="04" '. (($month == 4) ? 'selected' : '') .'>4</option>
		<option value="05" '. (($month == 5) ? 'selected' : '') .'>5</option>
		<option value="06" '. (($month == 6) ? 'selected' : '') .'>6</option>
		<option value="07" '. (($month == 7) ? 'selected' : '') .'>7</option>
		<option value="08" '. (($month == 8) ? 'selected' : '') .'>8</option>
		<option value="09" '. (($month == 9) ? 'selected' : '') .'>9</option>
		<option value="10" '. (($month == 10) ? 'selected' : '') .'>10</option>
		<option value="11" '. (($month == 11) ? 'selected' : '') .'>11</option>
		<option value="12" '. (($month == 12) ? 'selected' : '') .'>12</option>';

	return $options;
}

function get_year_options($year)
{
	$options = '';
	$current_year = date("Y");

	for ($x = 0; $x <= 30; $x++) {
		$options .= '<option ';
		$options .= 'value="'.$current_year.'"';
		if ($year == $current_year) {
			$options .= ' selected';
		}
		$options .= '>'.$current_year.'</option>';
		$current_year++;

	}

	return $options;
}

function get_state_options($state)
{

   $return_html =
   '<option value="AL" '. (($state == 'AL') ? 'selected' : '') .'>Alabama</option>
    <option value="AK" '. (($state == 'AK') ? 'selected' : '') .'>Alaska</option>
    <option value="AZ" '. (($state == 'AZ') ? 'selected' : '') .'>Arizona</option>
    <option value="AR" '. (($state == 'AR') ? 'selected' : '') .'>Arkansas</option>
    <option value="CA" '. (($state == 'CA') ? 'selected' : '') .'>California</option>
    <option value="CO" '. (($state == 'CO') ? 'selected' : '') .'>Colorado</option>
    <option value="CT" '. (($state == 'CT') ? 'selected' : '') .'>Connecticut</option>
    <option value="DE" '. (($state == 'DE') ? 'selected' : '') .'>Delaware</option>
    <option value="DC" '. (($state == 'DC') ? 'selected' : '') .'>District of Columbia</option>
    <option value="FL" '. (($state == 'FL') ? 'selected' : '') .'>Florida</option>
    <option value="GA" '. (($state == 'GA') ? 'selected' : '') .'>Georgia</option>
    <option value="HI" '. (($state == 'HI') ? 'selected' : '') .'>Hawaii</option>
    <option value="ID" '. (($state == 'ID') ? 'selected' : '') .'>Idaho</option>
    <option value="IL" '. (($state == 'IL') ? 'selected' : '') .'>Illinois</option>
    <option value="IN" '. (($state == 'IN') ? 'selected' : '') .'>Indiana</option>
    <option value="IA" '. (($state == 'IA') ? 'selected' : '') .'>Iowa</option>
    <option value="KS" '. (($state == 'KS') ? 'selected' : '') .'>Kansas</option>
    <option value="KY" '. (($state == 'KY') ? 'selected' : '') .'>Kentucky</option>
    <option value="LA" '. (($state == 'LA') ? 'selected' : '') .'>Louisiana</option>
    <option value="ME" '. (($state == 'ME') ? 'selected' : '') .'>Maine</option>
    <option value="MD" '. (($state == 'MD') ? 'selected' : '') .'>Maryland</option>
    <option value="MA" '. (($state == 'MA') ? 'selected' : '') .'>Massachusetts</option>
    <option value="MI" '. (($state == 'MI') ? 'selected' : '') .'>Michigan</option>
    <option value="MN" '. (($state == 'MN') ? 'selected' : '') .'>Minnesota</option>
    <option value="MS" '. (($state == 'MS') ? 'selected' : '') .'>Mississippi</option>
    <option value="MO" '. (($state == 'MO') ? 'selected' : '') .'>Missouri</option>
    <option value="MT" '. (($state == 'MT') ? 'selected' : '') .'>Montana</option>
    <option value="NE" '. (($state == 'NE') ? 'selected' : '') .'>Nebraska</option>
    <option value="NV" '. (($state == 'NV') ? 'selected' : '') .'>Nevada</option>
    <option value="NH" '. (($state == 'NH') ? 'selected' : '') .'>New Hampshire</option>
    <option value="NJ" '. (($state == 'NJ') ? 'selected' : '') .'>New Jersey</option>
    <option value="NM" '. (($state == 'NM') ? 'selected' : '') .'>New Mexico</option>
    <option value="NY" '. (($state == 'NY') ? 'selected' : '') .'>New York</option>
    <option value="NC" '. (($state == 'NC') ? 'selected' : '') .'>North Carolina</option>
    <option value="ND" '. (($state == 'ND') ? 'selected' : '') .'>North Dakota</option>
    <option value="OH" '. (($state == 'OH') ? 'selected' : '') .'>Ohio</option>
    <option value="OK" '. (($state == 'OK') ? 'selected' : '') .'>Oklahoma</option>
    <option value="OR" '. (($state == 'OR') ? 'selected' : '') .'>Oregon</option>
    <option value="PA" '. (($state == 'PA') ? 'selected' : '') .'>Pennsylvania</option>
    <option value="RI" '. (($state == 'RI') ? 'selected' : '') .'>Rhode Island</option>
    <option value="SC" '. (($state == 'SC') ? 'selected' : '') .'>South Carolina</option>
    <option value="SD" '. (($state == 'SD') ? 'selected' : '') .'>South Dakota</option>
    <option value="TN" '. (($state == 'TN') ? 'selected' : '') .'>Tennessee</option>
    <option value="TX" '. (($state == 'TX') ? 'selected' : '') .'>Texas</option>
    <option value="UT" '. (($state == 'UT') ? 'selected' : '') .'>Utah</option>
    <option value="VT" '. (($state == 'VT') ? 'selected' : '') .'>Vermont</option>
    <option value="VA" '. (($state == 'VA') ? 'selected' : '') .'>Virginia</option>
    <option value="WA" '. (($state == 'WA') ? 'selected' : '') .'>Washington</option>
    <option value="WV" '. (($state == 'WV') ? 'selected' : '') .'>West Virginia</option>
    <option value="WI" '. (($state == 'WI') ? 'selected' : '') .'>Wisconsin</option>
    <option value="WY" '. (($state == 'WY') ? 'selected' : '') .'>Wyoming</option>';

    return $return_html;
}

function get_country_options($country)
{
	$countries = array("AF" => "Afghanistan",
										"AX" => "Åland Islands",
										"AL" => "Albania",
										"DZ" => "Algeria",
										"AS" => "American Samoa",
										"AD" => "Andorra",
										"AO" => "Angola",
										"AI" => "Anguilla",
										"AQ" => "Antarctica",
										"AG" => "Antigua and Barbuda",
										"AR" => "Argentina",
										"AM" => "Armenia",
										"AW" => "Aruba",
										"AU" => "Australia",
										"AT" => "Austria",
										"AZ" => "Azerbaijan",
										"BS" => "Bahamas",
										"BH" => "Bahrain",
										"BD" => "Bangladesh",
										"BB" => "Barbados",
										"BY" => "Belarus",
										"BE" => "Belgium",
										"BZ" => "Belize",
										"BJ" => "Benin",
										"BM" => "Bermuda",
										"BT" => "Bhutan",
										"BO" => "Bolivia",
										"BA" => "Bosnia and Herzegovina",
										"BW" => "Botswana",
										"BV" => "Bouvet Island",
										"BR" => "Brazil",
										"IO" => "British Indian Ocean Territory",
										"BN" => "Brunei Darussalam",
										"BG" => "Bulgaria",
										"BF" => "Burkina Faso",
										"BI" => "Burundi",
										"KH" => "Cambodia",
										"CM" => "Cameroon",
										"CA" => "Canada",
										"CV" => "Cape Verde",
										"KY" => "Cayman Islands",
										"CF" => "Central African Republic",
										"TD" => "Chad",
										"CL" => "Chile",
										"CN" => "China",
										"CX" => "Christmas Island",
										"CC" => "Cocos (Keeling) Islands",
										"CO" => "Colombia",
										"KM" => "Comoros",
										"CG" => "Congo",
										"CD" => "Congo, The Democratic Republic of The",
										"CK" => "Cook Islands",
										"CR" => "Costa Rica",
										"CI" => "Cote D'ivoire",
										"HR" => "Croatia",
										"CU" => "Cuba",
										"CY" => "Cyprus",
										"CZ" => "Czech Republic",
										"DK" => "Denmark",
										"DJ" => "Djibouti",
										"DM" => "Dominica",
										"DO" => "Dominican Republic",
										"EC" => "Ecuador",
										"EG" => "Egypt",
										"SV" => "El Salvador",
										"GQ" => "Equatorial Guinea",
										"ER" => "Eritrea",
										"EE" => "Estonia",
										"ET" => "Ethiopia",
										"FK" => "Falkland Islands (Malvinas)",
										"FO" => "Faroe Islands",
										"FJ" => "Fiji",
										"FI" => "Finland",
										"FR" => "France",
										"GF" => "French Guiana",
										"PF" => "French Polynesia",
										"TF" => "French Southern Territories",
										"GA" => "Gabon",
										"GM" => "Gambia",
										"GE" => "Georgia",
										"DE" => "Germany",
										"GH" => "Ghana",
										"GI" => "Gibraltar",
										"GR" => "Greece",
										"GL" => "Greenland",
										"GD" => "Grenada",
										"GP" => "Guadeloupe",
										"GU" => "Guam",
										"GT" => "Guatemala",
										"GG" => "Guernsey",
										"GN" => "Guinea",
										"GW" => "Guinea-bissau",
										"GY" => "Guyana",
										"HT" => "Haiti",
										"HM" => "Heard Island and Mcdonald Islands",
										"VA" => "Holy See (Vatican City State)",
										"HN" => "Honduras",
										"HK" => "Hong Kong",
										"HU" => "Hungary",
										"IS" => "Iceland",
										"IN" => "India",
										"ID" => "Indonesia",
										"IR" => "Iran, Islamic Republic of",
										"IQ" => "Iraq",
										"IE" => "Ireland",
										"IM" => "Isle of Man",
										"IL" => "Israel",
										"IT" => "Italy",
										"JM" => "Jamaica",
										"JP" => "Japan",
										"JE" => "Jersey",
										"JO" => "Jordan",
										"KZ" => "Kazakhstan",
										"KE" => "Kenya",
										"KI" => "Kiribati",
										"KP" => "Korea, Democratic People's Republic of",
										"KR" => "Korea, Republic of",
										"KW" => "Kuwait",
										"KG" => "Kyrgyzstan",
										"LA" => "Lao People's Democratic Republic",
										"LV" => "Latvia",
										"LB" => "Lebanon",
										"LS" => "Lesotho",
										"LR" => "Liberia",
										"LY" => "Libyan Arab Jamahiriya",
										"LI" => "Liechtenstein",
										"LT" => "Lithuania",
										"LU" => "Luxembourg",
										"MO" => "Macao",
										"MK" => "Macedonia, The Former Yugoslav Republic of",
										"MG" => "Madagascar",
										"MW" => "Malawi",
										"MY" => "Malaysia",
										"MV" => "Maldives",
										"ML" => "Mali",
										"MT" => "Malta",
										"MH" => "Marshall Islands",
										"MQ" => "Martinique",
										"MR" => "Mauritania",
										"MU" => "Mauritius",
										"YT" => "Mayotte",
										"MX" => "Mexico",
										"FM" => "Micronesia, Federated States of",
										"MD" => "Moldova, Republic of",
										"MC" => "Monaco",
										"MN" => "Mongolia",
										"ME" => "Montenegro",
										"MS" => "Montserrat",
										"MA" => "Morocco",
										"MZ" => "Mozambique",
										"MM" => "Myanmar",
										"NA" => "Namibia",
										"NR" => "Nauru",
										"NP" => "Nepal",
										"NL" => "Netherlands",
										"AN" => "Netherlands Antilles",
										"NC" => "New Caledonia",
										"NZ" => "New Zealand",
										"NI" => "Nicaragua",
										"NE" => "Niger",
										"NG" => "Nigeria",
										"NU" => "Niue",
										"NF" => "Norfolk Island",
										"MP" => "Northern Mariana Islands",
										"NO" => "Norway",
										"OM" => "Oman",
										"PK" => "Pakistan",
										"PW" => "Palau",
										"PS" => "Palestinian Territory, Occupied",
										"PA" => "Panama",
										"PG" => "Papua New Guinea",
										"PY" => "Paraguay",
										"PE" => "Peru",
										"PH" => "Philippines",
										"PN" => "Pitcairn",
										"PL" => "Poland",
										"PT" => "Portugal",
										"PR" => "Puerto Rico",
										"QA" => "Qatar",
										"RE" => "Reunion",
										"RO" => "Romania",
										"RU" => "Russian Federation",
										"RW" => "Rwanda",
										"SH" => "Saint Helena",
										"KN" => "Saint Kitts and Nevis",
										"LC" => "Saint Lucia",
										"PM" => "Saint Pierre and Miquelon",
										"VC" => "Saint Vincent and The Grenadines",
										"WS" => "Samoa",
										"SM" => "San Marino",
										"ST" => "Sao Tome and Principe",
										"SA" => "Saudi Arabia",
										"SN" => "Senegal",
										"RS" => "Serbia",
										"SC" => "Seychelles",
										"SL" => "Sierra Leone",
										"SG" => "Singapore",
										"SK" => "Slovakia",
										"SI" => "Slovenia",
										"SB" => "Solomon Islands",
										"SO" => "Somalia",
										"ZA" => "South Africa",
										"GS" => "South Georgia and The South Sandwich Islands",
										"ES" => "Spain",
										"LK" => "Sri Lanka",
										"SD" => "Sudan",
										"SR" => "Suriname",
										"SJ" => "Svalbard and Jan Mayen",
										"SZ" => "Swaziland",
										"SE" => "Sweden",
										"CH" => "Switzerland",
										"SY" => "Syrian Arab Republic",
										"TW" => "Taiwan, Province of China",
										"TJ" => "Tajikistan",
										"TZ" => "Tanzania, United Republic of",
										"TH" => "Thailand",
										"TL" => "Timor-leste",
										"TG" => "Togo",
										"TK" => "Tokelau",
										"TO" => "Tonga",
										"TT" => "Trinidad and Tobago",
										"TN" => "Tunisia",
										"TR" => "Turkey",
										"TM" => "Turkmenistan",
										"TC" => "Turks and Caicos Islands",
										"TV" => "Tuvalu",
										"UG" => "Uganda",
										"UA" => "Ukraine",
										"AE" => "United Arab Emirates",
										"GB" => "United Kingdom",
										"US" => "United States",
										"UM" => "United States Minor Outlying Islands",
										"UY" => "Uruguay",
										"UZ" => "Uzbekistan",
										"VU" => "Vanuatu",
										"VE" => "Venezuela",
										"VN" => "Viet Nam",
										"VG" => "Virgin Islands, British",
										"VI" => "Virgin Islands, U.S.",
										"WF" => "Wallis and Futuna",
										"EH" => "Western Sahara",
										"YE" => "Yemen",
										"ZM" => "Zambia",
										"ZW" => "Zimbabwe");

	$html = '';
	var_dump($county);
	foreach($countries as $key => $value) {
		$html .= '<option value="' . $key . '" title="' . htmlspecialchars($value) . '"';
		$html .= ($country == $key) ? 'selected' : '';
		$html .= '>'. htmlspecialchars($value) .'</option>';
	}

	return $html;
}

function display_media($obj)
{
	$html = '';

	switch ($obj->mediatype) {
    case 'video':
        $data = $obj->video;
        $html = '<i class="fa '.$data.'"></i>';
        break;
    case 'image':
        $data = $obj->image;
        $html = '<img src="/assets/img/page/'.$data.'" alt="'.$obj->section.'">';
        break;
    case 'icon':
        $data = $obj->icon;
        $html = '<i class="fa '.$data.'"></i>';
        break;
	}

	return $html;
}

function get_hours_range( $start = 0, $end = 86400, $step = 3600, $format = 'g:i a' )
{
  $times = array();
  foreach ( range( $start, $end, $step ) as $timestamp ) {
          $hour_mins = gmdate( 'H:i', $timestamp );
          if ( ! empty( $format ) )
                  $times[$hour_mins] = gmdate( $format, $timestamp );
          else $times[$hour_mins] = $hour_mins;
  }
  return $times;
}

function hours_of_day_options($selected_value)
{
	$html = '';
	$times = get_hours_range();

	foreach ($times as $time=>$readable_time) {
		$html .= '<option value="'.$time.'"';
		if ($selected_value == $time) {
			$html .= ' selected';
		}
		$html .= '>'.$readable_time.'</option>';
	}

	return $html;
}

function unix_add_hours($unix,$num_hours)
{
	$new_unix = $unix;

	if (!empty($num_hours)) {
		$advance = '+'.$num_hours.' hour';
		$new_unix = strtotime($advance, $unix);
	}

	return unix_to_date($new_unix);
}

function mdate_to_ddate($date)
{
	return date('Y-m-d H:i:s', strtotime($date));
}

function dbdate_to_date($dbdate)
{
	return date('D, M j, Y, g:ia', strtotime($dbdate));
}

function dbdate_to_time($dbdate)
{
	return date('g:i A', strtotime($dbdate));
}

function db_seperate_date($type,$dbdate)
{
	if (empty($dbdate)) {
		$dbdate = current_date()['datetime'];
	}

	if ($type=='date') {
		return date('Y-m-d', strtotime($dbdate));
	} else if ($type=='time') {
		return date('g:i A', strtotime($dbdate));
	} else {
		return FALSE;
	}
}

function dbdate_less_now($dbdate)
{
	if(strtotime($dbdate) > strtotime('now')){
		return TRUE;
	} else {
		return FALSE;
	}
}

function current_date()
{
	$format = array();

	$dt = new DateTime();
	$format['datetime'] = $dt->format('D, M jS g:ia');
	$format['db'] = $dt->format('Y-m-d H:i:s');
	$format['date'] = $dt->format('Y-m-d');
	$format['time'] = $dt->format('g:i A');
	$format['calendar'] = $dt->format('c');

	return $format;
}

function set_error($code,$title,$message)
{
  $error = array();
  $error['code']     = $code;
  $error['title']    = $title;
  $error['message']  = $message;

	return $error;
}

function display_error($data)
{
	$html = '<div class="vertical-align text-center">
		<div class="page-content page-error vertical-align-middle">
			<header>
			  <h1 class="animation-slide-top">'.(!empty($data['code']) ? $data['code'] : '').'</h1>
			  <h4>'.(!empty($data['title']) ? $data['title'] : '').'</h4>';

	if (!empty($data['message'])) {
		$html .= '<p id="error_definition">'.$data['message'].'</p>';
	}

	$html .= '</header>
		</div>
	</div>';

	return $html;
}
